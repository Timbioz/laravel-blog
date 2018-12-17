const mix = require('laravel-mix');
const Clean = require('clean-webpack-plugin');

mix.webpackConfig({
    plugins: [
        new Clean(['public/vendor/summernote'], {verbose: false}),
        //new Clean(['public/vendor/elfinder'], {verbose: false})
    ],
});

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sourceMaps(true, "source-map")
    .copyDirectory('resources/img', 'public/img')
    .copyDirectory('node_modules/summernote', 'public/vendor/summernote')
    .copyDirectory('vendor/studio-42/elfinder', 'public/vendor/elfinder')
    .browserSync({
        proxy: "localhost:8000",
        open: false,
        notify: false
    });
