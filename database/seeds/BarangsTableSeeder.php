<?php

use Illuminate\Database\Seeder;

use App\Models\Barang;

class BarangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Barang::truncate();

        $Barang 					= new Barang;

        $Barang['nama']		        = 'Sepeda';
        $Barang['jenis']            = 'Sport';  
        $Barang['foto']             = [
                                            'url'    =>'images/frontend/mainan1.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '100000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '1';
        $Barang['admin']			= 'Admin';
        $Barang->save();


        $Barang                     = new Barang;

        $Barang['nama']             = 'Mobil';
        $Barang['jenis']            = 'Sport';  
        $Barang['foto']             = [
                                            'url'    =>'images/frontend/mainan1.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '120000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '2';
        $Barang['admin']            = 'Admin';
        $Barang->save();

    }
}
