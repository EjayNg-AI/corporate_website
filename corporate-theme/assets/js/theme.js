(function() {
  'use strict';

  // Wait for DOM to be ready
  document.addEventListener('DOMContentLoaded', function() {
    
    // Hamburger menu toggle
    const hamburger = document.querySelector('.hamburger');
    const mobileMenu = document.querySelector('.mobile-menu');
    const overlay = document.querySelector('.overlay');
    const body = document.body;

    function closeMobileMenu() {
      mobileMenu.classList.remove('active');
      overlay.classList.remove('active');
      hamburger.setAttribute('aria-expanded', 'false');
      body.style.overflow = '';
    }

    if (hamburger) {
      hamburger.addEventListener('click', function() {
        const isOpen = mobileMenu.classList.toggle('active');
        overlay.classList.toggle('active', isOpen);
        hamburger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        body.style.overflow = isOpen ? 'hidden' : '';
      });
    }

    if (overlay) {
      overlay.addEventListener('click', closeMobileMenu);
    }

    // Mobile submenu toggle (only on mobile)
    function isMobile() {
      return window.innerWidth < 700;
    }

    document.querySelectorAll('.mobile-menu .nav-item > button.nav-link').forEach((btn) => {
      btn.addEventListener('click', function(e) {
        if (!isMobile()) return; // Only allow on mobile
        e.preventDefault();
        const parent = btn.parentElement;
        const isOpen = parent.classList.toggle('open');
        btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        
        // Close other open submenus
        document.querySelectorAll('.mobile-menu .nav-item').forEach((item) => {
          if (item !== parent) {
            item.classList.remove('open');
            const otherBtn = item.querySelector('button.nav-link');
            if (otherBtn) {
              otherBtn.setAttribute('aria-expanded', 'false');
            }
          }
        });
      });
    });

    // Prevent click effect on desktop nav menu items with submenus
    document.querySelectorAll('.nav .nav-link[aria-haspopup="true"]').forEach((btn) => {
      btn.addEventListener('click', function(e) {
        // Only prevent on desktop
        if (window.innerWidth >= 700) {
          e.preventDefault();
          // Optionally, blur the button to remove focus highlight after click
          btn.blur();
        }
      });
    });

    // Close mobile menu on resize to desktop
    window.addEventListener('resize', function() {
      if (window.innerWidth >= 700) {
        closeMobileMenu();
        document.querySelectorAll('.mobile-menu .nav-item.open').forEach((item) => {
          item.classList.remove('open');
          const btn = item.querySelector('button.nav-link');
          if (btn) {
            btn.setAttribute('aria-expanded', 'false');
          }
        });
      }
    });

    // Light/Dark mode toggle
    const themeToggle = document.querySelector('.theme-toggle');
    
    function setTheme(dark) {
      if (dark) {
        // Dark mode is active
        body.classList.add('dark-mode');
        if (themeToggle) {
          themeToggle.innerHTML = '&#9788;'; // Show Sun icon (click to go to light)
        }
      } else {
        // Light mode is active
        body.classList.remove('dark-mode');
        if (themeToggle) {
          themeToggle.innerHTML = '&#9790;'; // Show Moon icon (click to go to dark)
        }
      }
      localStorage.setItem('theme', dark ? 'dark' : 'light');
    }

    // Initialize theme
    (function() {
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
    })();

    if (themeToggle) {
      themeToggle.addEventListener('click', function() {
        setTheme(!body.classList.contains('dark-mode'));
      });
    }

    // Accessibility: close mobile menu with ESC
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('active')) {
        closeMobileMenu();
      }
    });

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
        }
      });
    }

  });

})();