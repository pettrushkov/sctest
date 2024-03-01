<?php
/**
 * Theme dependencies.
 */
add_action('after_setup_theme', 'load_theme_dependencies');
function load_theme_dependencies() {
	// Register theme menus.
	register_nav_menus(
		[
			'header_menu' => esc_html__('Header Menu', 'theme_name'),
			'footer_menu' => esc_html__('Footer Menu', 'theme_name')
		]
	);

	// Please place all custom functions declarations in this file.
	require_once('theme-functions/theme-functions.php');
}

/**
 * Theme initalization.
 */
add_action('init', 'init_theme');
function init_theme() {
	// Remove extra styles and default SVG tags.
	remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
	remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

	load_theme_textdomain('theme_name', get_stylesheet_directory() . '/languages');

	// Manage the document title - WordPress automatically add title
	add_theme_support('title-tag');

	// Enable post thumbnails.
	add_theme_support('post-thumbnails');

	// Custom image sizes.
	// add_image_size( 'full-hd', 1920, 0, 1 );
}

/**
 * Enqueue styles and scripts.
 */
function inclusion_enqueue() {
	// Remove Gutenberg styles on front-end.
	if (!is_admin()) {
		wp_dequeue_style('wp-block-library');
		wp_dequeue_style('wp-block-library-theme');
		wp_dequeue_style('wc-blocks-style');
	}
}
add_action('wp_enqueue_scripts', 'inclusion_enqueue');


// Add scripts and style
add_action('wp_enqueue_scripts', 'astra_child_enqueue_styles');
function astra_child_enqueue_styles() {
	// Random value to prevent caching.
	// Change to some value on production, for example: '1.0.0'.
	// $ver_num = mt_rand();

	wp_enqueue_style('myStyle', get_stylesheet_directory_uri() . '/assets/css/app.css');
	wp_enqueue_script('myScript', get_stylesheet_directory_uri() . '/assets/js/app.js', array('wp-i18n'));

	//	$contact_form_success_fields = get_field( 'contact_form_success_fields', 'options' );

	//	wp_localize_script( 'myScript', 'globalVars', array(
//		'contactFormSuccessFields'     => $contact_form_success_fields,
//		'redirectUrl' => home_url(),
//	) );
}

// Remove autowrap lines in <p> tag in CF7 forms
// add_filter('wpcf7_autop_or_not', '__return_false');




/**
 * Pluralizes a word if quantity is not one.
 *
 * @param int $quantity Number of items
 * @param string $singular Singular form of word
 * @param string $plural Plural form of word; function will attempt to deduce plural form from singular if not provided
 *
 * @return string Pluralized word if quantity is not one, otherwise singular
 */
function pluralize($quantity, $singular, $plural = null) {
	if ($quantity == 1 || !strlen($singular)) {
		return $singular;
	}
	if ($plural !== null) {
		return $plural;
	}

	$last_letter = strtolower($singular[strlen($singular) - 1]);
	switch ($last_letter) {
		case 'y':
			return substr($singular, 0, -1) . 'ies';
		case 's':
			return $singular . 'es';
		default:
			return $singular . 's';
	}
}