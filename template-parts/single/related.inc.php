<?php $queried_object =  get_queried_object(); ?>

<?php $args = array(
    'post_status'    => 'public',
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post__not_in'   => array($queried_object->ID),
    'tax_query' => array(
      array(
          'taxonomy' => 'category',
          'field'    => 'term_id',
          'terms'    => array(current(get_the_terms($queried_object->ID, 'category'))->term_id)
      )
    )
);
$posts = new WP_Query($args); ?>

<?php if ($posts->have_posts()) { ?>

<div class="related-news wrapper">
  <h2 class="related-news-title">Другие новости</h2>
  <div class="news-block-list">
    <?php while ($posts->have_posts()) {
    $posts->the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="news-block-item">
      <span class="news-block-item__title"
        ><?php the_title(); ?></span
      >
      <span class="news-block-item__text">
        <?php the_excerpt(); ?>
      </span>
      <span class="news-block-item__date"><?php the_time('j F Y'); ?></span>
    </a>
    <?php
} ?>

<?php wp_reset_postdata(); ?>

  </div>
</div>

<?php } ?>