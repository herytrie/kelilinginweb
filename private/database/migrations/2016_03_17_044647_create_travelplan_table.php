<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelplanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('travelplan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tujuan');
			$table->string('judul');
			$table->string('lat');
			$table->string('lng');
			$table->date('datefrom');
			$table->date('dateto');
			$table->string('photo');
			$table->unsignedInteger('itinerary_id');
			$table->foreign('itinerary_id')->references('id')->on('itinerary')->onDelete('CASCADE');
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
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
		Schema::drop('travelplan');
	}

}
