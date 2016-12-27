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
    .copy([
      "resources/assets/vendors/footable/fonts",
    ], "public/build/css/fonts")
    .copy([
      "public/images/patterns",
    ], "public/build/css/patterns")
    .copy([
      "resources/assets/js/common.js",
    ], "public/build/js/common.js")
    .copy([
      "node_modules/toastr/build/toastr.min.js",
    ], "public/build/js/toastr.min.js")
    .styles([
      'node_modules/bootstrap/dist/css/bootstrap.min.css',
      'node_modules/font-awesome/css/font-awesome.min.css',
      'node_modules/animate.css/animate.min.css',
      'node_modules/toastr/build/toastr.min.css',
    ], 'public/css/vendor.css', './')
    .webpack("app.js")
    .webpack("vendor.js")
    .sass("app.scss")
    .version([
      "css/*.css",
      "js/*.js"
    ]);
});
