<?php

namespace App\Models;

class History extends BaseModel
{
	protected $collection			= 'histories';
	public $timestamps				= true;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[	
											'username'						,
											'history'
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
	 * Basic error message of rule
	 *
	 * @var array
	 */
	protected $message				=	[];	
}

