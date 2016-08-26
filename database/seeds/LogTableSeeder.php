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
        $Log['phone']           = '019201209';
        $Log['email']		    = 'abc@gmail.com';
        $Log['content']			= 'Ada tipe XYZ?';
        $Log['status']          = 'Belum dihubungi';
        $Log->save();

        $Log 					= new Log;
        $Log['phone']           = '0129019';
        $Log['email']           = 'abcdef@gmail.com';
        $Log['content']         = 'Jenis ini ada?';
        $Log['status']          = 'Sudah dihubungi';
        $Log->save();
    }
}
