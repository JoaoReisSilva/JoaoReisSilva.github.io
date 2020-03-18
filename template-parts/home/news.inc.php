<?php
$categories = get_terms(array(
    'taxonomy'   => 'category',
    'hide_empty' => false,
));

$cat_id = current($categories)->term_id;

$args = array(
    'post_status'    => 'public',
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'tax_query' => array(
      array(
          'taxonomy' => 'category',
          'field'    => 'term_id',
          'terms'    => array($cat_id)
      )
    )
);
$news = new WP_Query($args); ?>

<?php if ($news->have_posts()) { ?>

<div id="news" class="news-block news-block_main wrapper">
  <h2 class="title-block">Статьи и новости</h2>
  <div class="subtitle-block">
    Свежие материалы о компании и важных событиях правовой сферы
  </div>
  <div class="news-block-list">
  <?php while ($news->have_posts()) {
    $news->the_post(); ?>
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
  <a href="<?php echo get_term_link($cat_id, 'category'); ?>" class="news-block-gotoall">Все публикации</a>
</div>

<?php } ?>