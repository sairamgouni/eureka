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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').extract(['vue']);

mix.version();

if (!mix.inProduction()) {
    mix.browserSync({
        proxy: 'euraka.local',
        files: [
            'public/css/app.css',
            'public/js/app.js',
        ],
        open: false
    });
}

