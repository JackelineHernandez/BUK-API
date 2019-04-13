<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomTypeCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_type_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('room_type_description', 70)->default('0');
		});

		DB::statement("ALTER TABLE room_type_catalogue comment 'Catalog table where the room\'s types are stored, it apply to the hotel category'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('room_type_catalogue');
	}

}
