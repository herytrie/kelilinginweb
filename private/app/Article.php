<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

	//

	// public function up(){
		// Schema::create('articles', function(Blueprint $table)
		// {
			// $table->increments('id');
			// $table->string('judul');
			// $table->text('isi');
			// $table->timestamps();
			// $table->timestamp('published_at');
		// });
	// }
	
	
	protected $fillable=[
		'judul',
		'isi',
		'published_at'
	];
	
	protected $dates = ['published_at'];
	
	public function scopePublished($query){
		$query->where('published_at','<=',Carbon::now());
	}
	
	public function setPublishedAtAttribute($date){
		$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d H:i:s',$date);
	}
	
}
