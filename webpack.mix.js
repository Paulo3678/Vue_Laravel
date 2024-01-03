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

// aqui que configuramos o pipeline, toda sequencia de processamento da aplicação
mix.js('resources/js/app.js', 'public/js')
    .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps()
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
