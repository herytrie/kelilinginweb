<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Posting extends Model implements SluggableInterface {

	use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'judul',
        'save_to'    => 'slug',
    ];

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

	// public static function publish($body, $poster_firstname, $poster_profile_image)
	// {
	// 	$feed = new static(compact('body', 'poster_firstname', 'poster_profile_image'));

	// 	return $feed;
	// }

	public static function getTotalCountFeedsForUser($userIds)
	{
		return self::whereIn('user_id', $userIds)->count();
	}

}
