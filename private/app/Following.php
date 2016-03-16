<?php namespace App;

use App\User;
use App\Posting;
use Illuminate\Database\Eloquent\Model;

class Following extends Model {

	protected $table = 'following';

	protected $fillable = ['user_id', 'followingid'];

	// public function user(){
	// 	return $this->belongsTo('App\User', 'iduser');
	// }

	public function user(){
		return $this->belongsTo('User','user_id');
	}

	// public function followings(){
	// 	return $this->hasManyThrough('App\Posting','App\User','user_id');
	// }

}
