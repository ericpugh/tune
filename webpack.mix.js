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
   .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/popcorn-js/popcorn.js',
    'node_modules/popcorn-js/modules/parser/popcorn.parser.js',
    'node_modules/popcorn-js/parsers/parserVTT/popcorn.parserVTT.js',
    'node_modules/popcorn-js/wrappers/common/popcorn._MediaElementProto.js',
    'node_modules/popcorn-js/wrappers/null/popcorn.HTMLNullVideoElement.js',
    'node_modules/popcorn-js/plugins/code/popcorn.code.js',
    'resources/js/embed.js'
],  'public/js/embed.js');
