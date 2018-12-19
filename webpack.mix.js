const mix = require('laravel-mix');
const Clean = require('clean-webpack-plugin');

mix.webpackConfig({
    plugins: [
        new Clean([
            "public/vendor",
            "public/fonts",
            "public/images",
            "public/js",
            "public/css"
        ]),
    ],
});

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/tinymce.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sourceMaps(true, "source-map")
    .copy("resources/favicons/favicon.ico", "public")
    .copyDirectory('resources/images', 'public/images')
    .copyDirectory('resources/vendor/filemanager', 'public/vendor/filemanager')
    .browserSync({
        proxy: "localhost:8000",
        open: false,
        notify: false
    });
