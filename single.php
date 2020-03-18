<?php get_header('inner'); ?>

<?php get_template_part('template-parts/breadcrumbs.inc'); ?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

<main class="content news-item wrapper">
  <div class="news-item-head">
    <h1 class="title-block"><?php the_title(); ?></h1>
  </div>
  <div class="news-item-middle">
    <?php the_content(); ?>
  </div>
  <div class="news-item-foot">
    <div class="news-item-date">Опубликовано <?php the_time( 'j F Y' ); ?></div>
  </div>
</main>

<?php } ?>

<?php get_template_part('template-parts/single/related.inc'); ?>

<?php } ?>

<?php get_footer(); ?>
