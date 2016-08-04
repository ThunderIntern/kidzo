<?php

use Illuminate\Database\Seeder;

use App\Models\Version;
use App\Models\WebsiteConfig;

class WebsiteConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		WebsiteConfig::truncate();

        $WebsiteConfig 					= new WebsiteConfig;

        $version 						= Version::first();

        $WebsiteConfig['config']		= 	[
        										'slider' 		=> 	[
        																'1' 			=> 'slider1.jpg',
        																'2' 			=> 'slider2.jpg',
        																'3' 			=> 'slider3.jpg',
        															],
        										'contact' 		=> 	[
		        														'phone' 		=> 'slider1.jpg',
		        														'address' 		=> 'slider2.jpg',
		        													], 
 												'social' 		=> 	[
		        														'facebook' 		=> 'facebook.com/kidzo',
		        														'instagram' 	=> 'instagram.com/kidzo',
		        													], 		        													       													
        									];      									
        $WebsiteConfig['version']		= $version;
        $WebsiteConfig['admin']			= 'Admin';
        $WebsiteConfig->save();


        $WebsiteConfig 					= new WebsiteConfig;

        $version 						= Version::first();

        $WebsiteConfig['config']			= 	[
        										'slider' 		=> 	[
        																'1' 			=> 'slider1.jpg',
        																'2' 			=> 'slider2.jpg',
        																'3' 			=> 'slider3.jpg',
        															],
        										'contact' 		=> 	[
		        														'phone' 		=> 'slider1.jpg',
		        														'address' 		=> 'slider2.jpg',
		        													], 
 												'social' 		=> 	[
		        														'facebook' 		=> 'facebook.com/kidzo',
		        														'instagram' 	=> 'instagram.com/kidzo',
		        													], 		        													       													
        									];       									
        $WebsiteConfig['version']		= $version;
        $WebsiteConfig['admin']			= 'Admin Satunya';
        $WebsiteConfig->save();
    }
}
