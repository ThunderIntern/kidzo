<?php

namespace App\Models;

class Newsletter extends BaseModel
{
	protected $collection			= 'newsletters';
	public $timestamps				= true;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'email'							,
											'version'						,
											'unsubscribe_token'				,
											'is_subscribe'					,
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
											'email'							=> 'required|email',
											'is_subscribe'					=> 'required|boolean',
										];

	/**
	 * Basic error message of rule
	 *
	 * @var array
	 */
	protected $message				=	[];	
}

