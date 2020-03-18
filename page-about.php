<?php /* Template Name: О компании */ ?>

<?php get_header('inner'); ?>

<?php get_template_part('template-parts/breadcrumbs.inc'); ?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

<main class="content wrapper">
  <h1 class="title-block"><?php the_title(); ?></h1>
  <?php if ($about_subtitle = get_field('about_subtitle')) { ?>
  <h2 class="subtitle-block">
    <?php echo $about_subtitle; ?>
  </h2>
  <?php } ?>
  <?php if ($about_text = get_field('about_text')) { ?>
    <?php echo $about_text; ?>
  <?php } ?>
</main>

<?php if ( have_rows('about_suggests') ) { while ( have_rows('about_suggests') ) { the_row(); ?>
<div class="suggest-block wrapper">
  <?php if ($about_suggests_title = get_field('about_suggests_title')) { ?>
  <h2 class="suggest-block__title"><?php echo $about_suggests_title; ?></h2>
  <?php } ?>

  <?php if ( have_rows('about_suggests_list') ) { ?>
  <div class="suggest-block-list">
  <?php while ( have_rows('about_suggests_list') ) { the_row(); ?>
    <?php if ($about_suggests_list_item = get_sub_field('about_suggests_list_item')) { ?>
    <div class="suggest-block-item suggest-block-item_<?php the_sub_field('about_suggests_list_item_icon'); ?>">
      <?php echo $about_suggests_list_item; ?>
    </div>
    <?php } ?>
    <?php } ?>
  </div>
  <?php } ?>
</div>
<?php } } ?>

<?php get_template_part('template-parts/callback.inc'); ?>

<?php
    }
} ?>

<?php get_footer(); ?>
