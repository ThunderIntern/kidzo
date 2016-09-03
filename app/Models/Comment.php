<?php

namespace App\Models;

class Comment extends BaseModel
{
    protected $collection           = 'comments';
    public $timestamps              = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                                            'username'                      ,
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
