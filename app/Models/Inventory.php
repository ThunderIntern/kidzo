<?php

namespace App\Models;

class Inventory extends BaseModel
{
	protected $collection			= 'Inventories';
	public $timestamps				= true;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'barang'						
										];

	/**
	 * Timestamp field
	 *
	 * @var array
	 */
	protected $dates				=	[
											'tanggal'						,
											'tanggal_keluar'				,
											'tanggal_masuk'					,
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
											'tanggal'					=> 'required|date',
											'tanggal_Keluar'	  		=> 'required|date',
											'tanggal_Masuk'				=> 'required|date',
										];

	/**
	 * Basic error message of rule
	 *
	 * @var array
	 */
	protected $message				=	[];	
}

