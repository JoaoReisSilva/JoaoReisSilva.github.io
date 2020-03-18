<div id="experience" class="experience-block experience-block_main">
  <div class="wrapper">
    <h2 class="title-block">Наши прошлые дела</h2>
    <div class="subtitle-block">
      Не верьте словам — судите по делам, а на нашем опыте таких достаточно
    </div>
    <?php $args = array(
    'post_status'    => 'public',
    'post_type'      => 'case',
    'posts_per_page' => 3
    );
    $cases = new WP_Query($args); ?>

    <?php if ($cases->have_posts()) { ?>

    <div class="experience-block-list">
    <?php while ($cases->have_posts()) {
        $cases->the_post(); ?>
      <?php get_template_part('template-parts/cases/list-item.inc'); ?>
      <?php
    } ?>
    </div>

    <?php wp_reset_postdata(); ?>

    <?php } ?>

    <?php $args = array(
    'post_type'  => 'page',
    'fields'     => 'ids',
    'nopaging'   => true,
    'meta_key'   => '_wp_page_template',
    'meta_value' => 'page-cases.php'
    ); ?>
    <?php if ($page_cases = current(get_posts($args))) { ?>
    <a href="<?php echo get_permalink($page_cases); ?>" class="experience-block-gotoall">Больше практики</a>
    <?php } ?>
  </div>
</div>