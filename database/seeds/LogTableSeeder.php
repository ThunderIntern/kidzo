<?php

use Illuminate\Database\Seeder;

use App\Models\Log;

class LogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Log::truncate();

        $Log 					= new Log;
        $Log['name']           = 'puji';
        $Log['phone']           = '019201209';
        $Log['email']		    = 'graygevaldi@gmail.com';
        $Log['content']			= 'Ada tipe XYZ?';
        $Log['status']          = 'Belum dihubungi';
        $Log->save();

        $Log 					= new Log;
        $Log['name']           = 'haji';
        $Log['phone']           = '0129019';
        $Log['email']           = '311310010@student.machung.ac.id';
        $Log['content']         = 'Jenis ini ada?';
        $Log['status']          = 'Sudah dihubungi';
        $Log->save();
    }
}
