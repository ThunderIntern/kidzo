<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VersionsTableSeeder::class);
        $this->call(SubscribersTableSeeder::class);
        $this->call(WebsiteConfigsTableSeeder::class);
        $this->call(faqsTableSeeder::class);
    }
}
