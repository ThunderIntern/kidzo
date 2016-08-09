<?php

namespace App\Http\Controllers\Functions;

class dataFormatter{
    /**
     * Descripton   : Format data and return it as selectize preload data format.
     * Parameter    :
     *                  1. value = id of data
     *                  2. text = data caption/text 
     * Author       : Budi
     */

    public static function toSelectize($value = null, $title = null)
    {
        //init
        if(is_null($value)){
            $value = 'Data inputan selectize null. Cek controller anda yang menggunakan modul dataFormatter fungsi toSelectize';
        }

        if(is_null($title)){
            $title = $value;
        }    

        //format
        return json_encode([
            'value'         => (string)$value,
            'text'          => (string)$title
        ]); 
    }
}