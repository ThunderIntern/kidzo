<?php

use Illuminate\Database\Seeder;

use App\Models\History;

class HistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		History::truncate();

        $History 					    = new History;

        $History['username']          = 'abc';
        $History['history']           = null;
        $History['admin']			  = 'Admin';
        $History->save();



        $History                      = new History;

        $History['username']          = 'def';
        $History['history']           = null;
        $History['admin']             = 'Admin';
        $History->save();

    }
}
