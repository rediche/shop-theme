// Don't do stuff until DOMContentLoaded happens.
document.addEventListener("DOMContentLoaded", function(event) { 
  enableBurgerMenuToggle();
});

function enableBurgerMenuToggle() {
  const burgerMenuToggle = document.querySelector('[data-menu-toggle]');
  const burgerMenuClose = document.querySelector('[data-menu-close]');
  const burgerMenu = document.querySelector('[data-menu]');

  if (!burgerMenuToggle || !burgerMenuClose || !burgerMenu) return;

  burgerMenuToggle.addEventListener('click', function() {
    burgerMenu.classList.toggle('mega-menu--open');
  });

  burgerMenuClose.addEventListener('click', function() {
    burgerMenu.classList.remove('mega-menu--open');
  });
}
