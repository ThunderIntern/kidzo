<?php

namespace App\Models;

class Faq extends BaseModel
{
	protected $collection			= 'faqs';
	public $timestamps				= true;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'pertanyaan'					,
											'jawaban'						,
											'no_urut'						,
											'kategori'						,
											'sub_kategori'					,
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
											'published_at'					=> 'required|date',
										];

	/**
	 * Basic error message of rule
	 *
	 * @var array
	 */
	protected $message				=	[];	
}