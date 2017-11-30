<div class="search">
  <form method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search__form">
    <button class="search__toggle">
      <svg class="search__icon">
        <g id="search"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></g>
      </svg>
    </button>
    <input class="input search__input" value="<?php echo get_search_query(); ?>" placeholder="Søg" name="s" data-search-input autocomplete="off">
    <input type="hidden" name="post_type" value="product" />
    <div class="search__results list card">
      <div data-search-results></div>
      <a class="search__more">Se flere resultater</a>
    </div>
  </form>
</div>