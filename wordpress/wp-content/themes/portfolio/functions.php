<?php
// Подключаем стили и скрипты
add_action( 'wp_enqueue_scripts', function() {
    wp_deregister_script( 'jquery' );
    wp_enqueue_style( 'portfolio-style', get_template_directory_uri() . '/assets/css/style.min.css' );
    wp_enqueue_script( 'portfolio-script', get_template_directory_uri() . '/assets/js/main.js', array(), null, true );
});

// Настройка темы
add_action('after_setup_theme', function() {
    add_theme_support( 'custom-logo' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus(array(
        'header-menu' => __('Главное меню', 'mytheme'),
        //'footer-menu' => __('Меню в подвале', 'mytheme')
    ));
});
?>
