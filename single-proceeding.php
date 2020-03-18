<?php get_header('inner'); ?>

<?php get_template_part('template-parts/breadcrumbs.inc'); ?>

<main class="content services-item wrapper">

  <?php get_template_part('template-parts/single/proceeding/sidebar.inc'); ?>

  <?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

  <div class="services-item-content">
    <h1 class="title-block"><?php the_title(); ?></h1>

    <?php the_content(); ?>

    <h2><?php the_field('proceeding_accordion_title'); ?></h2>

    <?php if (have_rows('proceeding_accordion_list')) { ?>

    <div class="accordion-block">
      <div class="accordion-block-list">
        <?php while (have_rows('proceeding_accordion_list')) { the_row(); ?>
        <div class="accordion-block-item">
          <?php if ($proceeding_accordion_list_title = get_sub_field('proceeding_accordion_list_title')) { ?>
          <div class="accordion-block-item__title"><?php echo $proceeding_accordion_list_title; ?></div>
          <?php } ?>
          <?php if ($proceeding_accordion_list_text = get_sub_field('proceeding_accordion_list_text')) { ?>
          <div class="accordion-block-item__text">
            <?php echo $proceeding_accordion_list_text; ?>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
      </div>
    </div>

    <?php } ?>

  </div>
</main>

  <?php
    }
} ?>

<?php get_template_part('template-parts/callback.inc'); ?>

<?php get_footer(); ?>
