<?php /* Template Name: Карьера */ ?>

<?php get_header('inner'); ?>

<?php get_template_part('template-parts/breadcrumbs.inc'); ?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

<main class="content wrapper">
  <h1 class="title-block"><?php the_title(); ?></h1>
  <?php if ($career_subtitle = get_field('career_subtitle')) { ?>
  <h2 class="subtitle-block">
    <?php echo $career_subtitle; ?>
  </h2>
  <?php } ?>

  <?php if ( have_rows('career_advantages') ) { ?>
  <ul class="career-block-list">
    <?php while ( have_rows('career_advantages') ) { the_row(); ?>
    <li class="career-block-item"><?php the_sub_field('career_advantages_item'); ?></li>
    <?php } ?>
  </ul>
  <?php } ?>
</main>

<?php get_template_part('template-parts/career/vacancy.inc'); ?>

<?php
    }
} ?>

<?php get_footer(); ?>