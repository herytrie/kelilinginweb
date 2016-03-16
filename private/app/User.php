<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'phone', 'info', 'photo', 'image'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	
	public function posting(){
		return $this->hasMany('App\Posting')->latest('created_at');
	}
	
	public function likes(){
		return $this->hasMany('App\Like', 'post_id');
	}
	
	public function comments(){
		return $this->hasMany('App\Comments', 'user_id');
	}

	public function following(){
		return $this->belongsToMany('App\User', 'following', 'user_id', 'followingid');
	}

	public function follower(){
		return $this->belongsToMany('App\User', 'following', 'followingid', 'user_id');
	}



	// public function place(){
	// 	return $this->belongsToMany('App\Posting', 'following', 'user_id', 'followingid');
	// }

}
