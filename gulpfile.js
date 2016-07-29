var elixir = require('laravel-elixir');
var gulp = require('gulp');

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
// gulp.task('default', function(){

//     //mix.sass('app.scss');
// });

elixir(function(mix) {
	mix.sass('backend.scss')
	.sass('frontend.scss')
    .scripts([
    			'jquery.js',
				'bootstrap.min.js',
			], 'public/js/backend.js')
    .scripts([
    			'jquery.js',
				'bootstrap.min.js',
			], 'public/js/frontend.js')
	.version([
				'public/css/backend.css',
				'public/js/backend.js',
				'public/css/frontend.css',
				'public/js/frontend.js',
	])
	.copy('resources/assets/images/backend', 'public/images/backend')
	.copy('resources/assets/images', 'public/image/frontend');
});
