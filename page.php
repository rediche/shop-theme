<?php get_header(); ?>

<div class="page">
  <div class="container">
    <div class="row">
      <div class="col">
      <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
              <h1 class="page__title"><?php the_title() ?></h1>
              <?php the_content() ?>
          <?php endwhile; ?>
      <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>