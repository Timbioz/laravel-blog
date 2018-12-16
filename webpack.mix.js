const mix = require('laravel-mix');
const Clean = require('clean-webpack-plugin');

mix.webpackConfig({
    plugins: [
        new Clean(['public/vendor'], {verbose: false})
    ],
});

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
    .js('resources/js/admin.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sourceMaps(true, "source-map")
    .copyDirectory('resources/img', 'public/img')
    .copyDirectory('node_modules/tinymce/', 'public/vendor/tinymce')
    .browserSync({
        proxy: "localhost:8000",
        open: false,
        notify: false
    });
