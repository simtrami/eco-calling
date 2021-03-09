const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/sass/app.scss', 'public/css', {
    prependData: "$theme: " + process.env.MIX_APP_THEME + ";" + "$accent: " + process.env.MIX_APP_ACCENT + ";"
}).sass('resources/sass/signatures.scss', 'public/css', {
    prependData: "$theme: " + process.env.MIX_APP_THEME + ";" + "$accent: " + process.env.MIX_APP_ACCENT + ";"
});

mix.sourceMaps();

if (mix.inProduction()) mix.version();
