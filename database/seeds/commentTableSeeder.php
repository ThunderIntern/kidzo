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

        $Comment['username']		= 'abc@gmail.com';
        $Comment['content']			= '$Version->toArray()';
        $Comment['rating']		    = 'True';
        $Comment['status']          = 'pending';
        $Comment->save();

        $Comment 					= new Comment;
        $Comment['username']        = 'abcdef@gmail.com';
        $Comment['content']         = 'asdas';
        $Comment['rating']          = 'True';
        $Comment['status']          = 'approved';
        $Comment->save();
    }
}
