<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ArtikelRequest;

//use Request;
use Carbon\Carbon;

class ArtikelController extends Controller {

	//
	public function index(){
		$artikel = Article::latest('published_at')->get();
		return view('artikel.index')->with('artikel',$artikel);
	}
	
	public function show($id){
		$artikel = Article::findOrFail($id);
		return view('artikel.baca')->with('artikel',$artikel);
	}
	
	public function edit($id){
		$artikel = Article::findOrFail($id);
		return view('artikel.edit')->with('artikel',$artikel);
	}
	
	public function create(){
		
		return view('artikel.tambah');
	}
	
	public function store(ArtikelRequest $request){
		// $input = Request::all();
		// $input['published_at'] = Carbon::now();
		Article::create($request->all());
		return redirect('artikel');
	}
	
	public function update($id, ArtikelRequest $request){
		$artikel = Article::findOrFail($id);
		$artikel->update($request->all());
		return redirect('artikel');
	}
	
	public function destroy($id){
		$artikel = Article::findOrFail($id);
		$artikel->delete();
		return redirect('artikel');
	}
}
