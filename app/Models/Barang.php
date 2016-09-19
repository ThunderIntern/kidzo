<?php

namespace App\Models;

class Barang extends BaseModel
{
	protected $collection			= 'Barangs';
	public $timestamps				= true;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable				=	[
											'nama'						,
											'jenis'						,
											'foto'						,
											'harga'						,
											'perawatan'					,
											'deskripsi'
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

