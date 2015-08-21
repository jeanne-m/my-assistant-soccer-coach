var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');
});

elixir(function(mix) {
    mix.scripts(
        [
            'vendor/jquery-2.1.4.js',
            'vendor/bootstrap-3.3.5.js',
            'ConfirmModal.js',
            'DeleteProfile.js',
            'Slug.js'
        ],
        'public/js/core.js'
    );
});
