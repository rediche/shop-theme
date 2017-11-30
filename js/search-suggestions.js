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

  fetch(`${BASE_URL}${PRODUCTS_ENDPOINT}?search=${SEARCH_INPUT.value}&_embed`).then(function(response) {
    return response.json();
  }).then(function(json) {
    console.log(json);
    renderProducts(json);
  });
} 

function renderProducts (json) {
  if (!json) return;

  // Hent template
  const TEMPLATE = document.querySelector('#search-result');
  const SEARCH_RESULTS = document.querySelector('[data-search-results]');

  // Loop gennem produkter
  json.forEach(function(product) {
    const RESULT_MARKUP = TEMPLATE.content.cloneNode(true);
    
    RESULT_MARKUP.querySelector('.search__result').href = product.link; // Product URL
    RESULT_MARKUP.querySelector('.search__result-image').src = product._embedded['wp:featuredmedia'][0].media_details.sizes.thumbnail.source_url; // Image URL
    RESULT_MARKUP.querySelector('.search__result-name').innerHTML = product.title.rendered; // Title
    RESULT_MARKUP.querySelector('.search__result-price').innerHTML = `${product._regular_price} DKK`; // Price

    // Add to results container
    SEARCH_RESULTS.appendChild(RESULT_MARKUP);
  });
  // Fyld data ind
  // Indsæt på resultatlisten
  // Indsæt flere resultater knap
}