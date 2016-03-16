<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model {

	//
	protected $fillable=[
		'namatugas',
		'keterangan'
	];
}
