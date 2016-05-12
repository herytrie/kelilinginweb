<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $table = 'Itinerary';

    protected $fillable = ['judul', 'startdate', 'enddate', 'user_id'];
}
