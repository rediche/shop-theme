document.addEventListener('DOMContentLoaded', function() {
  initSearchSuggestions();
});

function initSearchSuggestions() {
  const SEARCH_FORM = document.querySelector('.search__form');
  const SEARCH_INPUT = document.querySelector('[data-search-input]');
  const SEARCH_RESULTS = document.querySelector('.search__results');
  const MORE_RESULTS = document.querySelector('.search__more');
  const TYPE_INTERVAL = 200;
  let typingTimer;

  if (SEARCH_INPUT && SEARCH_RESULTS && MORE_RESULTS && SEARCH_FORM) {
    // Når man har fokus på inputfeltet
    SEARCH_INPUT.addEventListener('click', function(event) {
      SEARCH_INPUT.classList.add('search__input--has-results');
      SEARCH_RESULTS.classList.add('search__results--open');
    });

    // Når man klikker væk fra inputfeltet
    document.body.addEventListener('click', function (event) {
      if (!SEARCH_FORM.contains(event.target)) {
        SEARCH_INPUT.classList.remove('search__input--has-results');
        SEARCH_RESULTS.classList.remove('search__results--open');
      }
    });

    // Når man giver slip på en key
    SEARCH_INPUT.addEventListener('keyup', function(event) {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(function() {
          shouldRunSearch(event.target.value);
      }, TYPE_INTERVAL);
    });

    MORE_RESULTS.addEventListener('click', function(event) {
      SEARCH_FORM.submit();
    });
  }
}

function shouldRunSearch(value) {
  clearResults(); // Clear current results
  if (value) runSearch(value); // Only run search if value is set
}

function runSearch(value) {
  const PRODUCTS_ENDPOINT = '/wp-json/wp/v2/product';
  const MAX_PRODUCTS = 6;
  
  fetch(`${BASE_URL}${PRODUCTS_ENDPOINT}?search=${value}&_embed&per_page=${MAX_PRODUCTS}`).then(function(response) {
    return response.json();
  }).then(function(json) {
    renderProducts(json);
  });
} 

function renderProducts (json) {
  if (!json) return;

  // Hent template
  const SEARCH_TEMPLATE = document.querySelector('#search-result');
  const SEARCH_RESULTS = document.querySelector('[data-search-results]');
  const MORE_BUTTON = document.querySelector('.search__more');
  const NO_MORE_BUTTON = document.querySelector('.search__no-more');

  // Loop gennem produkter
  let forMax = json.length; // Loop igennem alle produkter.
  if (json.length > 5) forMax = 5; // Hvis der er mere end 5 i json, så loop igennem max 5.

  for (let i = 0; i < forMax; i++) {
    const RESULT_MARKUP = SEARCH_TEMPLATE.content.cloneNode(true);
    
    // Fyld data ind
    RESULT_MARKUP.querySelector('.search__result').href = json[i].link; // Product URL
    RESULT_MARKUP.querySelector('.search__result-image').src = json[i]._embedded['wp:featuredmedia'][0].media_details.sizes.thumbnail.source_url; // Image URL
    RESULT_MARKUP.querySelector('.search__result-name').innerHTML = json[i].title.rendered; // Title
    RESULT_MARKUP.querySelector('.search__result-price').innerHTML = `${json[i]._regular_price} DKK`; // Price

    // Indsæt på resultatlisten
    SEARCH_RESULTS.appendChild(RESULT_MARKUP);
  }
  
  // Indsæt flere resultater knap
  if (json.length == 6) {
    MORE_BUTTON.classList.add('search__more--show');
  } else {
    NO_MORE_BUTTON.classList.add('search__no-more--show');
  }
}

function clearResults() {
  const SEARCH_RESULTS = document.querySelector('[data-search-results]');
  SEARCH_RESULTS.innerHTML = '';

  const MORE_BUTTON = document.querySelector('.search__more');
  MORE_BUTTON.classList.remove('search__more--show');

  const NO_MORE_BUTTON = document.querySelector('.search__no-more');
  NO_MORE_BUTTON.classList.remove('search__no-more--show');
}