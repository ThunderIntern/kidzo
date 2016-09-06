<?php

use Illuminate\Database\Seeder;

use App\Models\Barang;
use App\Models\Inventory;

class InventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Inventory::truncate();

        $Inventory 					    = new Inventory;

        $Inventory['tanggal']		    = '2016-09-05';
        $Inventory['barang']        = ['barang1' =>  [
                                                           'nama' => 'Sepeda',
                                                           'initialStock'    =>'5',
                                                           'currentStock'    =>'3',
                                                           'brokenStock'     =>'1',
                                                           'outStock'        =>  [
                                                                                  'penyewa1'    =>  [
                                                                                                     'nota'      =>  [
                                                                                                                    'nomor'    =>'001',
                                                                                                                    'jenis'    =>'Pembayaran',
                                                                                                                    ],
                                                                                                     'keterangan'=> [
                                                                                                                    'telepon'    =>'081234567890',
                                                                                                                    'alamat'    =>'jl.jalan-jalan',
                                                                                                                    'lama'    =>'1 hari',
                                                                                                                    'jumlah'    =>'1',
                                                                                                                    ],
                                                                                                     'tanggal_sewa' => [
                                                                                                                    'tanggal_keluar'    =>null,
                                                                                                                    'tanggal_masuk'    =>null,
                                                                                                                    ],
                                                                                                    ], 
                                                                                 ],
                                                         ],
                                            'barang2' =>  [
                                                           'nama' => 'Mobil',
                                                           'initialStock'    =>'5',
                                                           'currentStock'    =>'2',
                                                           'brokenStock'     =>'1',
                                                           'outStock'        =>  [
                                                                                  'penyewa1'    =>  [
                                                                                                     'nota'         =>  [
                                                                                                                    'nomor'    =>'002',
                                                                                                                    'jenis'    =>'Penyewaan',
                                                                                                                    ],
                                                                                                     'keterangan'   => [
                                                                                                                    'telepon'    =>'089876543210',
                                                                                                                    'alamat'    =>'jl.jalan',
                                                                                                                    'lama'    =>'1 minggu',
                                                                                                                    'jumlah'    =>'2',
                                                                                                                    ],
                                                                                                     'tanggal_sewa' => [
                                                                                                                    'tanggal_keluar'    =>null,
                                                                                                                    'tanggal_masuk'    =>null,
                                                                                                                    ],
                                                                                                    ], 
                                                                                 ],
                                                         ],
                                          ];
        $Inventory['admin']			    = 'Admin';
        $Inventory->save();



        $Inventory                      = new Inventory;

        $Inventory['tanggal']           = '2016-09-06';
        $Inventory['barang']            = ['barang1' =>  [
                                                           'nama' => 'Mobil',
                                                           'initialStock'    =>'5',
                                                           'currentStock'    =>'2',
                                                           'brokenStock'     =>'1',
                                                           'outStock'        =>  [
                                                                                  'penyewa1'    =>  [
                                                                                                     'nota'         =>  [
                                                                                                                    'nomor'    =>'002',
                                                                                                                    'jenis'    =>'Penyewaan',
                                                                                                                    ],
                                                                                                     'keterangan'   => [
                                                                                                                    'telepon'    =>'089876543210',
                                                                                                                    'alamat'    =>'jl.jalan',
                                                                                                                    'lama'    =>'1 minggu',
                                                                                                                    'jumlah'    =>'2',
                                                                                                                    ],
                                                                                                     'tanggal_sewa' => [
                                                                                                                    'tanggal_keluar'    =>null,
                                                                                                                    'tanggal_masuk'    =>null,
                                                                                                                    ],
                                                                                                    ], 
                                                                                 ],
                                                         ],
                                            'barang2' =>  [
                                                           'nama' => 'Sepeda',
                                                           'initialStock'    =>'5',
                                                           'currentStock'    =>'3',
                                                           'brokenStock'     =>'1',
                                                           'outStock'        =>  [
                                                                                  'penyewa1'    =>  [
                                                                                                     'nota'      =>  [
                                                                                                                    'nomor'    =>'001',
                                                                                                                    'jenis'    =>'Pembayaran',
                                                                                                                    ],
                                                                                                     'keterangan'=> [
                                                                                                                    'telepon'    =>'081234567890',
                                                                                                                    'alamat'    =>'jl.jalan-jalan',
                                                                                                                    'lama'    =>'1 hari',
                                                                                                                    'jumlah'    =>'1',
                                                                                                                    ],
                                                                                                     'tanggal_sewa' => [
                                                                                                                    'tanggal_keluar'    =>null,
                                                                                                                    'tanggal_masuk'    =>null,
                                                                                                                    ],
                                                                                                    ], 
                                                                                 ],
                                                         ],
                                          ];
        $Inventory['admin']             = 'Admin';
        $Inventory->save();

    }
}
