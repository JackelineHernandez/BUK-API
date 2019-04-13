<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstablishmentTypeCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('establishment_type_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('establishment_type_description', 70)->default('0');
			$table->string('property_description', 150)->nullable();
			$table->boolean('active')->default('0');
		});

		DB::statement("ALTER TABLE establishment_type_catalogue comment 'Catalog Table of types of establishment'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('establishment_type_catalogue');
	}

}
