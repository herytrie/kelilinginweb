<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowuserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('followuser', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('iduser');
			$table->foreign('iduser')->references('id')->on('users')->onDelete('CASCADE');
			$table->string('followingid');
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
		Schema::drop('followuser');
	}

}
