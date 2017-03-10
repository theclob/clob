const elixir = require('laravel-elixir');

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

elixir((mix) => {
    mix.sass('admin.scss')
       .sass('blog.scss')
       .webpack('admin.js')
       .webpack('blog.js')
       .version(['css/admin.css', 'css/blog.css', 'js/admin.js', 'js/blog.js']);
});
