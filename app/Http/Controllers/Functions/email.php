<?php

namespace App\Http\Controllers\Functions;
use Mail;

class email{
    /**
     * Send an e-mail reminder to the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function send($judul=null, $konten)
    {
        //return $email_address;

        //is_null(var)
        //$user = User::findOrFail($id);

        Mail::send('email', ['judul' => $judul, 'konten' => $konten], function($message)
        {
            $message->to('311310010@student.machung.ac.id', 'hoi') ->from('graygevaldi@gmail.com')->subject('Welcome!');
        });
    }
}