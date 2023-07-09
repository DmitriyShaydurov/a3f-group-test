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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .browserSync({
        proxy: 'http://laravel.test:80', // the URL of your Laravel app inside the Docker container
        open: false, // Stop Browsersync from automatically opening your browser
        port: 3000, // Use a specific port instead of the one auto-selected by Browsersync.
        files: [
            // Paths to the files to watch for changes
            'resources/views/**/*.php',
            'public/js/**/*.js',
            'public/css/**/*.css',
        ]
    });

if (mix.inProduction()) {
    mix.version();
}