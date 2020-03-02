const mix = require('laravel-mix');

mix.setPublicPath('public');
mix.setResourceRoot('../');

mix.js(['resources/js/app.js', 'resources/js/fontawesome.min.js'], 'public/js')
    .sass('resources/sass/app.scss', 'public/css');