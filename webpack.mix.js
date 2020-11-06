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

// Система
mix
    .js('resources/js/system/app.js', 'public/js/system');

mix
    .sass('resources/scss/system/app.scss', 'public/css/system', {

    })
    .options({
        processCssUrls: false,
        // postCss: [
        // 	require('postcss-css-variables')()
        // ]
    })
    .minify('public/css/system/app.css')
// .sourceMaps()
;

// Сайт
mix
    .js('resources/js/site/app.js', 'public/js/site');

mix
    .sass('resources/scss/site/app.scss', 'public/css/site', {

    })
    .options({
        processCssUrls: false,
        // postCss: [
        // 	require('postcss-css-variables')()
        // ]
    })
    .minify('public/css/site/app.css')
// .sourceMaps()
;

mix.browserSync('quests.local/system/quests');

if (mix.inProduction()) {
    mix.version();
} else {
    mix.disableNotifications();
}
