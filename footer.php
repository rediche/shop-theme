<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-4 col-lg-6">
        <img class="footer__logo" src="<?php echo get_template_directory_uri() ?>/images/holtehobby-logo.svg" alt="Logo">
        <p class="footer__about">Holte Modelhobby<br>
        Øverødvej 5, 2840 Holte<br>
        Tlf.: <a href="tel:+4545420113">+45 45 42 01 13</a><br>
        <a href="mailto:info@holte-modelhobby.dk">info@holte-modelhobby.dk</a></p>
      </div>
      <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
        <div class="col-sm-12 col-md-4 col-lg-3" role="complementary">
          <?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
      <?php endif; ?>
      <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
        <div class="col-sm-12 col-md-4 col-lg-3" role="complementary">
          <?php dynamic_sidebar( 'footer-2' ); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php wp_footer(); ?>

<? // Brugt til search-suggestions.js ?>
<script>
  const BASE_URL = "<?php echo get_home_url(); ?>";
</script>

<?php get_template_part('partials/search', 'result'); ?>
</body>
</html>