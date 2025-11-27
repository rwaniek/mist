/**
 * Hiding offcanvas menu when a link is clicked
 */
const bsOffcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasNavbar'), {
  // backdrop: false
});

document.addEventListener('click', function (event) {

  if (event.target.closest('.navbar-toggler')) bsOffcanvas.show(); // data target bug with focus

	else if (event.target.closest('#offcanvasNavbar .nav-item')) bsOffcanvas.hide();

}, false);

/**
 * Adding background to the nav element when user scrolls
 * @param {Array} entries 
 */

const navbar = document.querySelector('.navbar');
const heroEl = document.querySelector('.hero')

function observerCB(entries) {
  const [entry] = entries;
  if (entry.isIntersecting) {
    navbar.classList.remove("solid");
  } else {
    navbar.classList.add("solid");
  }
}

const observerOptions = {
  root: null,
  threshold: 1,
  rootMargin: "100px 0px",
};

const observer = new IntersectionObserver(observerCB, observerOptions);
if (heroEl) {
  observer.observe(heroEl); 
};
