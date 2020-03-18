<?php /* Template Name: Наш опыт */ ?>

<?php get_header('inner'); ?>

<?php get_template_part('template-parts/breadcrumbs.inc'); ?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

<main class="content wrapper">
  <h1 class="title-block"><?php the_title(); ?></h1>
    <?php
    $args = array(
        'post_status'    => 'public',
        'post_type'      => 'case',
        'posts_per_page' => 6,
        'paged'          => max(1, get_query_var('paged'))
    );

        $cases = new WP_Query($args); ?>

    <?php if ($cases->have_posts()) { ?>

    <?php set_query_var('cases_max_num_pages', $cases->max_num_pages); ?>

    <div class="experience-block-list">
    <?php while ($cases->have_posts()) {
            $cases->the_post(); ?>

    <?php get_template_part('template-parts/cases/list-item.inc'); ?>

    <?php
        } ?>
    </div>

    <?php get_template_part('template-parts/cases/pagination.inc'); ?>

    <?php } ?>
</main>

<?php
    }
} ?>

<?php get_footer(); ?>
