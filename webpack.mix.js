const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/jquery-ui.js', 'public/js/vendor')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/jquery-ui.scss', 'public/css/vendor');
