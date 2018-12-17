const mix = require('laravel-mix');
const Clean = require('clean-webpack-plugin');

mix.webpackConfig({
    plugins: [
        //new Clean(['public/vendor/tinymce'], {verbose: false})
    ],
});

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sourceMaps(true, "source-map")
    .copyDirectory('resources/img', 'public/img')
    //.copyDirectory('node_modules/tinymce/', 'public/vendor/tinymce')
    .browserSync({
        proxy: "localhost:8000",
        open: false,
        notify: false
    });
