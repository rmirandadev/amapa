const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .less('resources/less/agency.less','public/css/agency.min.css')
    .vue()
    .version();
