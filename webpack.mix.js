const mix = require('laravel-mix');

require('vuetifyjs-mix-extension')

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .vuetify('vuetify-loader');


   // const mix = require('laravel-mix');
   // const webpack = require('./webpack.config');
   // mix
   //    .webpackConfig(Object.assign(webpack))
   //    .js('resources/js/app.js', 'public/js')
   //    .sass('resources/sass/app.scss', 'public/css');
