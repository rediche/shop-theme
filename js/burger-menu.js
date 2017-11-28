// Don't do stuff until DOMContentLoaded happens.
document.addEventListener("DOMContentLoaded", function(event) { 
  const mediaQuery = window.matchMedia('(max-width: 768px)');

  // Only run stuff, if we're on mobile devices
  if (mediaQuery.matches) enableBurgerMenuToggle();
});

function enableBurgerMenuToggle() {
  const burgerMenuToggle = document.querySelector('[data-menu-toggle]');
  const burgerMenuClose = document.querySelector('[data-menu-close]');
  const burgerMenu = document.querySelector('[data-menu]');
  const body = document.querySelector('body');

  if (!burgerMenuToggle || !burgerMenuClose || !burgerMenu) return;

  burgerMenuToggle.addEventListener('click', function() {
    burgerMenu.classList.toggle('mega-menu--open');
    body.classList.toggle('overflow-hidden');
  });

  burgerMenuClose.addEventListener('click', function() {
    burgerMenu.classList.remove('mega-menu--open');
    body.classList.remove('overflow-hidden');
  });

  enableMenuToggles();
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