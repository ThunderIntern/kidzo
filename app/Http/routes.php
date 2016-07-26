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

Route::group(['namespace' => 'Frontend'], function(){
	Route::get('/home', ['uses' => 'webController@home', 'as' => 'home']);
	Route::get('/about', ['uses' => 'webController@about']);
	Route::get('/about/{category}', ['uses' => 'webController@about', 'as' => 'about']);
	Route::post('/newsletter/register', ['uses' => 'webController@registerNewsletter', 'as' => 'register']);
	Route::get('/newsletter/registered', ['uses' => 'webController@registeredNewsletter', 'as' => 'registered']);

	Route::get('/toys/{category_name}', ['uses' => 'productController@index']);
	Route::get('/toys/{category_name}/{product_slug}', ['uses' => 'productController@show'] );
	Route::get('/paket', ['uses' => 'packageController@index']);
	Route::get('/paket/{package_slug}', ['uses' => 'packageController@show']);

});


	
Route::get('/', function () {
    return view('frontend.pages.content');
});

Route::group(['namespace' => 'Frontend'], function(){
	//Route::get('/home',  ['uses' 	=> 'homeController@index', 				'as'	=> 'home']);
});

// Route::resource('/home', 		'homeController',			['names' => ['index' => 'home.index', 'create' => 'home.create', 'store' => 'home.store', 'show' => 'home.show', 'edit' => 'home.edit', 'update' => 'home.update', 'destroy' => 'home.destroy']]);