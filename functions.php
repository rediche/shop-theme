<?php

// Load style and script files
function hh_setup_styles_and_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_directory_uri().'/build/style.css' );
}
add_action( 'wp_enqueue_scripts', 'hh_setup_styles_and_scripts' );

function hh_register_menus() {
  register_nav_menu( 'mega-menu', __( 'Primær Menu', 'holte-hobby' ) );
  register_nav_menu( 'top-menu', __( 'Top Menu', 'holte-hobby' ) );
}
add_action( 'after_setup_theme', 'hh_register_menus' );

function hh_widgets_init() {
  register_sidebar( array(
      'name'          => __( 'Footer #1', 'holte-hobby' ),
      'id'            => 'footer-1',
      'before_widget' => '<div class="footer__widget">',
      'after_widget'  => '</div>'
  ) );

  register_sidebar( array(
      'name'          => __( 'Footer #2', 'holte-hobby' ),
      'id'            => 'footer-2',
      'before_widget' => '<div class="footer__widget">',
      'after_widget'  => '</div>'
  ) );
}
add_action( 'widgets_init', 'hh_widgets_init' );

?>