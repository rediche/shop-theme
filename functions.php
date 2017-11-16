<?php

// Load style and script files
function hh_setup_styles_and_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_directory_uri().'/build/style.css' );
}
add_action( 'wp_enqueue_scripts', 'hh_setup_styles_and_scripts' );

// Menus
function hh_register_menus() {
  register_nav_menu( 'mega-menu', __( 'Primær Menu', 'holte-hobby' ) );
  register_nav_menu( 'top-menu', __( 'Top Menu', 'holte-hobby' ) );
}
add_action( 'after_setup_theme', 'hh_register_menus' );

// Widget areas
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

// WooCommerce Breadcrumbs
function hh_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<div class="container"><div class="row"><div class="col"><nav class="woocommerce-breadcrumb breadcrumbs card" itemprop="breadcrumb">',
            'wrap_after'  => '</nav></div></div></div>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
add_filter( 'woocommerce_breadcrumb_defaults', 'hh_woocommerce_breadcrumbs' );

// WooCommerce remove reviews tab
function hh_woo_remove_product_tabs( $tabs ) {

    //unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    //unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'hh_woo_remove_product_tabs', 98 );

// WooCommerce rename tabs
function hh_woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Mere information' );		// Rename the description tab
	//$tabs['reviews']['title'] = __( 'Ratings' );				// Rename the reviews tab
  $tabs['additional_information']['title'] = __( 'Produktspecifikation' );	// Rename the additional information tab

	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'hh_woo_rename_tabs', 98 );
?>