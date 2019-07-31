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

mix.scripts([
            'resources/js/jquery.min.js',
            'resources/js/tether.min.js',
            'resources/js/bootstrap.min.js',
            'resources/js/jquery.slimscroll.js',
            'resources/js/waves.js',
            'resources/js/sidebarmenu.js',
            'resources/js/sticky-kit.min.js',
            'resources/js/custom.min.js',
            'resources/js/jquery.flot.js',
            'resources/js/jquery.flot.tooltip.min.js',
            'resources/js/flot-data.js',
            'resources/js/jQuery.style.switcher.js',
            'resources/js/app.js',
            ],'public/js/app.js')
    .styles([
          'resources/css/bootstrap.min.css',
          'resources/css/style.css',
          'resources/css/green.css',
          'resources/css/app.css',
         ],'public/css/app.css');
