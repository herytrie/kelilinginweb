<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class TravelPlan extends Model implements SluggableInterface
{

	use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'judul',
        'save_to'    => 'slug',
    ];

    protected $table = 'travelplan';

    protected $fillable = ['tujuan', 'judul', 'lat', 'lng', 'datefrom', 'dateto', 'photo', 'itinerary_id', 'user_id'];

    public function user(){
		return $this->belongsTo('App\User','user_id');
	}

}
