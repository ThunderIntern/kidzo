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
	return view('email/email');
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
	Route::get('/admin/dashboard', 		['uses' => 'dashboardController@dashboard', 'as' => 'backend.dashboard']);
	Route::get('/admin/website', 		['uses' => 'dashboardController@website', 'as' => 'backend.website']);
	Route::get('/admin/CRM', 		['uses' => 'dashboardController@crm', 'as' => 'backend.crm']);

	//website
	Route::group(['namespace' => 'Website'], function(){
		Route::resource('/admin/website/config', 'configController', ['names' => [
			'index' 	=> 'backend.website.config.index',
			'create'	=> 'backend.website.config.create', 
			'store' 	=> 'backend.website.config.store', 
			'show' 		=> 'backend.website.config.show', 
			'edit' 		=> 'backend.website.config.edit', 
			'update' 	=> 'backend.website.config.update', 
			'destroy' 	=> 'backend.website.config.destroy'
		]]);
		Route::resource('/admin/website/faq', 'faqController', ['names' => [
			'index' 	=> 'backend.website.faq.index',
			'create'	=> 'backend.website.faq.create', 
			'store' 	=> 'backend.website.faq.store', 
			'show' 		=> 'backend.website.faq.show', 
			'edit' 		=> 'backend.website.faq.edit', 
			'update' 	=> 'backend.website.faq.update', 
			'destroy' 	=> 'backend.website.faq.destroy'
		]]);
		Route::resource('/admin/website/slider', 'sliderController', ['names' => [
			'index' 	=> 'backend.website.slider.index',
			'create'	=> 'backend.website.slider.create', 
			'store' 	=> 'backend.website.slider.store', 
			'show' 		=> 'backend.website.slider.show', 
			'edit' 		=> 'backend.website.slider.edit', 
			'update' 	=> 'backend.website.slider.update', 
			'destroy' 	=> 'backend.website.slider.destroy'
		]]);
			
		Route::resource('/admin/website/version', 'versionController', ['names' => [
			'index' 	=> 'backend.website.version.index', 
			'create' 	=> 'backend.website.version.create', 
			'store' 	=> 'backend.website.version.store', 
			'show' 		=> 'backend.website.version.show', 
			'edit' 		=> 'backend.website.version.edit', 
			'update' 	=> 'backend.website.version.update', 
			'destroy' 	=> 'backend.website.version.destroy'
		]]);

		//AJAX
		Route::get('/admin/ajax/version', 	['uses' => 'versionController@ajaxGetVersion', 'as' => 'backend.ajax.getVersion']);
		Route::get('/admin/ajax/faq/kategori', 	['uses' => 'faqController@ajaxGetFaqKategori', 'as' => 'backend.ajax.getFaqKategori']);
		Route::get('/admin/ajax/faq/subkategori', 	['uses' => 'faqController@ajaxGetFaqSubKategori', 'as' => 'backend.ajax.getFaqSubKategori']);
	});


	//CRM
	Route::group(['namespace' => 'CRM'], function(){	
		Route::resource('/admin/CRM/subscribber', 'subscribberController', ['names' => [
			'index' 	=> 'backend.crm.subscribber.index',
			'create'	=> 'backend.crm.subscribber.create', 
			'store' 	=> 'backend.crm.subscribber.store', 
			'show' 		=> 'backend.crm.subscribber.show', 
			'edit' 		=> 'backend.crm.subscribber.edit', 
			'update' 	=> 'backend.crm.subscribber.update', 
			'destroy' 	=> 'backend.crm.subscribber.destroy'
		]]);
		Route::resource('/admin/CRM/newsletter', 'newsletterController', ['names' => [
			'index' 	=> 'backend.crm.newsletter.index',
			'create'	=> 'backend.crm.newsletter.create', 
			'store' 	=> 'backend.crm.newsletter.store', 
			'show' 		=> 'backend.crm.newsletter.show', 
			'edit' 		=> 'backend.crm.newsletter.edit', 
			'update' 	=> 'backend.crm.newsletter.update', 
			'destroy' 	=> 'backend.crm.newsletter.destroy'
		]]);
	});
	// Route::resource('/admin/about', 'aboutController', ['names' => ['index' => 'backend.about.index', 'create' => 'backend.about.create', 'store' => 'backend.about.store', 'show' => 'backend.about.show', 'edit' => 'backend.about.edit', 'update' => 'backend.about.update', 'destroy' => 'backend.about.destroy']]);
	// Route::resource('/admin/slider', 'sliderController', ['names' => ['index' => 'backend.slider.index', 'create' => 'backend.slider.create', 'store' => 'backend.slider.store', 'show' => 'backend.slider.show', 'edit' => 'backend.slider.edit', 'update' => 'backend.slider.update', 'destroy' => 'backend.slider.destroy']]);
	// Route::resource('/admin/CRM/manage_newsletter', 'newsletterController', ['names' => ['index' => 'backend.newsletter.index', 'create' => 'backend.newsletter.create', 'store' => 'backend.newsletter.store', 'show' => 'backend.newsletter.show', 'edit' => 'backend.newsletter.edit', 'update' => 'backend.newsletter.update', 'destroy' => 'backend.newsletter.destroy']]);
	// Route::get('/admin/CRM/blast_newsletter', ['uses' => 'newsletterController@create', 'as' => 'backend.newsletter.getBlast']);
	// Route::post('/admin/CRM/blast_newsletter', ['uses' => 'newsletterController@create', 'as' => 'backend.newsletter.postBlast']);
});
	
Route::get('/', function () {
    //return view('frontend.pages.about');
    return redirect()->route('home');
});

Route::group(['namespace' => 'Frontend'], function(){
	//Route::get('/home',  ['uses' 	=> 'homeController@index', 				'as'	=> 'home']);
});

// Route::resource('/home', 		'homeController',			['names' => ['index' => 'home.index', 'create' => 'home.create', 'store' => 'home.store', 'show' => 'home.show', 'edit' => 'home.edit', 'update' => 'home.update', 'destroy' => 'home.destroy']]);

