<?php get_header('inner'); ?>

<?php get_template_part('template-parts/breadcrumbs.inc'); ?>

<main class="content wrapper">
  <h1 class="title-block"><?php the_archive_title(); ?></h1>

  <?php if (have_posts()) { ?>

  <div class="news-block-list">
    <?php while (have_posts()) {
    the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="news-block-item">
      <span class="news-block-item__title"
        ><?php the_title(); ?></span
      >
      <span class="news-block-item__text">
        <?php the_excerpt(); ?>
      </span>
      <span class="news-block-item__date"><?php the_time( 'j F Y' ); ?></span>
    </a>
    <?php
} ?>
  </div>

  <?php get_template_part('template-parts/archive/pagination.inc'); ?>

  <?php } ?>

</main>

<?php get_footer(); ?>
