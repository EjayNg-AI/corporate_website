(function() {
  'use strict';

  // Wait for DOM to be ready
  document.addEventListener('DOMContentLoaded', function() {
    const body = document.body;

    // Light/Dark mode toggle
    const themeToggle = document.querySelector('.theme-toggle');
    
    function setTheme(dark) {
      if (dark) {
        // Dark mode is active
        body.classList.add('dark-mode');
        if (themeToggle) {
          themeToggle.textContent = '☀'; // Show Sun icon (click to go to light)
          themeToggle.setAttribute('aria-pressed', 'true');
        }
      } else {
        // Light mode is active
        body.classList.remove('dark-mode');
        if (themeToggle) {
          themeToggle.textContent = '☾'; // Show Moon icon (click to go to dark)
          themeToggle.setAttribute('aria-pressed', 'false');
        }
      }
      localStorage.setItem('theme', dark ? 'dark' : 'light');
    }

    // Initialize theme
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (savedTheme === 'dark') {
      setTheme(true);
    } else if (savedTheme === 'light') {
      setTheme(false);
    } else {
      // No saved theme, rely on system preference or default to light
      if (prefersDark) {
        setTheme(true);
      } else {
        setTheme(false); // Default to light
      }
    }

    if (themeToggle) {
      themeToggle.addEventListener('click', function() {
        setTheme(!body.classList.contains('dark-mode'));
      });
    }

    // WordPress Navigation block compatibility
    // The WordPress navigation block handles its own responsive behavior
    // We only need to ensure our theme styles work with it

    // WordPress Customizer support - refresh when theme settings change
    if (typeof wp !== 'undefined' && wp.customize && wp.customize.selectiveRefresh) {
      wp.customize.selectiveRefresh.bind('partial-content-rendered', function() {
        // Re-initialize any dynamic elements after partial refresh
        const newThemeToggle = document.querySelector('.theme-toggle');
        if (newThemeToggle && !newThemeToggle.hasAttribute('data-initialized')) {
          newThemeToggle.setAttribute('data-initialized', 'true');
          newThemeToggle.addEventListener('click', function() {
            setTheme(!body.classList.contains('dark-mode'));
          });
          // Ensure proper state after refresh
          const isDark = body.classList.contains('dark-mode');
          newThemeToggle.textContent = isDark ? '☀' : '☾';
          newThemeToggle.setAttribute('aria-pressed', isDark ? 'true' : 'false');
        }
      });
    }

  });

})();