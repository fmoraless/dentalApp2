const mix = require('laravel-mix');

mix.setPublicPath('/');
mix.setResourceRoot('../');

mix.js(['resources/js/app.js', 'resources/js/fontawesome.min.js', 'resources/js/adminlte.min.js', 'node_modules/select2/dist/js/select2.full.js'], 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .autoload({
    jquery: ['$', 'window.$', 'window.jQuery']
});

mix.copy('node_modules/chosen-js/chosen-sprite.png', 'public/css/images/vendor/chosen-js');
