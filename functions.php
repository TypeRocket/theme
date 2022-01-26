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

    // Threaded comment reply styles.
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
});

// Admin Assets
add_action('admin_enqueue_scripts', function() use ($manifest) {
    wp_enqueue_style( 'admin-style', THEME_URI . '/public' . $manifest['/admin/admin.css'] );
    wp_enqueue_script( 'admin-script', THEME_URI . '/public' . $manifest['/admin/admin.js'], [], false, true );
});

// Navigation
register_nav_menu( 'main', 'Main Menu' );

// Comments
apply_filters( 'comments_template', function() {
    return tr_views_path('comments.php');
});

// Clean Theme Setup
add_action('after_setup_theme', function() {
    // Add Supports
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'align-wide' );
    add_theme_support('html5', ['comment-form', 'comment-list', 'navigation-widgets', 'script', 'style', 'gallery', 'caption']);
    add_theme_support( 'responsive-embeds' );

    // Thumbnails
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1568, 9999 );

    // Remove EditURI link
    remove_action( 'wp_head', 'rsd_link' );
    // Remove windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // Remove WP version
    remove_action( 'wp_head', 'wp_generator' );
});