<?php
// Composer
if(file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
}

// Define Theme Directory
define('THEME_URI', get_template_directory_uri() );

$manifest = \TypeRocket\Utility\Manifest::cache(
    __DIR__ . '/public/mix-manifest.json',
    'theme'
);

// Theme Assets
add_action('wp_enqueue_scripts', function() use ($manifest) {
    wp_enqueue_style( 'main-style', THEME_URI . '/public' . $manifest['/theme/theme.css'] );
    wp_enqueue_script( 'main-script', THEME_URI . '/public' . $manifest['/theme/theme.js'], [], false, true );
});

// Admin Assets
add_action('admin_enqueue_scripts', function() use ($manifest) {
    wp_enqueue_style( 'admin-style', THEME_URI . '/public' . $manifest['/admin/admin.css'] );
    wp_enqueue_script( 'admin-script', THEME_URI . '/public' . $manifest['/admin/admin.js'], [], false, true );
});

// Supports
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
register_nav_menu( 'main', 'Main Menu' );

// Templates
apply_filters( 'comments_template', function() {
    return tr_views_path('comments.php');
});

// Suppress WP_DEBUG File Deprecated
if(WP_DEBUG) {
    add_action('deprecated_file_included', function(...$file) {
        add_filter('deprecated_file_trigger_error', '__return_false');
    }, 10, 4);
}