<?php

namespace App\Models;

class Statistic extends BaseModel
{
    protected $collection           = 'statistic';
    public $timestamps              = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                                            'permintaanMax'                 ,
                                            'permintaanMin'                 ,
                                            'persediaanMax'                 ,
                                            'persediaanMin'                 ,
                                            'beliMax'                       ,
                                            'beliMin'                       ,
                                            'permintaanAkhir'               ,
                                            'persediaanAkhir'               ,
                                            'jumlahBeli'
                          ];

    /**
     * Timestamp field
     *
     * @var array
     */
    protected $dates                =   [
                                            'created_at'                    , 
                                            'updated_at'                    , 
                                            'deleted_at'                    
                                        ];

    protected $rules                =   [
                                            'status'                  => 'required|boolean',
                                        ];

    /**
     * Basic error message of rule
     *
     * @var array
     */
    protected $message              =   []; 
}
