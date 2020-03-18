<div class="experience-block-item">
  <div class="experience-block-item__title">
    <?php the_title(); ?>
  </div>
  <?php if (have_rows('case_characteristics')) {
    while (have_rows('case_characteristics')) {
        the_row(); ?>
  <div class="experience-block-item__info">
    <div class="experience-block-item__info__title"><?php the_sub_field('case_characteristics_item_title'); ?></div>
    <div class="experience-block-item__info__text"><?php the_sub_field('case_characteristics_item_text'); ?></div>
  </div>
  <?php
    } ?>
  <?php
} ?>
  <?php if ($case_link = get_field('case_link')) { ?>
  <a href="<?php echo $case_link; ?>" class="experience-block-item__link" target="_blank">Решение суда</a>
  <?php } ?>
</div>
