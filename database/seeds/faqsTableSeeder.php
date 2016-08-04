<?php

use Illuminate\Database\Seeder;

use App\Models\Version;
use App\Models\Faq;

class faqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		faq::truncate();

        $faq 							= new Faq;

        $version 						= Version::first();   

		$faq['doc']						= 	[
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

		$faq['version']					= $version;      
		$faq['admin']					= 'Admin';     

		$faq->save();


        $faq 							= new Faq;

        $version 						= Version::first();   


		$faq['doc']						= 	[
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
		$faq['version']					= $version;      
		$faq['admin']					= 'Admin Satunya';     

		$faq->save();
    }
}
