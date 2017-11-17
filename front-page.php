<?php get_header(); ?>

<div class="front-page">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <a class="card category-entry" href="#">
          <div class="category-entry__inner" style="background-image:url('<?php echo get_template_directory_uri() ?>/images/categories/til-lands-spejlvendt.jpg');">
            <h2>Til lands</h2>
          </div>
        </a>
      </div>
      <div class="col-sm-12 col-md-4">
        <a class="card category-entry" href="#">
          <div class="category-entry__inner" style="background-image:url('<?php echo get_template_directory_uri() ?>/images/categories/til-vands.jpg');">
            <h2>Til vands</h2>
          </div>
        </a>
      </div>
      <div class="col-sm-12 col-md-4">
        <a class="card category-entry" href="#">
          <div class="category-entry__inner" style="background-image:url('<?php echo get_template_directory_uri() ?>/images/categories/i-luften.jpg');">
            <h2>I luften</h2>
          </div>
        </a>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="product-section__header">
          <h2 class="product-section__title">Nuværende tilbud</h2>
          <a href="#" class="product-section__see-more">Se flere</a>
        </div>
      </div>

      <?php
        $sale_args = array(
          'post_type' => 'product',
          'posts_per_page' => 3,
          'post_status' => 'publish',
          'meta_query' => WC()->query->get_meta_query(),
          'post__in' => array_merge( array(0), wc_get_product_ids_on_sale() )
        );
        $loop = new WP_Query( $sale_args );
        if ( $loop->have_posts() ) {
          while ( $loop->have_posts() ) : $loop->the_post();
            wc_get_template_part( 'content', 'product' );
          endwhile;
        } else {
          echo __( 'Ingen produkter fundet' );
        }
        wp_reset_postdata();
      ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>