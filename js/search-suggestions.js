document.addEventListener('DOMContentLoaded', function() {
  initSearchSuggestions();
});

function initSearchSuggestions() {
  console.log("Search suggestions running...");
  console.log("Base URL", BASE_URL);

  runSearch();
}

function runSearch() {
  const PRODUCTS_ENDPOINT = '/wp-json/wp/v2/product';
  const SEARCH_INPUT = document.querySelector('[data-search-input]');

  fetch(`${BASE_URL}${PRODUCTS_ENDPOINT}?search=${SEARCH_INPUT.value}`).then(function(response) {
    return response.json();
  }).then(function(json) {
    console.log(json);
    renderProducts(json);
  });
} 

function renderProducts (json) {
  if (!json) return;

  // Loop gennem produkter
  // Hent template
  // Fyld data ind
  // Indsæt på resultatlisten
  // Indsæt flere resultater knap
}