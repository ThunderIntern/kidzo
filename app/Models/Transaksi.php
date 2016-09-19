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
											'nama'							,
											'alamat'						,
											'nomor'							,
											'barang'						,
											'nota'							,
											'total'							,
											'status'
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

