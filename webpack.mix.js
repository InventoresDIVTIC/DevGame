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

mix.js('resources/js/app.js','public/js')
    .js('resources/game/index.js','public/game')
    .js('resources/game/scenes/nivel1.js','public/game/scenes')
    .js('resources/game/scenes/nivel3.js','public/game/scenes')
    .js('resources/game/scenes/Level1.js','public/game/scenes')
    .postCss('resources/css/app.css', 
    'public/css',
    [require('tailwindcss')]
    );
