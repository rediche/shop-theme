<?php 
/*
Template Name: Nuværende Tilbud
*/
?>
<?php get_header(); ?>

<div class="page content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <h1 class="page__title"><?php the_title() ?></h1>
                <?php the_content() ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <div class="row">
        <?php
          $sale_args = array(
            'post_type' => 'product',
            'posts_per_page' => 12,
            'post_status' => 'publish',
            'meta_query' => WC()->query->get_meta_query(),
            'post__in' => array_merge( array(0), wc_get_product_ids_on_sale() )
          );
          $loop = new WP_Query( $sale_args );
          if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
              ?>
          <div class="col-sm-6 col-md-3">
            <?php
              wc_get_template_part( 'content', 'product' );
              ?>
          </div>
          <?php
            endwhile;
          ?>
          <nav class="woocommerce-pagination pagination">
            <?php
              echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
                'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                'format'       => '',
                'add_args'     => false,
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'total'        => $loop->max_num_pages,
                'prev_text'    => '&larr;',
                'next_text'    => '&rarr;',
                'type'         => 'list',
                'end_size'     => 3,
                'mid_size'     => 3,
              ) ) );
            ?>
          </nav>
          <?php
          } else {
            echo __( 'Ingen produkter fundet' );
          }
          wp_reset_postdata();
        ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>