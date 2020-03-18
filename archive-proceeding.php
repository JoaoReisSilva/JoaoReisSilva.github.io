<?php get_header('inner'); ?>

<?php get_template_part('template-parts/breadcrumbs.inc'); ?>

<main class="content wrapper">
  <h1 class="title-block"><?php the_archive_title(); ?></h1>
  <?php $counterparty_types = get_terms(array(
        'taxonomy'   => 'counterparty_type',
        'hide_empty' => false,
    )); ?>
  <?php if ($counterparty_types) {
        $counterparty_type_count = count($counterparty_types); ?>
  <h2 class="subtitle-block">
    Для удобства мы можем показать услуги только из какой-либо одной категории:<br>
    <?php foreach ($counterparty_types as $i => $counterparty_type) { ?>
    <?php if ($i > 0) { ?>, <?php } ?><a href="<?php echo get_term_link($counterparty_type); ?>"><?php echo mb_strtolower("{$counterparty_type->name}", 'UTF-8'); ?></a>
    <?php } ?>
  </h2>
  <?php
    } ?>
  <?php if (have_posts()) { ?>
  <div class="services-block-list">
    <?php while (have_posts()) {
        the_post(); ?>
      <?php get_template_part('template-parts/archive/proceeding/list-item.inc'); ?>
    <?php
    } ?>
  </div>
  <?php } ?>
</main>

<?php get_template_part('template-parts/callback.inc'); ?>

<?php get_footer(); ?>
