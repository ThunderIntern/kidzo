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
				'selectize.min.js',
				'summernote.min.js',
				'backend/kidzo.js',
				'backend/kidzo_ui.js',
				'inputmask/inputmask.js', 
				'inputmask/inputmask.date.extensions.js', 
				'inputmask/jquery.inputmask.js', 
				'inputmask/inputmask.binding.js',
			], 'public/js/backend.js')
    .scripts([
    			'jquery.js',
				'bootstrap.min.js',
				'selectize.min.js',
				'owl_carousel.min.js',
				'owl.js',
			], 'public/js/frontend.js')
	.version([
				'public/css/backend.css',
				'public/js/backend.js',
				'public/css/frontend.css',
				'public/js/frontend.js',
	])
	.copy('resources/assets/images', 'public/image/')
	.copy('resources/assets/fonts', 'public/build/fonts/')
});
