<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
  </head>

  <body id="body" <?php body_class(array('body')); ?>>
    <header class="header header-inner">
      <div class="header-top">
        <div class="wrapper">
          <?php get_template_part( 'template-parts/header/logo.inc' ); ?>
          <?php get_template_part( 'template-parts/header/menu.inc' ); ?>
          <?php get_template_part( 'template-parts/header/phone.inc' ); ?>
        </div>
      </div>
    </header>