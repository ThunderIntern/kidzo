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
        $Transaksi['nama']              = null;
        $Transaksi['alamat']            = null;
        $Transaksi['nomor']             = null;
        $Transaksi['barang']            = null;
        $Transaksi['nota']              = null;
        $Transaksi['status']            = 'chart';
        $Transaksi['admin']			    = 'Admin';
        $Transaksi->save();



        $Transaksi                      = new Transaksi;

        $Transaksi['username']          = 'def';
        $Transaksi['nama']              = null;
        $Transaksi['alamat']            = null;
        $Transaksi['nomor']             = null;
        $Transaksi['barang']            = null;
        $Transaksi['nota']              = null;
        $Transaksi['status']            = 'chart';
        $Transaksi['admin']             = 'Admin';
        $Transaksi->save();

    }
}
