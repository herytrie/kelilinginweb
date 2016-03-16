<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model {

	protected $table = 'posting';
	
	protected $fillable = ['judul', 'lat', 'lng', 'deskripsi', 'iduser', 'photo', 'ip'];
	
	public function user(){
		return $this->belongsTo('App\User','user_id');
	}
	
	public function likes(){
		return $this->hasMany('App\Like','post_id');
	}
	
	public function comments(){
		return $this->hasMany('App\Comments','post_id');
	}

	// public function place(){
	// 	return $this->belongsToMany('App\Posting', 'following', 'user_id', 'followingid');
	// }

}
