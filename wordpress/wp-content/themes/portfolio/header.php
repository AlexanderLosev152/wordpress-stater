<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
		<div class="custom-logo"><?php the_custom_logo(); ?></div>
    <nav class="main-navigation">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'container' => false, // без дополнительного <div>
        'menu_class' => 'menu', // класс для <ul>
        'fallback_cb' => false // если меню не создано, ничего не выводить
    ));
    ?>
</nav>
</header>
