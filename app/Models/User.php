<?php

namespace App\Models;

class User extends BaseModel
{
    protected $collection           = 'users';
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
                                            'name'                          ,
                                            'phone'                         ,
                                            'address'                       ,
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
