<?php

namespace App\Models;

class Admin extends BaseModel
{
    protected $collection           = 'admins';
    public $timestamps              = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                                            'username'                      ,
                                            'password'                      ,
                                            'email'                         ,
                                            'admin'
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
