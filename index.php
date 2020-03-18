<?php get_header('inner'); ?>

<?php get_template_part('template-parts/breadcrumbs.inc'); ?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

<main class="content wrapper">
  <h1 class="title-block"><?php the_title(); ?></h1>
  <?php the_content(); ?>
</main>

<?php
    }
} ?>

<?php get_footer(); ?>