const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js').sass(
    'resources/sass/app.scss',
    'public/css'
);

mix.js(['resources/js/index.js'], 'public/js/index.js');
mix.js(['resources/js/signin.js'], 'public/js/signin.js');
mix.js(['resources/js/signup.js'], 'public/js/signup.js');
mix.js(['resources/js/products.js'], 'public/js/products.js');
mix.js(['resources/js/view.js'], 'public/js/view.js');
mix.js(['resources/js/about-us.js'], 'public/js/about-us.js');
mix.js(['resources/js/cart.js'], 'public/js/cart.js');
mix.js(['resources/js/billing.js'], 'public/js/billing.js');
mix.js(['resources/js/transaction.js'], 'public/js/transaction.js');
mix.js(['resources/js/transactions.js'], 'public/js/transactions.js');
mix.js(['resources/js/settings.js'], 'public/js/settings.js');
mix.js(['resources/js/admin_index.js'], 'public/js/admin_index.js');
mix.js(['resources/js/admin_login.js'], 'public/js/admin_login.js');
mix.js(['resources/js/admin_inventory.js'], 'public/js/admin_inventory.js');
mix.js(['resources/js/admin_manage.js'], 'public/js/admin_manage.js');
mix.js(['resources/js/overall.js'], 'public/js/overall.js');
mix.js(['resources/js/perTransaction.js'], 'public/js/perTransaction.js');
mix.js(['resources/js/status.js'], 'public/js/status.js');
mix.js(['resources/js/status_portal.js'], 'public/js/status_portal.js');
mix.js(['resources/js/admin_settings.js'], 'public/js/admin_settings.js');
mix.js(['resources/js/navbar.js'], 'public/js/navbar.js');
mix.js(
    ['resources/js/admin_add_inventory.js'],
    'public/js/admin_add_inventory.js'
);
