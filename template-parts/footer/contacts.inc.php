<div class="footer-contacts">
  <div class="footer-contacts__item footer-contacts__item_phone">
    <?php if ($footer_phone = get_theme_mod('footer_phone')) { ?>
    <a href="tel:<?php echo preg_replace('/[^0-9|+]/', '', $footer_phone); ?>"
      ><?php echo $footer_phone; ?></a
    >
    <?php } ?>
    <?php echo get_theme_mod('footer_opening_hours'); ?>
  </div>
  <?php if ($footer_email = get_theme_mod('footer_email')) { ?>
  <a
    class="footer-contacts__item footer-contacts__item_mail"
    href="mailto:<?php echo get_theme_mod('footer_email'); ?>"
    ><?php echo get_theme_mod('footer_email'); ?></a
  >
  <?php } ?>
  <?php if ($footer_address = get_theme_mod('footer_address')) { ?>
  <div class="footer-contacts__item footer-contacts__item_address">
    <?php echo get_theme_mod('footer_address'); ?>
  </div>
  <?php } ?>
</div>
