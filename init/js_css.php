<?php
// Load Assets
add_action('wp_enqueue_scripts', 'add_scripts_styles');
add_action('admin_enqueue_scripts', 'add_scripts_styles_to_admin');

// Front-end Assets
function add_scripts_styles() {
	if(!is_admin()) :
		// JS
		wp_enqueue_script("jquery");
        wp_enqueue_script( 'main-script', THEME_URI . '/wordpress/assets/js/script.js', ['jquery'], '1.0', true );

		// CSS
		wp_enqueue_style( 'main-style', THEME_URI . '/wordpress/assets/style.css' );
		wp_enqueue_style( 'custom-style', THEME_URI . '/wordpress/assets/css/style.css' );

		// WP
		wp_enqueue_script( 'comment-reply');
	endif;
}

// Admin Assets
function add_scripts_styles_to_admin() {
    wp_enqueue_style('admin-style', THEME_URI . '/wordpress/assets/css/admin.css');
    wp_enqueue_script('admin-script', THEME_URI . '/wordpress/assets/js/admin.js', [], '1.0', true);
}