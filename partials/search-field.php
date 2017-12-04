<div class="search" data-search>
  <form method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search__form" data-search-form>
    <input class="input search__input" data-search-input value="<?php echo get_search_query(); ?>" placeholder="Søg" name="s" data-search-input autocomplete="off">
    <input type="hidden" name="post_type" value="product" />
    <button class="search__submit" aria-label="Search" type="submit">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
      </svg>
    </button>
    <button class="search__toggle" aria-label="Open and close search" data-search-toggle>
      <svg style="width:24px;height:24px" class="search__icon open" viewBox="0 0 24 24">
        <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
      </svg>
      <svg style="width:24px;height:24px" class="search__icon close" viewBox="0 0 24 24">
        <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
      </svg>
    </button>
    <div class="search__results list card">
      <div data-search-results></div>
      <a class="search__more">Se flere resultater</a>
      <span class="search__no-more">Ikke flere resultater</span>
    </div>
  </form>
</div>