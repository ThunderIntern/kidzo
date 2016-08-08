<?php

namespace App\Http\Controllers\Functions;
use Mail;
use App\Models\Subscriber;

class email{
    /**
     * Send an e-mail reminder to the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function send($judul=null, $konten, $input)
    {
        //return $email_address;

        //is_null(var)
        //$user = User::findOrFail($id);

        Mail::send('email/email', ['judul' => $judul, 'konten' => $konten], function($message) use ($input)
        {
            $message->to($input, 'hoi') ->from('graygevaldi@gmail.com')->subject('Welcome!');
        });
    }
}