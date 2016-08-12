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
    public function send($judul=null, $konten, $input, $unsub)
    {
        //return $email_address;

        //is_null(var)
        //$user = User::findOrFail($id);
        
        // variabel judul & konten dari webController. $input = email yang dituju
        Mail::send('email/email', ['judul' => $judul, 'konten' => $konten, 'unsub' => $unsub], function($message) use ($input)
        {
            $message->to($input, 'hoi') ->subject('Welcome!');
        });
    }
    public function unSubscribe($judul=null, $konten, $input, $unsub)
    {
        //return $email_address;

        //is_null(var)
        //$user = User::findOrFail($id);
        
        // variabel judul & konten dari webController. $input = email yang dituju
        Mail::send('email/email', ['judul' => $judul, 'konten' => $konten, 'unsub' => $unsub], function($message) use ($input)
        {
            $message->to($input, 'hoi') ->subject('Thank You');
        });
    }
}