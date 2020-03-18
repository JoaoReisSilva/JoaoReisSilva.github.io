<?php /* Template Name: Контакты */ ?>

<?php get_header('inner'); ?>

<?php get_template_part('template-parts/breadcrumbs.inc'); ?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

<main class="contacts-page content wrapper">
  <h1 class="title-block"><?php the_title(); ?></h1>

  <div class="contacts-page-list">
    <div class="contacts-page-item contacts-page-item_address">
      <div class="contacts-page-item__title">Адрес</div>
      <?php if ($contacts_address = get_field('contacts_address')) { ?>
      <div class="contacts-page-item__info">
        <?php echo $contacts_address; ?>
      </div>
      <?php } ?>
    </div>
    <div class="contacts-page-item contacts-page-item_phone">
      <div class="contacts-page-item__title">Телефон</div>
      <?php if ($contacts_phone = get_field('contacts_phone')) { ?>
      <div class="contacts-page-item__info">
        <a href="tel:<?php echo preg_replace('/[^0-9|+]/', '', $contacts_phone); ?>"><?php echo $contacts_phone; ?></a>
      </div>
      <?php } ?>
    </div>
    <div class="contacts-page-item contacts-page-item_mail">
      <div class="contacts-page-item__title">Эл. почта</div>
      <?php if ($contacts_email = get_field('contacts_email')) { ?>
      <div class="contacts-page-item__info">
        <a href="mailto:<?php echo $contacts_email; ?>"
          ><?php echo $contacts_email; ?></a
        >
      </div>
      <?php } ?>
    </div>
  </div>
  <?php get_template_part('template-parts/contacts/map'); ?>
</main>

<?php
    }
} ?>

<?php get_footer(); ?>
