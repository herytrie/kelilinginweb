<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

	protected $table = 'comments';
	
	protected $fillable = ['comment', 'post_id', 'user_id'];
	
	public function user(){
		return $this->belongsTo('App\User','user_id');
	}
	
	public function posting(){
		return $this->belongsTo('App\Posting');
	}

}
