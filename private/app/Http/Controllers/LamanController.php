<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LamanController extends Controller {

	//
	
	public function about(){
		//$nama = 'Heri Tri Wibowo';
		return view('about')->with(
			[
				'awal'=> 'Heri',
				'akhir'=> 'Tri'
			]
		);
	}
	
	public function contact(){
		return view('contact');
	}

}
