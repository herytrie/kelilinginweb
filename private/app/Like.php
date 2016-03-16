<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {

	protected $table = 'likes';
	
	protected $fillable = ['post_id', 'user_id'];
	
	public function user(){
		return $this->belongsTo('App\User','user_id');
	}
	
	public function posting(){
		return $this->belongsTo('App\Posting');
	}

}
