const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js").sass(
    "resources/sass/app.scss",
    "public/css"
);

mix.js(["resources/js/index.js"], "public/js/index.js");
mix.js(["resources/js/signin.js"], "public/js/signin.js");
mix.js(["resources/js/signup.js"], "public/js/signup.js");
mix.js(["resources/js/shop_cartridges.js"], "public/js/shop_cartridges.js");
mix.js(["resources/js/shop_printers.js"], "public/js/shop_printers.js");
mix.js(["resources/js/view.js"], "public/js/view.js");
mix.js(["resources/js/about-us.js"], "public/js/about-us.js");
