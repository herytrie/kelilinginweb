<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posting', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('judul');
			$table->string('lat');
			$table->string('lng');
			$table->text('deskripsi');
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
			$table->string('photo');
			$table->string('ip');
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
		Schema::drop('posting');
	}

}
