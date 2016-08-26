<?php

namespace App\Models;

class Log extends BaseModel
{
    protected $collection           = 'log';
    public $timestamps              = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                                            'phone'                         ,
                                            'email'                         ,
                                            'content'                       ,
                                            'status'
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


    /**
     * Basic error message of rule
     *
     * @var array
     */
    protected $message              =   []; 
}
