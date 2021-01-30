const mix = require('laravel-mix');

/*
|--------------------------------------------------------------------------
| Template Assets
|--------------------------------------------------------------------------
|
| All public assets must be compiled to the /wordpress/assets/templates
| directory. Commands like mix.babel and mix.copyDirectory do not use
| the configured public path.
|
| Laravel Mix documentation can be found at https://laravel-mix.com/.
|
| Watch: `npm run watch`
| Production: `npm run prod`
|
*/

// Options
let pub = 'public';
mix.setPublicPath(pub).options({ processCssUrls: false });

// Front-end
mix.js('resources/js/theme.js', 'theme')
    .sass('resources/sass/theme.scss', 'theme');

// Admin
mix.js('resources/js/admin.js', 'admin')
    .sass('resources/sass/admin.scss', 'admin');

// Version
if (mix.inProduction()) {
    mix.version();
}
