<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Mail;

Route::get('/a',function(){
	return view('email');
});

Route::group(['namespace' => 'Frontend'], function(){
	Route::get('/home', ['uses' => 'webController@home', 'as' => 'home']);
	Route::get('/about', ['uses' => 'webController@about', 'as' => 'about']);
	Route::get('/about/{category}', ['uses' => 'webController@about', 'as' => 'aboutCategory']);
	Route::post('/newsletter/register', ['uses' => 'webController@registerNewsletter', 'as' => 'register']);
	Route::get('/newsletter/registered', ['uses' => 'webController@registeredNewsletter', 'as' => 'registered']);
	Route::post('/newsletter/unsubscribe', ['uses' => 'webController@unsubscribeNewsletter', 'as' => 'unsubscribe']);
	Route::get('/newsletter/unsubscribed', ['uses' => 'webController@unsubscribedNewsletter', 'as' => 'unsubscribed']);

	Route::get('/toys/{category_name}', ['uses' => 'productController@index', 'as' => 'toys']);
	Route::get('/toys/{category_name}/{product_slug}', ['uses' => 'productController@show', 'as' => 'toysSlug'] );
	Route::get('/paket', ['uses' => 'packageController@index', 'as' => 'paket']);
	Route::get('/paket/{package_slug}', ['uses' => 'packageController@show', 'as' => 'paketPackage']);

	Route::get('/email', ['uses' => 'emailController@email', 'as' => 'email']);

});

Route::group(['namespace' => 'Backend'], function(){
	Route::get('/admin/dashboard', ['uses' => 'dashboardController@index', 'as' => 'backend.dashboard']);
	Route::resource('/admin/about', 'aboutController', ['names' => ['index' => 'backend.about.index', 'create' => 'backend.about.create', 'store' => 'backend.about.store', 'show' => 'backend.about.show', 'edit' => 'backend.about.edit', 'update' => 'backend.about.update', 'destroy' => 'backend.about.destroy']]);
	Route::resource('/admin/slider', 'sliderController', ['names' => ['index' => 'backend.slider.index', 'create' => 'backend.slider.create', 'store' => 'backend.slider.store', 'show' => 'backend.slider.show', 'edit' => 'backend.slider.edit', 'update' => 'backend.slider.update', 'destroy' => 'backend.slider.destroy']]);
	Route::resource('/admin/website/config', 'configController', ['names' => ['index' => 'backend.config.index', 'create' => 'backend.config.create', 'store' => 'backend.config.store', 'show' => 'backend.config.show', 'edit' => 'backend.config.edit', 'update' => 'backend.config.update', 'destroy' => 'backend.config.destroy']]);
	Route::resource('/admin/CRM/manage_newsletter', 'newsletterController', ['names' => ['index' => 'backend.newsletter.index', 'create' => 'backend.newsletter.create', 'store' => 'backend.newsletter.store', 'show' => 'backend.newsletter.show', 'edit' => 'backend.newsletter.edit', 'update' => 'backend.newsletter.update', 'destroy' => 'backend.newsletter.destroy']]);
	Route::get('/admin/CRM/blast_newsletter', ['uses' => 'newsletterController@create', 'as' => 'backend.newsletter.getBlast']);
	Route::post('/admin/CRM/blast_newsletter', ['uses' => 'newsletterController@create', 'as' => 'backend.newsletter.postBlast']);
	Route::resource('/admin/website/manage_version', 'versionController', ['names' => ['index' => 'backend.version.index', 'create' => 'backend.version.create', 'store' => 'backend.version.store', 'show' => 'backend.version.show', 'edit' => 'backend.version.edit', 'update' => 'backend.version.update', 'destroy' => 'backend.version.destroy']]);
});
	
Route::get('/', function () {
    //return view('frontend.pages.about');
    return redirect()->route('home');
});

Route::group(['namespace' => 'Frontend'], function(){
	//Route::get('/home',  ['uses' 	=> 'homeController@index', 				'as'	=> 'home']);
});

// Route::resource('/home', 		'homeController',			['names' => ['index' => 'home.index', 'create' => 'home.create', 'store' => 'home.store', 'show' => 'home.show', 'edit' => 'home.edit', 'update' => 'home.update', 'destroy' => 'home.destroy']]);

