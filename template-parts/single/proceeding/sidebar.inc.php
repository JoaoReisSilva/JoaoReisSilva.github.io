<?php $queried_object =  get_queried_object(); ?>

<?php $args = array(
    'post_status'    => 'public',
    'post_type'      => 'proceeding',
    'posts_per_page' => -1
);
$proceeding = new WP_Query($args); ?>

<?php if ($proceeding->have_posts()) { ?>

<div class="services-item-sidebar">
  <div class="services-item-sidebar__title">Все услуги</div>
  <ul class="menu">
    <?php while ($proceeding->have_posts()) { $proceeding->the_post(); ?>
    <li <?php if ($queried_object->ID === get_the_ID()) { ?>class="current-menu-item"<?php } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php } ?>
    <?php wp_reset_postdata(); ?>
  </ul>
</div>

<?php } ?>
