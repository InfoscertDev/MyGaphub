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

mix.js('resources/js/app.js', '../../assets/js').vue();
    // .postCss('resources/css/app.css', '../assets/inertial', [
    //     //
    // ]).vue();
mix.webpackConfig({
    output: { chunkFilename: 'js/[name].js?id=[chunkhash]' },
    resolve: {
        alias: {
        // '@': path.resolve('./resources/js'),
        },
        extensions: ['.js', '.vue', '.json'],
    },
    devServer: {
        allowedHosts: 'all',
    },
    });