/**
 * Initializes theme toggling logic based on the value of 'themeMode' in localStorage.
 * Applies the corresponding UI changes and sets up a click listener for the light-switch.
 * 
 * - Reads the `themeMode` key from localStorage on load.
 * - If set to `"dark"` or `"light"`, applies the corresponding UI state.
 * - On `.light-switch` click, toggles between modes, updates localStorage, and re-applies the theme.
 */

(() => {

  const button = document.querySelector('.light-switch');
  if (!button) return;

  const svg = button.querySelector('svg');
  if (!svg) return;

  let themeMode = localStorage.getItem('themeMode');

  const systemDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
  if (systemDark && themeMode === null) {
    localStorage.setItem('themeMode', 'dark');
  }

  const handleThemeMode = () => {
    
    themeMode = localStorage.getItem('themeMode');
    if (themeMode === null) return;
    let isDark = themeMode === 'dark';
    
    document.documentElement.classList.toggle('dark-mode', isDark);
    button.classList.toggle('aurora', isDark);
    const rotation = isDark ? 90 : 0;
    svg.dataset.rotation = rotation.toString();
    svg.style.transform = `rotate(${rotation}deg)`;
    
  };
  // Apply stored theme on initial load
  handleThemeMode();

  /**
   * Click listener for toggling theme mode when the light-switch is clicked.
   * Toggles between "dark" and "light" and applies the new mode.
   */
  document.addEventListener('click', (event) => {
    // console.log(event.target + 'clicked');
    if (!event.target.closest('.light-switch')) return;

    const isDark = document.documentElement.classList.contains('dark-mode');
    
    const nextMode = isDark ? 'light' : 'dark';
    // console.log('nextMode', nextMode);
    localStorage.setItem('themeMode', nextMode);

    handleThemeMode();
  });
})();
