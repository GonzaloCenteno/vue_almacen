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

mix.styles([
		'resources/vendor/css/fontawesome-all.css',
		'resources/vendor/css/adminlte.min.css',
		'resources/vendor/css/config.css'
	], 'public/css/plantilla.css')
	.js('resources/js/app.js', 'public/js')
	.scripts([
		'resources/vendor/js/adminlte.min.js',
		'resources/vendor/js/demo.js'
	], 'public/js/plantilla.js')
	.copy('resources/vendor/css/webfonts', 'public/webfonts');

