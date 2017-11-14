<!DOCTYPE html>
<html lang="da">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Page title</title>
  <?php wp_head(); ?>
</head>
<body>

<header class="header">
  <div class="container">

    <?php 
    wp_nav_menu( array(
      'theme_location' => 'top-menu',
      'menu_class' => 'top-header col',
      'container_class' => 'row'
    ));
    ?>

    <!-- <div class="row">
      
      <nav class="top-header col">
        <a href="#" class="top-header__link">Top Link 1</a>
        <a href="#" class="top-header__link">Top Link 2</a>
        <a href="#" class="top-header__link">Top Link 3</a>
      </nav>
    </div> -->

    <div class="row">
      <div class="middle-header col">
        <button class="middle-header__menu-toggle">
          <svg  class="middle-header__menu-toggle-icon">
            <g id="menu"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></g>
          </svg>
        </button>

        <div class="middle-header__logo">
          <img src="<?php echo get_template_directory_uri() ?>/images/holtehobby-logo.svg" alt="Logo">
        </div>

        <div class="middle-header__search">
          <button class="middle-header__search-toggle">
            <svg class="middle-header__search-icon">
              <g id="search"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></g>
            </svg>
          </button>
          <input class="input input--raised middle-header__search-input" placeholder="Søg">
        </div>

        <a class="middle-header__shopping-cart" href="#">
          <svg class="middle-header__shopping-cart-icon">
            <g id="shopping-cart"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></g>
          </svg>
          <span class="middle-header__shopping-cart-label">Indkøbskurv</span>
        </a>
      </div>
    </div>

  </div>
</header>

<nav class="mega-menu">
  <div class="container">
    <div class="row mega-menu__logo-row">
      <div class="col">
        <img class="mega-menu__logo" src="<?php echo get_template_directory_uri() ?>/images/holtehobby-logo-dark.svg" alt="Logo">
      </div>
    </div>
    <?php 
    wp_nav_menu( array(
      'theme_location' => 'mega-menu',
      'menu_class' => 'mega-menu__list col',
      'container_class' => 'row'
    ));
    ?>
  </div>
</nav>