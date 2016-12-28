<?php

namespace App\Models;

class SortingRating extends BaseModel
{
	protected $collection			= 'SortingRating';
	public $timestamps				= true;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array 
	 */
	protected $fillable				=	[
											'nama'						,
											'isi'						,
											'kategori'					,
											'jenis'						,
											'foto'						,
											'harga'						,
											'perawatan'					,
											'status'					,
											'gudang'					,
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

