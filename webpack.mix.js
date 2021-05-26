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
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

/* Jquery file */
mix.copy('node_modules/jquery/dist/jquery.js', 'public/js');
/* Date picker files */
mix.copy('node_modules/pickadate/lib/picker.js','public/js');
mix.copy('node_modules/pickadate/lib/picker.date.js','public/js');
mix.copy('node_modules/pickadate/lib/themes/default.css','public/css');
mix.copy('node_modules/pickadate/lib/themes/default.date.css','public/css');
mix.copy('node_modules/pickadate/lib/translations/es_ES.js','public/js');

if (mix.inProduction()) {
    mix.version();
}
