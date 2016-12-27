const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir(mix => {
  mix
    .copy([
      "node_modules/bootstrap/fonts",
      "node_modules/font-awesome/fonts",
    ], "public/build/fonts")
    .styles([
      'node_modules/bootstrap/dist/css/bootstrap.min.css',
      'node_modules/font-awesome/css/font-awesome.min.css',
    ], 'public/css/vendor.css', './')
    .webpack("app.js")
    .webpack("vendor.js")
    .sass("app.scss")
    .version([
      "css/*.css",
      "js/*.js"
    ]);
});
