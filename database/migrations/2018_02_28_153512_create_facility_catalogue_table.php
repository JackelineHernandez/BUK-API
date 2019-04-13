<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacilityCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facility_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('facility_description', 70)->default('0');
		});

		DB::statement("ALTER TABLE facility_catalogue comment 'Catalog table of Facilities'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('facility_catalogue');
	}

}
