<div class="footer-info">
  <a href="<?php echo home_url(); ?>" class="footer-logo">
    <?php if ($footer_logo_title = get_theme_mod('footer_logo_title')) { ?>
    <span class="footer-logo__title"><?php echo $footer_logo_title; ?></span>
    <?php } ?>
    <?php if ($footer_logo_subtitle = get_theme_mod('footer_logo_subtitle')) { ?>
    <span class="footer-logo__subtitle"
      ><?php echo $footer_logo_subtitle; ?></span
    >
    <?php } ?>
  </a>

  <div class="footer-copyright">
    <?php echo date_i18n('Y'); ?>
    <?php echo get_theme_mod('footer_copyright'); ?><br />
    <a href="<?php echo get_privacy_policy_url(); ?>"
      >Политика конфиденциальности</a
    >
  </div>
  <div class="footer-webstudio">
    Разработано в <a href="https://gvate.ru" target="_blank">Gvate Agency</a>
  </div>
</div>
