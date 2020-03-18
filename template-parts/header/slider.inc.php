<?php setup_postdata(get_queried_object()); ?>

<?php if (have_rows('home_slider')) { ?>

<div class="header-slider">
  <?php while (have_rows('home_slider')) {
    the_row(); ?>
  <div>
    <div class="header-slider-item">
      <div class="header-slider-item__layer_one"></div>
      <?php if ($home_slider_item_top_word = get_sub_field('home_slider_item_top_word')) { ?>
      <div class="header-slider-item__word header-slider-item__word_top">
        <?php echo $home_slider_item_top_word; ?>
      </div>
      <?php } ?>
      <?php if ($home_slider_item_bottom_word = get_sub_field('home_slider_item_bottom_word')) { ?>
      <div class="header-slider-item__word header-slider-item__word_bottom">
        <?php echo $home_slider_item_bottom_word; ?>
      </div>
      <?php } ?>
      <div class="wrapper">
        <div class="header-slider-item__info">
          <?php if ($home_slider_item_title = get_sub_field('home_slider_item_title')) { ?>
          <div class="header-slider-item__title"><?php echo $home_slider_item_title; ?></div>
          <?php } ?>
          <?php if ($home_slider_item_text = get_sub_field('home_slider_item_text')) { ?>
          <div class="header-slider-item__text">
            <?php echo $home_slider_item_text; ?>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <?php
} ?>
</div>

<?php } ?>

<?php wp_reset_postdata(); ?>
