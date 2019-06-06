let mix = require('laravel-mix');

// Theme
mix.js('resources/assets/js/theme.js', 'wordpress/assets/js')
    .sass('resources/assets/sass/theme.scss', 'wordpress/assets/css');

// Admin
mix.js('resources/assets/js/admin.js', 'wordpress/assets/js')
    .sass('resources/assets/sass/admin.scss', 'wordpress/assets/css')
    .options({
        processCssUrls: false
    });
