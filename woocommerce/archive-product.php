<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <form type="get" class="sidebar" data-sidebar>
                    <div class="sidebar__close">
                        <button class="sidebar__close-button" data-sidebar-close>
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                            </svg>
                        </button>
                    </div>
                    <?php if (is_search()) : ?>
                        <input type="hidden" name="s" value="<?php echo get_search_query(); ?>" />
                        <input type="hidden" name="post_type" value="product" />
                    <?php endif ?>
                    
                    <?php
                    $parentid = get_queried_object_id();
                    $subcategories_args = array('parent' => $parentid);
                    $subcategories = get_terms( 'product_cat', $subcategories_args );

                    if ($subcategories && !is_search()) :
                    ?>
                    <h3 class="sidebar__header"><?php woocommerce_page_title(); ?></h3>
                    <div class="sidebar__categories sidebar__card card">
                        <ul class="list">
                            <?php foreach ($subcategories as $subcategory) : ?>
                            <li class="list__item">
                                <a href="<?php echo esc_url(get_term_link($subcategory)); ?>" class="<?php echo $subcategory->slug; ?>">
                                    <?php echo $subcategory->name .' ('. $subcategory->count .')'; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php
                    endif;
                    ?>

                    <?php
                        $category = get_term( intval(get_queried_object_id()), 'product_cat' );
                        $maxprice = get_category_max_price($category);
                        wp_reset_postdata();

                        $current_maxprice = $maxprice;
                        if (isset($_GET['max_price']) && !empty($_GET['max_price'])) {
                            $current_maxprice = $_GET['max_price'];
                        }
                    ?>

                    <h3 class="sidebar__header">Pris</h3>
                    <div class="sidebar__price sidebar__card card">
                        <input type="number" name="min_price" class="input" value="0" step="1" min="0" max="<?php echo $maxprice; ?>"> – <input type="number" name="max_price" class="input" value="<?php echo $current_maxprice; ?>" step="1" min="0" max="<?php echo $maxprice; ?>">
                    </div>

                    <button class="button button--raised button--fullwidth sidebar__filter" type="submit">Filtrer</button>
                </form>
            </div>
            
            <div class="col-sm-12 col-lg-9">
                <header class="woocommerce-products-header">

                    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

                        <h1 class="woocommerce-products-header__title page-title category__title"><?php woocommerce_page_title(); ?></h1>

                    <?php endif; ?>

                    <?php
                        /**
                         * woocommerce_archive_description hook.
                         *
                         * @hooked woocommerce_taxonomy_archive_description - 10
                         * @hooked woocommerce_product_archive_description - 10
                         */
                        do_action( 'woocommerce_archive_description' );
                    ?>

                </header>

                <?php if ( have_posts() ) : ?>

                    <?php
                        /**
                         * woocommerce_before_shop_loop hook.
                         *
                         * @hooked wc_print_notices - 10
                         * @hooked woocommerce_result_count - 20
                         * @hooked woocommerce_catalog_ordering - 30
                         */
                        //do_action( 'woocommerce_before_shop_loop' );
                        wc_print_notices();
                    ?>
                    <div class="category__sort row">
                        <div class="col-xs-6 col-sm-7">
                            <?php woocommerce_result_count(); ?>
                        </div>
                        <div class="col-xs-6 col-sm-5">
                            <?php woocommerce_catalog_ordering(); ?>
                        </div>
                    </div>

                    <button class="button button--fullwidth button--raised sidebar__toggle" data-sidebar-toggle>Filtrer</button>

                    <?php woocommerce_product_loop_start(); ?>

                        <?php woocommerce_product_subcategories(); ?>

                        <div class="row">
                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php
                                /**
                                 * woocommerce_shop_loop hook.
                                 *
                                 * @hooked WC_Structured_Data::generate_product_data() - 10
                                 */
                                do_action( 'woocommerce_shop_loop' );
                            ?>
                            <div class="col-sm-6 col-md-4">
                                <?php wc_get_template_part( 'content', 'product' ); ?>
                            </div>

                        <?php endwhile; // end of the loop. ?>
                        </div>
                    <?php woocommerce_product_loop_end(); ?>

                    <?php
                        /**
                         * woocommerce_after_shop_loop hook.
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action( 'woocommerce_after_shop_loop' );
                    ?>

                <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                    <?php
                        /**
                         * woocommerce_no_products_found hook.
                         *
                         * @hooked wc_no_products_found - 10
                         */
                        do_action( 'woocommerce_no_products_found' );
                    ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
   
    

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>