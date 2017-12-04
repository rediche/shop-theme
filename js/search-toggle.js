document.addEventListener('DOMContentLoaded', function() {
  initSearchToggle();
});

function initSearchToggle() {
  const searchWrapper = document.querySelector('[data-search]');
  const searchToggle = document.querySelector('[data-search-toggle]');
  const searchInput = document.querySelector('[data-search-input]');
  const searchSubmit = document.querySelector('.search__submit');

  const logo = document.querySelector('.middle-header__logo');
  const menuIcon = document.querySelector('.middle-header__menu-toggle');
  const shoppingCart = document.querySelector('.shopping-cart');

  if (!searchWrapper || !searchToggle || !searchInput || !searchSubmit) return;
  if (!logo || !menuIcon || !shoppingCart) return;

  searchToggle.addEventListener('click', function(event) {
    event.preventDefault();

    searchWrapper.classList.toggle('search--open');
    searchToggle.classList.toggle('search__toggle--close');
    searchInput.classList.toggle('search__input--show');
    searchSubmit.classList.toggle('search__submit--show');

    logo.classList.toggle('middle-header__logo--hide');
    menuIcon.classList.toggle('middle-header__menu-toggle--hide');
    shoppingCart.classList.toggle('shopping-cart--hide');

  });
}