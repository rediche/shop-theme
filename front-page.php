<?php get_header(); ?>

<div class="front-page">
  <div class="container">
    <div class="row">
      <?php
      $locations = get_nav_menu_locations(); // Find WP Nav Locations
      $cta_menu = get_term($locations['tag-menu']); // Choose the right location
      $cta_menu_items = wp_get_nav_menu_items($cta_menu->term_id); // Get nav items from said menu
      $cta_images[0] = 'til-lands-spejlvendt.jpg';
      $cta_images[1] = 'til-vands.jpg';
      $cta_images[2] = 'i-luften.jpg';
      foreach ($cta_menu_items as $key => $item) :
      ?>
        <div class="col-sm-12 col-md-4">
          <a class="card category-entry" href="<?php echo $item->url; ?>">
          <div class="category-entry__inner" style="background-image:url('<?php echo get_template_directory_uri() ?>/images/categories/<?php echo $cta_images[$key]; ?>');">
            <h2><?php echo $item->title; ?></h2>
          </div>
        </a>
        </div>
        <?php
      endforeach;
      ?>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="product-section__header">
          <h2 class="product-section__title">Nuværende tilbud</h2>
          <?php
            // Find side ID på sider med page template: "on-sale.php". 
            $sale_page_args = array(
              'post_type' => 'page',
              'fields' => 'ids',
              'nopaging' => true,
              'meta_key' => '_wp_page_template',
              'meta_value' => 'on-sale.php'
            );
            $pages = get_posts( $sale_page_args );
            if (isset($pages[0]) && !empty($pages[0])) {
              ?><a href="<?php echo get_permalink($pages[0]); ?>" class="product-section__see-more">Se flere</a><?php
            }
          ?>
          
        </div>
      </div>

      <?php
        $sale_args = array(
          'post_type' => 'product',
          'posts_per_page' => 4,
          'orderby' => 'rand',
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
        } else {
          echo __( 'Ingen produkter fundet' );
        }
        wp_reset_postdata();
      ?>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="product-section__header">
          <h2 class="product-section__title">Nye produkter</h2>
          <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="product-section__see-more">Se flere</a>
        </div>
      </div>

      <?php
        $sale_args = array(
          'post_type' => 'product',
          'posts_per_page' => 4,
          'post_status' => 'publish',
          'orderby' => 'date',
          'order' => 'DESC'
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
        } else {
          echo __( 'Ingen produkter fundet' );
        }
        wp_reset_postdata();
      ?>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card store-section">
          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <img class="store-section__image" src="<?php echo get_template_directory_uri() ?>/images/frontpage-store.jpg" alt="">
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="store-section__content">
                <h1 class="store-section__heading">Besøg Holte Hobby</h1>
                <p class="store-section__body">Kom og besøg Holte Hobby i Holte. Vi har en butik på 300 kvm med produkter i massevis. Vi står altid klar til at hjælpe med hvad du har brug for - om det gælder reparation af ødelagt udstyr, hjælp til køb af en vare eller noget helt tredje - bare spørg.</p>
                <button class="button store-section__button">Besøg vores butik</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
