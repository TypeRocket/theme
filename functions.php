<?php
// Define template dir/uri for easy access
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());
define('THEME_URI_CHILD', get_stylesheet_directory_uri());

// Composer
if(file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
}

// Custom Theme Options
//
// Update THEME_OPTIONS_NAME with a key you
// want your theme options to be saved as
// in the wp_options database table.
define('THEME_OPTIONS_NAME', 'my_theme_options');

add_filter('tr_theme_options_name', function() {
    return THEME_OPTIONS_NAME;
});

add_filter('tr_theme_options_page', function() {
    return THEME_DIR . '/theme-options.php';
});

// Init Theme
include('init/clean.php');
include('init/js_css.php');
include('init/sidebars.php');
include('init/menus.php');