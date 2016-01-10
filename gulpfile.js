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
    mix.sass('app.scss');
    mix.scripts([
      '../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
      '../../../node_modules/sweetalert/dist/sweetalert.min.js',
      '../../../node_modules/selectize/dist/js/standalone/selectize.min.js',
      'app.js'
    ]);
    mix.version(['css/app.css', 'js/all.js']);
});
