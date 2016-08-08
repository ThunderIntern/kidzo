<?php

namespace App\Models;

class WebsiteConfig extends BaseModel
{
	protected $collection			= 'website_configs';
	public $timestamps				= true;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'category'						,
											'config'						,
											'version'						,
											'published_at'					,
											'admin'
										];

	/**
	 * Timestamp field
	 *
	 * @var array
	 */
	protected $dates				=	[
											'created_at'					, 
											'updated_at'					, 
											'deleted_at'					,
											'published_at'
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */

	protected $rules				=	[
											'category'						=> 'required|max:255',
											'published_at'					=> 'required|date',
										];

	/**
	 * Basic error message of rule
	 *
	 * @var array
	 */
	protected $message				=	[];	
}