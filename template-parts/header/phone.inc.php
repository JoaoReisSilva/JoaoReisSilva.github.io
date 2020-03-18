<div class="header-phone">
<?php if ($header_phone = get_theme_mod('header_phone')) { ?>
  <a class="header-phone__link" href="tel:<?php echo preg_replace('/[^0-9|+]/', '', $header_phone); ?>"><?php echo $header_phone; ?></a>
<?php } ?>
  <span class="header-phone__button go-to-modal" data-target="callback-popup"
    >Обратный звонок</span
  >
</div>
