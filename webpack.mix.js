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
mix.styles([
    'resources/css/bootstrap.min.css',
    'resources/css/responsive.css',
    'resources/css/style.css'
], 'public/css/main.css');

mix.js([
    'resources/js/app.js',
    'resources/js/jquery.sticky-kit.min.js',
    'resources/js/custom.js',
    'resources/js/bootstrap.min.js',
    'resources/js/imagesloaded.pkgd.min.js',
    'resources/js/grid-blog.min.js',
    'resources/js/index/logout.js'
], 'public/js/main.js');

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.js([
    'resources/js/videos/show.js'
], 'public/js/show.js');

mix.copyDirectory('resources/css/fonts', 'public/css/fonts')
mix.copyDirectory('resources/img', 'public/img');
