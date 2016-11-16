<?php

function fine_arts_resources() {
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    // wp_enqueue_style( 'fine-arts-style', get_template_directory_uri() . '/css/fine-arts-style.css' );
    wp_enqueue_style( 'fat-test-style', get_template_directory_uri() . '/css/fat-test-style.css' );
    wp_enqueue_script( 'movie-feature', get_template_directory_uri() . '/js/movie-feature.js', array( 'jquery' ) );
}

add_action( 'wp_enqueue_scripts', 'fine_arts_resources' );

function fine_arts_setup() {
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'fine_arts_setup');

// Navigation Menus

register_nav_menus(array(
    'primary' => __( 'Primary Menu' )
));