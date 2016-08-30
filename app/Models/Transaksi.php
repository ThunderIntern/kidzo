<?php

namespace App\Models;

class Transaksi extends BaseModel
{
	protected $collection			= 'transaksis';
	public $timestamps				= true;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[	
											'username'						,
											'barang'						,
											'nota'							,
											'status'
										];

	/**
	 * Timestamp field
	 *
	 * @var array
	 */
	protected $dates				=	[
											'tanggal_Masuk'					,
											'tanggal_Keluar'				,
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
											'tanggal_Masuk'					=> 'required|date',
											'tanggal_Keluar'				=> 'required|date',
										];

	/**
	 * Basic error message of rule
	 *
	 * @var array
	 */
	protected $message				=	[];	
}

