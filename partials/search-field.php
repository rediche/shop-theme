<div class="search">
  <form method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search__form">
    <button class="search__toggle">
      <svg class="search__icon">
        <g id="search"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></g>
      </svg>
    </button>
    <input class="input search__input" value="<?php echo get_search_query(); ?>" placeholder="Søg" name="s" data-search-input autocomplete="off">
    <input type="hidden" name="post_type" value="product" />
    <button class="search__submit" type="submit">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
      </svg>
    </button>
    <div class="search__results list card">
      <div data-search-results></div>
      <a class="search__more">Se flere resultater</a>
      <span class="search__no-more">Ikke flere resultater</span>
    </div>
  </form>
</div>