// Don't do stuff until DOMContentLoaded happens.
document.addEventListener("DOMContentLoaded", function(event) { 
  enableBurgerMenuToggle();
});

function enableBurgerMenuToggle() {
  const burgerMenuToggle = document.querySelector('[data-menu-toggle]');
  const burgerMenuClose = document.querySelector('[data-menu-close]');
  const burgerMenu = document.querySelector('[data-menu]');
  const html = document.querySelector('html');

  // Only run stuff, if we're on mobile devices
  const mediaQuery = window.matchMedia('(max-width: 768px)');

  if (!burgerMenuToggle || !burgerMenuClose || !burgerMenu) return;

  burgerMenuToggle.addEventListener('click', function() {
    burgerMenu.classList.toggle('mega-menu--open');
    if (mediaQuery.matches) html.classList.toggle('overflow-hidden');
  });

  burgerMenuClose.addEventListener('click', function() {
    burgerMenu.classList.remove('mega-menu--open');
    if (mediaQuery.matches) html.classList.remove('overflow-hidden');
  });

  
  
  if (mediaQuery.matches) enableMenuToggles();
}

// Get all menu items with children on the top level
function enableMenuToggles() {
  const menuItemsWithChildren = document.querySelectorAll('.mega-menu__list > .menu-item-has-children');

  menuItemsWithChildren.forEach(function(menuItemWithChild) {
    const menuItemWithChildLink = menuItemWithChild.querySelector('a');

    if (menuItemWithChildLink) menuItemWithChildLink.removeAttribute('href');

    menuItemWithChild.addEventListener('click', function() {
      menuItemWithChild.classList.toggle('menu-item--open');
    });
  });
}