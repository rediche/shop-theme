<?php 
/*
Template Name: Fysisk Butik
*/
?>
<?php get_header(); ?>

<div class="page content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-lg-6">
      <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
              <h1 class="page__title"><?php the_title() ?></h1>
              <?php the_content() ?>
          <?php endwhile; ?>
      <?php endif; ?>
      </div>
      <div class="col-sm-12 col-lg-6">
        <iframe class="card" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2241.9288267046336!2d12.47201311582504!3d55.81183599490503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46524f1ec8f16b3d%3A0x707fc5e3a7c69b2f!2sHolte+Hobby!5e0!3m2!1sda!2sdk!4v1512394514369" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>