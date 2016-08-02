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

        $newsletter 					= new WebsiteConfig;

        $version 						= Version::first();

        $newsletter['config']			= 	[
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
		$newsletter['about']			= 	[
												'Kategori 1'	=> 	[
																		'Subkategori 1'	=> 	[
																								'1'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'2'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],																													
																							],
																		'Subkategori 2'	=> 	[
																								'1'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'2'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'3'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],	
																								'4'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],																																																																																						
																							],
																	],
												'Kategori 2'	=> 	[
																		'Subkategori 1'	=> 	[
																								'1'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'2'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],																													
																							],
																		'Subkategori 2'	=> 	[
																								'1'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'2'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'3'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],	
																								'4'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],																																																																																						
																							],
																		'Subkategori 3'	=> 	[
																								'1'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'2'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],																													
																							],																							
																	],																	
											];        									
        $newsletter['version']			= $version;
        $newsletter['admin']			= 'Admin';
        $newsletter->save();


        $newsletter 					= new WebsiteConfig;

        $version 						= Version::first();

        $newsletter['config']			= 	[
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
		$newsletter['about']			= 	[
												'Kategori 1'	=> 	[
																		'Subkategori 1'	=> 	[
																								'1'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'2'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],																													
																							],
																		'Subkategori 2'	=> 	[
																								'1'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'2'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'3'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],	
																								'4'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],																																																																																						
																							],
																	],
												'Kategori 2'	=> 	[
																		'Subkategori 1'	=> 	[
																								'1'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'2'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],																													
																							],
																		'Subkategori 2'	=> 	[
																								'1'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'2'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'3'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],	
																								'4'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],																																																																																						
																							],
																		'Subkategori 3'	=> 	[
																								'1'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],
																								'2'				=>	[
																														'question' 		=> 'ashdasgdhags gdhadhaghdgahgd dgshgdhagdhgdhsgdha gdhsgdhagd?',
																														'answer' 		=> 'ashdg adg ahd ghjasgdakdhg dhgahdgadghjag dhagdkagdhaghdag hasgdhasjdkasdhjagdjh dghsjdakdj asdh.',
																													],																													
																							],																							
																	],																	
											];        									
        $newsletter['version']			= $version;
        $newsletter['admin']			= 'Admin Satunya';

        $newsletter->save();
    }
}
