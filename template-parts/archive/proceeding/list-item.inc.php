<div class="services-block-item services-block-item_<?php echo get_field('proceeding_icon'); ?>">
  <div class="services-block-item__selector"><?php the_title(); ?></div>
  <a href="<?php the_permalink(); ?>" class="services-block-item__info">
    <span class="services-block-item__title"><?php the_title(); ?></span>
    <span class="services-block-item__text">
      <?php the_excerpt(); ?>
    </span>
    <span class="services-block-item__link">Подробнее</span>
  </a>
</div>
