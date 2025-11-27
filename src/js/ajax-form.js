customElements.define('ajax-form', class extends HTMLElement {

	/**
	 * The class constructor object
	 */
	constructor () {

		console.log('ajax-form initialized');
		// Always call super first in constructor
		super();

		// Add a form status element
		this.announce = this.querySelector('[role="status"]') || document.createElement('div');
		this.announce.setAttribute('role', 'status');

		// Set base properties
		this.form = this.querySelector('form');
		this.form.append(this.announce);

		// Define options
		this.msgSubmitting = this.getAttribute('msg-submitting') ?? 'Submitting...';
		this.keepFields = this.hasAttribute('keep-fields');
		this.updateURL = this.getAttribute('update-url');
		this.delay = this.hasAttribute('delay') ? 6000 : 0;

		// Listen for events
		this.form.addEventListener('submit', this);

	}

	/**
	 * Handle events on the component
	 * @param  {Event} event The event object
	 */
	handleEvent(event) {
		this[`on${event.type}`](event);
	}

	/**
	 * Handle submit events
	 * @param  {Event} event The event object
	 */
	async onsubmit (event) {

		// Stop form from reloading the page
		event.preventDefault();

		// If the form is already submitting, do nothing
		// Otherwise, disable future submissions
		if (this.isDisabled()) return;
		this.disable();

		// Show status message
		this.showStatus(this.msgSubmitting, true);

		try {

			// Call the API
			let {action, method} = this.form;
			let response = await fetch(action, {
				method,
				body: this.serialize(),
				headers: {
					'Content-type': 'application/x-www-form-urlencoded',
					'X-Requested-With': 'XMLHttpRequest'
				}
			});

			// Get the response data
			let data = await response.json();

			// If there's an error, throw
			if (!response.ok) throw data;

			// If message, display it
			if (data.message) {
				this.showStatus(data.message, true, true);
			}

			// If updateURL, update it
			if (this.updateURL) {
				history.replaceState(history.state, null, this.updateURL);
			}

			// If URL received from the backend in case we want to redirect a user
			if (data.url) {
				window.location.href = data.url;
			}

			// Clear the form
			if (!this.keepFields) {
				this.reset();
			}

			// Emit custom event 'ajax-form'
			this.emit(data);

		} catch (error) {
			console.warn(error);
			this.showStatus(error.message);
		} finally {
			setTimeout(() => {
				this.enable();
			}, this.delay);
		}

	}

	/**
	 * Disable a form so it can't be submitted while waiting for the API
	 */
	disable () {
		this.setAttribute('form-submitting', '');
	}

	/**
	 * Enable a form after the API returns
	 */
	enable () {
		this.removeAttribute('form-submitting');
	}

	/**
	 * Check if a form is submitting to the API
	 * @return {Boolean} If true, the form is submitting
	 */
	isDisabled () {
		return this.hasAttribute('form-submitting');
	}

	/**
	 * Update the form status in a field
	 * @param {String}  msg      The message to display
	 * @param {Boolean} success  If true, add success class
	 * @param {Boolean} complete If true, form submit is complete
	 */
	showStatus (msg, success, complete) {

		// Show the message
		this.announce.innerHTML = msg;
		this.announce.className = success ? 'success-message' : 'error-message';

	}

	/**
	 * Serialize all form data into an encoded query string
	 * @return {String} The serialized form data
	 */
	serialize () {
		let data = new FormData(this.form);
		let params = new URLSearchParams();
		for (let [key, val] of data) {
			params.append(key, val);
		}
		return params.toString();
	}

	/**
	 * Reset the form element values
	 */
	reset () {
		this.form.reset();
	}

	/**
	 * Emit a custom event
	 * @param  {Object} detail Any details to pass along with the event
	 */
	emit (detail = {}) {

		// Create a new event
		let event = new CustomEvent('ajax-form', {
			bubbles: true,
			cancelable: false,
			detail: detail
		});

		// Dispatch the event
		return this.dispatchEvent(event);

	}

});