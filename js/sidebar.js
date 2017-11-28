// Don't do stuff until DOMContentLoaded happens.
document.addEventListener("DOMContentLoaded", function(event) { 
  const mediaQuery = window.matchMedia('(max-width: 768px)');

  // Only run stuff, if we're on mobile devices
  if (mediaQuery.matches) enableSidebarToggle();
});

function enableSidebarToggle() {
  const sidebarToggle = document.querySelector('[data-sidebar-toggle]');
  const sidebarClose = document.querySelector('[data-sidebar-close]');
  const sidebar = document.querySelector('[data-sidebar]');
  const html = document.querySelector('html');

  if (!sidebarToggle || !sidebarClose || !sidebar) return;

  sidebarToggle.addEventListener('click', function() {
    sidebar.classList.toggle('sidebar--open');
    html.classList.toggle('overflow-hidden');
  });

  sidebarClose.addEventListener('click', function(e) {
    e.preventDefault();
    sidebar.classList.remove('sidebar--open');
    html.classList.remove('overflow-hidden');
  });
}