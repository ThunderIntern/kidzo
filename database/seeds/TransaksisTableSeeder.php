<?php

use Illuminate\Database\Seeder;

use App\Models\Barang;
use App\Models\Transaksi;

class TransaksisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Transaksi::truncate();

        $Transaksi 					    = new Transaksi;

        $Transaksi['username']          = 'abc';
        $Transaksi['barang']            = ['barang1' =>  [
                                                           'nama' => 'Sepeda',
                                                           'harga'       => '100000',
                                                           'jumlah' => '2',
                                                           'url'       => 'image/frontend/mainan1.jpg',
                                                         ],
                                            'barang2' =>  [
                                                           'nama' => 'Mobil',
                                                           'harga'       => '120000',
                                                           'jumlah' => '1',
                                                           'url'       => 'image/frontend/mainan2.jpg',
                                                         ],
                                          ];
        $Transaksi['nota']              =  [
                                            'nomor'    =>'002',
                                            'jenis'    =>'Pembayaran',
                                           ];
        $Transaksi['status']            = 'chart';
        $Transaksi['admin']			    = 'Admin';
        $Transaksi->save();



        $Transaksi                      = new Transaksi;

        $Transaksi['username']          = 'def';
        $Transaksi['barang']            = ['barang1' =>  [
                                                           'nama' => 'Sepeda',
                                                           'harga'       => '100000',
                                                           'jumlah' => '2',
                                                           'url'       => 'image/frontend/mainan1.jpg',
                                                         ],
                                            'barang2' =>  [
                                                           'nama' => 'Mobil',
                                                           'harga'       => '120000',
                                                           'jumlah' => '1',
                                                           'url'       => 'image/frontend/mainan2.jpg',
                                                         ],
                                          ];
        $Transaksi['nota']              =  [
                                            'nomor'    =>'001',
                                            'jenis'    =>'Pembayaran',
                                           ];
        $Transaksi['Status']            = 'delivered';
        $Transaksi['admin']             = 'Admin';
        $Transaksi->save();

    }
}
