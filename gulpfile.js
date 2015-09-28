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

    mix.phpUnit();

    mix.sass('app.scss');

    mix.styles([
      'vendor/normalize.css',
      'app.css'
    ], null, 'public/css');

// second argument (null) means output will be all.css, but you can also specify something like final/output.css
    mix.version('public/css/all.css');

/*
  mix.coffee("*", "public/css", {
            sass: "resources/assets/scss"
        })
*/
});
