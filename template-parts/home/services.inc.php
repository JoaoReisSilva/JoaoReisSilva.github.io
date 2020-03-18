<?php $args = array(
    'post_status'    => 'public',
    'post_type'      => 'proceeding',
    'posts_per_page' => -1
);
$proceeding = new WP_Query($args); ?>

<?php if ($proceeding->have_posts()) { ?>

<div id="services" class="services-block services-block_main wrapper">
  <h2 class="title-block">Юридические услуги</h2>
  <?php $counterparty_types = get_terms(array(
        'taxonomy'   => 'counterparty_type',
        'hide_empty' => false,
    )); ?>
  <?php if ($counterparty_types) {
    $counterparty_type_count = count($counterparty_types); ?>
  <div class="subtitle-block">
    Для удобства мы можем показать услуги только из какой-либо одной категории:<br>
    <?php foreach ($counterparty_types as $i => $counterparty_type) { ?>
    <?php if ($i > 0) { ?>, <?php } ?><a href="<?php echo get_term_link($counterparty_type); ?>"><?php echo mb_strtolower("{$counterparty_type->name}", 'UTF-8'); ?></a>
    <?php } ?>
  </div>
  <?php
} ?>
  <div class="services-block-list">
  <?php while ($proceeding->have_posts()) {
        $proceeding->the_post(); ?>
    <?php get_template_part('template-parts/archive/proceeding/list-item.inc'); ?>
  <?php
    } ?>
  </div>
</div>

<?php } ?>
