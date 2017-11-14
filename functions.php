<?php

// Load style and script files
function setup_styles_and_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_directory_uri().'/build/style.css' );
}
add_action( 'wp_enqueue_scripts', 'setup_styles_and_scripts' );

function register_my_menu() {
  register_nav_menu( 'mega-menu', __( 'Primær Menu', 'holte-hobby' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

?>