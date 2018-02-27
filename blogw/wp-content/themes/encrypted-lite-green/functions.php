<?php
/**
* Enqueues child theme stylesheet, loading first the parent theme stylesheet.
*/  

/**
 * Loads the child theme textdomain.
 */
function encrypted_lite_green_child_theme_setup() {
    load_child_theme_textdomain( 'encrypted-lite-green', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'encrypted_lite_green_child_theme_setup' );

function encrypted_lite_green_custom_enqueue_child_theme_styles() {
wp_enqueue_style( 'encrypted-lite-parent-theme-css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'encrypted_lite_green_custom_enqueue_child_theme_styles' );
