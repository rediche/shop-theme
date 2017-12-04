<!DOCTYPE html>
<html lang="da">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

    <div class="row">
      <div class="middle-header col">
        <button class="middle-header__menu-toggle" aria-label="Open Menu" data-menu-toggle>
          <svg  class="middle-header__menu-toggle-icon">
            <g id="menu"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></g>
          </svg>
        </button>

        <div class="middle-header__logo">
          <a href="<?php echo get_home_url(); ?>" title="Til forsiden"><img src="<?php echo get_template_directory_uri() ?>/images/holtehobby-logo.svg" alt="Logo"></a>
        </div>

        <?php get_template_part('partials/search', 'field'); ?>

        <a class="shopping-cart" href="<?php echo wc_get_cart_url(); ?>" title="Se din indkøbskurv">
          <svg class="shopping-cart__icon">
            <g id="shopping-cart"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></g>
          </svg>
          <span class="shopping-cart__label">
            <div class="shopping-cart__label-text">Indkøbskurv</div>
            <div class="shopping-cart__price">Totalt <span class="shopping-cart__price-value"><?php echo WC()->cart->get_total(); ?></span></div>
          </span>
        </a>
      </div>
    </div>

  </div>
</header>

<nav class="mega-menu" data-menu>
  <div class="mega-menu__close">
    <div class="mega-menu__logo-row">
      <img class="mega-menu__logo" src="<?php echo get_template_directory_uri() ?>/images/holtehobby-logo-dark.svg" alt="Logo">
    </div>
    <button class="mega-menu__close-button" aria-label="Close Menu" data-menu-close>
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
          <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
      </svg>
    </button>
  </div>
  <div class="container mega-menu__container">
    <?php 
    wp_nav_menu( array(
      'theme_location' => 'mega-menu',
      'menu_class' => 'mega-menu__list col',
      'container_class' => 'row'
    ));
    ?>
  </div>
</nav>