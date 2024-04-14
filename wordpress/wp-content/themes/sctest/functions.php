<?php
/**
 * Theme dependencies.
 */
add_action('after_setup_theme', 'load_theme_dependencies');
function load_theme_dependencies()
{
    // Please place all custom functions declarations in this file.
    require_once('theme-functions/theme-functions.php');
}

/**
 * Theme initalization.
 */
add_action('init', 'init_theme');
function init_theme()
{
    // Remove extra styles and default SVG tags.
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
}

/**
 * Enqueue styles and scripts.
 */
function inclusion_enqueue()
{
    // Remove Gutenberg styles on front-end.
    if (!is_admin()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-blocks-style');
    }
}

add_action('wp_enqueue_scripts', 'inclusion_enqueue');


// Add scripts and style
add_action('wp_enqueue_scripts', 'sctest_enqueue_styles');
function sctest_enqueue_styles()
{
    wp_enqueue_style('myStyle', get_stylesheet_directory_uri() . '/assets/css/app.css');
    wp_enqueue_script('myScript', get_stylesheet_directory_uri() . '/assets/js/app.js');

    wp_localize_script('myScript', 'globalVars', array(
        'redirectUrl' => home_url(),
        'ajaxUrl' => admin_url('admin-ajax.php')
    ));
}



add_theme_support( 'align-wide' );
