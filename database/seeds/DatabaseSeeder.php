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
        $this->call(NewsletterTableSeeder::class);
        $this->call(usersTableSeeder::class);
        $this->call(adminsTableSeeder::class);
        $this->call(commentTableSeeder::class);
        $this->call(LogTableSeeder::class);
        $this->call(emailTimeTableSeeder::class);
        $this->call(BarangsTableSeeder::class);
        $this->call(InventoriesTableSeeder::class);
        $this->call(TransaksisTableSeeder::class);
        $this->call(statisticTableSeeder::class);
    }
}
