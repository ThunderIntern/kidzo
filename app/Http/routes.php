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
	Route::get('/about/{category}/{sub_category}', ['uses' => 'webController@about', 'as' => 'aboutCategory']);
	Route::get('/katalog', ['uses' => 'webController@katalog', 'as' => 'katalog']);
	Route::get('/Deskripsi Katalog/{id}', ['uses' => 'webController@deskripsiKatalog', 'as' => 'deskripsiKatalog']);
	Route::get('/chart', ['uses' => 'webController@chart', 'as' => 'chart']);
	Route::post('/addtochart/{id}', ['uses' => 'webController@addChart', 'as' => 'addChart']);
	Route::get('/chart/delete/{nama}', ['uses' => 'webController@deleteChart', 'as' => 'deleteChart']);
	Route::post('/newsletter/register', ['uses' => 'webController@registerNewsletter', 'as' => 'register']);
	Route::get('/newsletter/registered', ['uses' => 'webController@registeredNewsletter', 'as' => 'registered']);
	Route::post('/newsletter/unsubscribe', ['uses' => 'webController@unsubscribeNewsletter', 'as' => 'unsubscribe']);
	Route::get('/newsletter/unsubscribed', ['uses' => 'webController@unsubscribedNewsletter', 'as' => 'unsubscribed']);
	Route::post('/signup', ['uses' => 'webController@signup', 'as' => 'signup']);
	Route::get('/signup/login', ['uses' => 'webController@signuped', 'as' => 'signuped']);
	Route::post('/login', ['uses' => 'webController@login', 'as' => 'login']);
	Route::get('/login/done', ['uses' => 'webController@logined', 'as' => 'logined']);
	Route::get('/logout', ['uses' => 'webController@logout', 'as' => 'logout']);
	Route::get('/newsletter/flushed', ['uses' => 'webController@flushregisteredNewsletter', 'as' => 'flushregister']);

	Route::get('/toys/{category_name}', ['uses' => 'productController@index', 'as' => 'toys']);
	Route::get('/toys/{category_name}/{product_slug}', ['uses' => 'productController@show', 'as' => 'toysSlug'] );
	Route::get('/paket', ['uses' => 'packageController@index', 'as' => 'paket']);
	Route::get('/paket/{package_slug}', ['uses' => 'packageController@show', 'as' => 'paketPackage']);

	Route::get('/email', ['uses' => 'emailController@email', 'as' => 'email']);
	Route::get('/unsubscribe/{unsub_token}', ['uses' => 'webController@unsubscribeNewsletter', 'as' => 'unsub.news']);

	Route::post('/proses', ['uses' => 'webController@proses', 'as' => 'prosesKomen']);
	Route::get('/setting', ['uses' => 'webController@setting', 'as' => 'setting']);
	Route::post('/update', ['uses' => 'webController@updateSetting', 'as' => 'updateSetting']);
	Route::get('/password', ['uses' => 'webController@password', 'as' => 'password']);
	Route::post('/newPassword', ['uses' => 'webController@updatePassword', 'as' => 'updatePassword']);
	Route::get('/profile', ['uses' => 'webController@profile', 'as' => 'profile']);
	Route::get('/forgot', ['uses' => 'webController@forgot', 'as' => 'forgot']);
	Route::post('/verification', ['uses' => 'webController@verification', 'as' => 'verification']);
	Route::get('/time/{id}', ['uses' => 'webController@emailTime', 'as' => 'id']);
	Route::get('/create', ['uses' => 'webController@newMember', 'as' => 'create']);

});

