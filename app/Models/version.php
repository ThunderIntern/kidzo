<?php

namespace App\Models;

class Version extends BaseModel
{
	protected $collection			= 'versions';
	public $timestamps				= true;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'version_name'					,
											'domain'						,
											'is_active'						,
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
											'deleted_at'
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */

	protected $rules				=	[
											'version_name'					=> 'required|max:255',
											'domain'						=> 'required|max:255',
											'is_active'						=> 'required|boolean'
										];

	/**
	 * Basic error message of rule
	 *
	 * @var array
	 */
	protected $message				=	[];	
}


