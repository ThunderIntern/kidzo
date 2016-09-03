<?php

use Illuminate\Database\Seeder;

use App\Models\Comment;

class commentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Comment::truncate();

        $Comment 					= new Comment;
        $Comment['username']        = 'abc';
        $Comment['email']            = 'abc@gmail.com';
        $Comment['rating']           = '5';
        $Comment['content']			= ['isi' => 'hello',
                                        'status' =>False,
                                        ];
        $Comment->save();

        $Comment 					= new Comment;
        $Comment['username']        = 'def';
        $Comment['email']           = 'def@gmail.com';
        $Comment['rating']          = '1';
        $Comment['content']         = ['isi' => 'hahaha',
                                        'status' =>True,
                                        ];
        $Comment->save();
    }
}