Route::group(['namespace' => 'Backend'], function(){
	Route::get('/admin/dashboard', 		['uses' => 'dashboardController@dashboard', 'as' => 'backend.dashboard']);
	Route::get('/admin/website', 		['uses' => 'dashboardController@website', 'as' => 'backend.website']);
	Route::get('/admin/CRM', 		['uses' => 'dashboardController@crm', 'as' => 'backend.crm']);
	Route::get('/admin/admin', 		['uses' => 'dashboardController@admin', 'as' => 'backend.admin']);
	Route::get('/admin/transaksi', 		['uses' => 'dashboardController@transaksi', 'as' => 'backend.transaksi']);
	Route::post('/cms/login', 		['uses' => 'dashboardController@login', 'as' => 'logincms']);
	Route::get('/cms/logout', 		['uses' => 'dashboardController@logout', 'as' => 'logoutcms']);
	Route::get('/admin', 		['uses' => 'dashboardController@loginPage', 'as' => 'loginPage']);

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
		Route::post('/searchConfig', ['uses' => 'configController@search', 'as' => 'searchConfig']);

		Route::resource('/admin/website/faq', 'faqController', ['names' => [
			'index' 	=> 'backend.website.faq.index',
			'create'	=> 'backend.website.faq.create', 
			'store' 	=> 'backend.website.faq.store', 
			'show' 		=> 'backend.website.faq.show', 
			'edit' 		=> 'backend.website.faq.edit', 
			'update' 	=> 'backend.website.faq.update', 
			'destroy' 	=> 'backend.website.faq.destroy'
		]]);
		Route::post('/searchFAQ', ['uses' => 'FAQController@search', 'as' => 'searchFAQ']);
		
		Route::resource('/admin/website/slider', 'sliderController', ['names' => [
			'index' 	=> 'backend.website.slider.index',
			'create'	=> 'backend.website.slider.create', 
			'store' 	=> 'backend.website.slider.store', 
			'show' 		=> 'backend.website.slider.show', 
			'edit' 		=> 'backend.website.slider.edit', 
			'update' 	=> 'backend.website.slider.update', 
			'destroy' 	=> 'backend.website.slider.destroy'
		]]);
		Route::post('/searchSlider', ['uses' => 'sliderController@search', 'as' => 'searchSlider']);
			
		Route::resource('/admin/website/version', 'versionController', ['names' => [
			'index' 	=> 'backend.website.version.index', 
			'create' 	=> 'backend.website.version.create', 
			'store' 	=> 'backend.website.version.store', 
			'show' 		=> 'backend.website.version.show', 
			'edit' 		=> 'backend.website.version.edit', 
			'update' 	=> 'backend.website.version.update', 
			'destroy' 	=> 'backend.website.version.destroy'
		]]);
		Route::post('/searchVersion', ['uses' => 'versionController@search', 'as' => 'searchVersion']);

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
		Route::post('/searchSubscribber', ['uses' => 'subscribberController@search', 'as' => 'searchSubscribber']);

		Route::resource('/admin/CRM/newsletter', 'newsletterController', ['names' => [
			'index' 	=> 'backend.crm.newsletter.index',
			'create'	=> 'backend.crm.newsletter.create', 
			'store' 	=> 'backend.crm.newsletter.store', 
			'show' 		=> 'backend.crm.newsletter.show', 
			'edit' 		=> 'backend.crm.newsletter.edit', 
			'update' 	=> 'backend.crm.newsletter.update', 
			'destroy' 	=> 'backend.crm.newsletter.destroy'
		]]);
		Route::post('/searchNewsletter', ['uses' => 'newsletterController@search', 'as' => 'searchNewsletter']);
		
		Route::resource('/admin/crm/customer', 'customerController', ['names' => [
			'index' 	=> 'backend.crm.customer.index',
			'create'	=> 'backend.crm.customer.create', 
			'store' 	=> 'backend.crm.customer.store', 
			'show' 		=> 'backend.crm.customer.show', 
			'edit' 		=> 'backend.crm.customer.edit', 
			'update' 	=> 'backend.crm.customer.update', 
			'destroy' 	=> 'backend.crm.customer.destroy'
		]]);
		Route::post('/searchCustomer', ['uses' => 'customerController@search', 'as' => 'searchCustomer']);
		
		Route::resource('/admin/crm/comment', 'commentController', ['names' => [
			'index' 	=> 'backend.crm.comment.index',
			'create'	=> 'backend.crm.comment.create', 
			'store' 	=> 'backend.crm.comment.store', 
			'show' 		=> 'backend.crm.comment.show', 
			'edit' 		=> 'backend.crm.comment.edit', 
			'update' 	=> 'backend.crm.comment.update', 
			'destroy' 	=> 'backend.crm.comment.destroy'
		]]);
		Route::post('/searchComment', ['uses' => 'commentController@search', 'as' => 'searchComment']);
		
		Route::resource('/admin/crm/log', 'logController', ['names' => [
			'index' 	=> 'backend.crm.log.index',
			'create'	=> 'backend.crm.log.create', 
			'store' 	=> 'backend.crm.log.store', 
			'show' 		=> 'backend.crm.log.show', 
			'edit' 		=> 'backend.crm.log.edit', 
			'update' 	=> 'backend.crm.log.update', 
			'destroy' 	=> 'backend.crm.log.destroy'
		]]);
		Route::post('/searchLog', ['uses' => 'logController@search', 'as' => 'searchLog']);
		
	});

	//Admin
	Route::group(['namespace' => 'Admin'], function(){	
		Route::resource('/admin/admin/administrator', 'administratorController', ['names' => [
			'index' 	=> 'backend.admin.administrator.index',
			'create'	=> 'backend.admin.administrator.create', 
			'store' 	=> 'backend.admin.administrator.store', 
			'show' 		=> 'backend.admin.administrator.show', 
			'edit' 		=> 'backend.admin.administrator.edit', 
			'update' 	=> 'backend.admin.administrator.update', 
			'destroy' 	=> 'backend.admin.administrator.destroy'
		]]);
		Route::post('/searchAdministrator', ['uses' => 'administratorController@search', 'as' => 'searchAdministrator']);
		
		Route::resource('/admin/admin/changePassword', 'changePasswordController', ['names' => [
			'index' 	=> 'backend.admin.changePassword.index',
			'create'	=> 'backend.admin.changePassword.create', 
			'store' 	=> 'backend.admin.changePassword.store', 
			'show' 		=> 'backend.admin.changePassword.show', 
			'edit' 		=> 'backend.admin.changePassword.edit', 
			'update' 	=> 'backend.admin.changePassword.update', 
			'destroy' 	=> 'backend.admin.changePassword.destroy'
		]]);
	});

	//Transaksi
	Route::group(['namespace' => 'Transaksi'], function(){	
		Route::resource('/admin/transaksi/pembayaran', 'pembayaranController', ['names' => [
			'update' 	=> 'backend.transaksi.pembayaran.updatePassword',
			'index' 	=> 'backend.transaksi.pembayaran.index',
			'create'	=> 'backend.transaksi.pembayaran.create', 
			'store' 	=> 'backend.transaksi.pembayaran.store', 
			'show' 		=> 'backend.transaksi.pembayaran.show', 
			'edit' 		=> 'backend.transaksi.pembayaran.edit', 
			'update' 	=> 'backend.transaksi.pembayaran.update', 
			'destroy' 	=> 'backend.transaksi.pembayaran.destroy'
		]]);
		Route::resource('/admin/transaksi/manage_Barang', 'manageBarangController', ['names' => [
			'index' 	=> 'backend.transaksi.manageBarang.index',
			'create'	=> 'backend.transaksi.manageBarang.create', 
			'store' 	=> 'backend.transaksi.manageBarang.store', 
			'show' 		=> 'backend.transaksi.manageBarang.show', 
			'edit' 		=> 'backend.transaksi.manageBarang.edit', 
			'update' 	=> 'backend.transaksi.manageBarang.update', 
			'destroy' 	=> 'backend.transaksi.manageBarang.destroy'
		]]);
		Route::resource('/admin/transaksi/manage_Inventory', 'manageInventoryController', ['names' => [
			'index' 	=> 'backend.transaksi.manageInventory.index',
			'create'	=> 'backend.transaksi.manageInventory.create', 
			'store' 	=> 'backend.transaksi.manageInventory.store', 
			'show' 		=> 'backend.transaksi.manageInventory.show', 
			'edit' 		=> 'backend.transaksi.manageInventory.edit', 
			'update' 	=> 'backend.transaksi.manageInventory.update', 
			'destroy' 	=> 'backend.transaksi.manageInventory.destroy'
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
    return view('frontend.pages.signup');
});

Route::group(['namespace' => 'Frontend'], function(){
	//Route::get('/home',  ['uses' 	=> 'homeController@index', 				'as'	=> 'home']);
});

// Route::resource('/home', 		'homeController',			['names' => ['index' => 'home.index', 'create' => 'home.create', 'store' => 'home.store', 'show' => 'home.show', 'edit' => 'home.edit', 'update' => 'home.update', 'destroy' => 'home.destroy']]);

