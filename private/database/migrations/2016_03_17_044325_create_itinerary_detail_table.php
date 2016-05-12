<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItineraryDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('itinerary_detail', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('itinerary_id');
            $table->foreign('itinerary_id')->references('id')->on('itinerary')->onDelete('CASCADE');
            $table->date('tanggal');
            $table->string('place');
            $table->string('alamat');
            $table->string('lat');
            $table->string('lng');
            $table->string('image');
            $table->text('keterangan');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('itinerary_detail');
	}

}
