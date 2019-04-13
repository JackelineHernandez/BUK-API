<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInternetPlaceCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('internet_place_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('internet_place', 60)->default('0');
		});

		DB::statement("ALTER TABLE internet_place_catalogue comment 'Catalog table of places with internet in a hotel'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('internet_place_catalogue');
	}

}
