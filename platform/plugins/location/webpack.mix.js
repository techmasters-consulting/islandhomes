let mix = require('laravel-mix');

const publicPath = 'public/vendor/core/plugins/location';
const resourcePath = './platform/plugins/location';

mix
    .js(resourcePath + '/resources/assets/js/location.js', publicPath + '/js')
    .copy(publicPath + '/js/location.js', resourcePath + '/public/js');
