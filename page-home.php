<?php /* Template Name: Главная страница */ ?>

<?php get_header(); ?>

<?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

<?php get_template_part('template-parts/home/services.inc'); ?>

<?php get_template_part('template-parts/home/callback.inc'); ?>

<?php get_template_part('template-parts/home/cases.inc'); ?>

<?php get_template_part('template-parts/home/news.inc'); ?>

<?php
    }
} ?>

<?php get_footer(); ?>
