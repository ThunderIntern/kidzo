<?php

namespace App\Http\Controllers\Frontend;
use Request;

use App\Http\Controllers\BaseController;

class homeController extends BaseController {

	/**
	 * Index
	 */
	function index() {
		return $this->generateView('frontend.pages.home', Request::route()->getName());
	}	
}