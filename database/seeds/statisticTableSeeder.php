<?php

use Illuminate\Database\Seeder;

use App\Models\Statistic;

class statisticTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Statistic::truncate();

        $Statistic 					    = new Statistic;
        $Statistic['permintaanMax']     = 5000;
        $Statistic['permintaanMin']     = 1000;
        $Statistic['persediaanMax']     = 600;
        $Statistic['persediaanMin']     = 100;
        $Statistic['beliMax']           = 7000;
        $Statistic['beliMin']           = 2000;
        $Statistic['permintaanAkhir']   = 4000;
        $Statistic['persediaanAkhir']   = 300;
        $Statistic['jumlahBeli']        = null;
        $Statistic->save();
    }
}
