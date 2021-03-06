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
        $Barang['isi']              = null;
        $Barang['jenis']            = 'Sport';
        $Barang['kategori']         = '1';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '100000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '1';
        $Barang['status']           = 'individu';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']			= 'Admin';
        $Barang->save();


        $Barang                     = new Barang;

        $Barang['nama']             = 'Mobil';
        $Barang['isi']              = null;
        $Barang['jenis']            = 'Sport';
        $Barang['kategori']         = '2';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '120000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '2';
        $Barang['status']           = 'individu';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']            = 'Admin';
        $Barang->save();

        $Barang                     = new Barang;

        $Barang['nama']             = 'Perahu';
        $Barang['isi']              = null;
        $Barang['jenis']            = 'Sport';
        $Barang['kategori']         = '3';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '120000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '2';
        $Barang['status']           = 'individu';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']            = 'Admin';
        $Barang->save();

        $Barang                     = new Barang;

        $Barang['nama']             = 'Pesawat';
        $Barang['isi']              = null;
        $Barang['jenis']            = 'Sport';
        $Barang['kategori']         = '3+';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '120000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '2';
        $Barang['status']           = 'individu';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']            = 'Admin';
        $Barang->save();

        $Barang                     = new Barang;

        $Barang['nama']             = 'Tank';
        $Barang['isi']              = null;
        $Barang['jenis']            = 'Sport';
        $Barang['kategori']         = '0';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '120000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '2';
        $Barang['status']           = 'individu';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']            = 'Admin';
        $Barang->save();

        $Barang                     = new Barang;

        $Barang['nama']             = 'Jeep';
        $Barang['isi']              = null;
        $Barang['jenis']            = 'Sport';
        $Barang['kategori']         = '3';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '120000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '2';
        $Barang['status']           = 'individu';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']            = 'Admin';
        $Barang->save();

        $Barang                     = new Barang;

        $Barang['nama']             = 'Barbie';
        $Barang['isi']              = null;
        $Barang['jenis']            = 'Boneka';
        $Barang['kategori']         = '2';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '120000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '2';
        $Barang['status']           = 'individu';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']            = 'Admin';
        $Barang->save();

        $Barang                     = new Barang;

        $Barang['nama']             = 'Ken';
        $Barang['isi']              = null;
        $Barang['jenis']            = 'Boneka';
        $Barang['kategori']         = '2';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '120000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '2';
        $Barang['status']           = 'individu';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']            = 'Admin';
        $Barang->save();

        $Barang                     = new Barang;

        $Barang['nama']             = 'Doraemon';
        $Barang['isi']              = null;
        $Barang['jenis']            = 'Boneka';
        $Barang['kategori']         = '1';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '120000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '2';
        $Barang['status']           = 'individu';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']            = 'Admin';
        $Barang->save();

        $Barang                     = new Barang;

        $Barang['nama']             = 'Shincan';
        $Barang['isi']              = null;
        $Barang['jenis']            = 'Boneka';
        $Barang['kategori']         = '3';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '120000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '2';
        $Barang['status']           = 'individu';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']            = 'Admin';
        $Barang->save();

        $Barang                     = new Barang;

        $Barang['nama']             = 'Jet Tempur';
        $Barang['isi']              = null;
        $Barang['jenis']            = 'Sport';
        $Barang['kategori']         = '3+';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '120000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '2';
        $Barang['status']           = 'individu';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']            = 'Admin';
        $Barang->save();

        $Barang                     = new Barang;

        $Barang['nama']             = 'Mercusuar';
        $Barang['isi']              = null;
        $Barang['jenis']            = 'Sport';
        $Barang['kategori']         = '2';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiKatalog'
                                      ];
        $Barang['harga']            = '120000';
        $Barang['deskripsi']        = 'Ini Mainan Kidzo';
        $Barang['perawatan']        = '2';
        $Barang['status']           = 'individu';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']            = 'Admin';
        $Barang->save();

        $Barang                     = new Barang;

        $Barang['nama']             = 'Party Pack 1';
        $Barang['isi']              = [
                                            'Mobil' => [
                                                            'nama' => 'Mobil',
                                                            'jumlah' => '2'
                                                       ],
                                            'Sepeda' => [
                                                            'nama' => 'Sepeda',
                                                            'jumlah' => '3'
                                                        ]
                                      ];
        $Barang['kategori']         = '2';
        $Barang['jenis']            = 'Party';
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiParty'
                                      ];
        $Barang['harga']            = '450000';
        $Barang['deskripsi']        = '2 Mobil 3 Sepeda';
        $Barang['perawatan']        = '4';
        $Barang['status']           = 'party';
        $Barang['gudang']           = 'Tidak';    
        $Barang['admin']            = 'Admin';
        $Barang->save();

        $Barang                     = new Barang;

        $Barang['nama']             = 'Party Pack 2';
        $Barang['isi']              = [
                                            'Mobil' => [
                                                            'nama' => 'Mobil',
                                                            'jumlah' => '3'
                                                       ],
                                            'Sepeda' => [
                                                            'nama' => 'Sepeda',
                                                            'jumlah' => '2'
                                                        ]
                                      ];
        $Barang['kategori']         = '2';
        $Barang['jenis']            = 'Party';  
        $Barang['foto']             = [
                                            'url'    =>'image/frontend/capture4.jpg',
                                            'link'   => 'deskripsiParty'
                                      ];
        $Barang['harga']            = '475000';
        $Barang['deskripsi']        = '3 Mobil 2 Sepeda';
        $Barang['perawatan']        = '5';
        $Barang['status']           = 'party';
        $Barang['gudang']           = 'Tidak';
        $Barang['admin']            = 'Admin';
        $Barang->save();
    }
}
