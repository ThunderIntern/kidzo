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

		$faq['pertanyaan']				= 'lorem ipsum dolorem ipsum sit amet ?';      
		$faq['jawaban']					= 'lorem ipsum dolorem ipsum sit amet';    
		$faq['no_urut']					= 1;      
		$faq['kategori']				= 'kategori 1';      
		$faq['sub_kategori']			= 'sub kategori 1';      
		$faq['version']					= $version['attributes'];      
		$faq['admin']					= 'Admin';     

		$faq->save();


        $faq 							= new Faq;

        $version 						= Version::first();   

		$faq['pertanyaan']				= 'lorem ipsum dolorem ipsum sit amet ?';      
		$faq['jawaban']					= 'lorem ipsum dolorem ipsum sit amet';    
		$faq['no_urut']					= 2;      
		$faq['kategori']				= 'kategori 1';      
		$faq['sub_kategori']			= 'sub kategori 1';      
		$faq['version']					= $version['attributes'];      
		$faq['admin']					= 'Admin';
		$faq['admin']					= 'Admin Satunya';     

		$faq->save();


	    $faq 							= new Faq;

        $version 						= Version::first();   

		$faq['pertanyaan']				= 'lorem ipsum dolorem ipsum sit amet ?';      
		$faq['jawaban']					= 'lorem ipsum dolorem ipsum sit amet';    
		$faq['no_urut']					= 1;      
		$faq['kategori']				= 'kategori 1';      
		$faq['sub_kategori']			= 'sub kategori 2';      
		$faq['version']					= $version['attributes'];      
		$faq['admin']					= 'Admin';
		$faq['admin']					= 'Admin Satunya';     

		$faq->save();	


	    $faq 							= new Faq;

        $version 						= Version::first();   

		$faq['pertanyaan']				= 'lorem ipsum dolorem ipsum sit amet ?';      
		$faq['jawaban']					= 'lorem ipsum dolorem ipsum sit amet';    
		$faq['no_urut']					= 2;      
		$faq['kategori']				= 'kategori 1';      
		$faq['sub_kategori']			= 'sub kategori 2';      
		$faq['version']					= $version['attributes'];      
		$faq['admin']					= 'Admin';
		$faq['admin']					= 'Admin Satunya';     

		$faq->save();	


	    $faq 							= new Faq;

        $version 						= Version::first();   

		$faq['pertanyaan']				= 'lorem ipsum dolorem ipsum sit amet ?';      
		$faq['jawaban']					= 'lorem ipsum dolorem ipsum sit amet';    
		$faq['no_urut']					= 3;      
		$faq['kategori']				= 'kategori 1';      
		$faq['sub_kategori']			= 'sub kategori 2';      
		$faq['version']					= $version['attributes'];      
		$faq['admin']					= 'Admin';
		$faq['admin']					= 'Admin Satunya';     

		$faq->save();	


	    $faq 							= new Faq;

        $version 						= Version::first();   

		$faq['pertanyaan']				= 'lorem ipsum dolorem ipsum sit amet ?';      
		$faq['jawaban']					= 'lorem ipsum dolorem ipsum sit amet';    
		$faq['no_urut']					= 1;      
		$faq['kategori']				= 'kategori 2';      
		$faq['sub_kategori']			= 'sub kategori 1';      
		$faq['version']					= $version['attributes'];      
		$faq['admin']					= 'Admin';
		$faq['admin']					= 'Admin Satunya';     

		$faq->save();	


	    $faq 							= new Faq;

        $version 						= Version::first();   

		$faq['pertanyaan']				= 'lorem ipsum dolorem ipsum sit amet ?';      
		$faq['jawaban']					= 'lorem ipsum dolorem ipsum sit amet';    
		$faq['no_urut']					= 2;      
		$faq['kategori']				= 'kategori 2';      
		$faq['sub_kategori']			= 'sub kategori 1';      
		$faq['version']					= $version['attributes'];      
		$faq['admin']					= 'Admin';
		$faq['admin']					= 'Admin Satunya';     

		$faq->save();											
    }
}
