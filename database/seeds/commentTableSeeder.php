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
        $Comment['username']        = 'gray';
        $Comment['email']		    = 'abc@gmail.com';
        $Comment['content']			= '$Version->toArray()';
        $Comment['rating']		    = 'True';
        $Comment['status']          = False;
        $Comment->save();

        $Comment 					= new Comment;
        $Comment['username']        = 'gevaldi';
        $Comment['email']           = 'abcdef@gmail.com';
        $Comment['content']         = 'asdas';
        $Comment['rating']          = 'True';
        $Comment['status']          = True;
        $Comment->save();
    }
}
