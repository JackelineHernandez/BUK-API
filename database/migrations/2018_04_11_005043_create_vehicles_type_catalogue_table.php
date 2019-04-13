<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesTypeCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles_type_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicles_category_catalogue_id')->default(0)->index('FK_INDEX_vehicles_type_catalogue_vehicle_category_catalogue');
			$table->string('name', 70)->default('0');
			
			$table->foreign('vehicles_category_catalogue_id', 'FK_vehicles_type_catalogue_vehicle_category_catalogue')->references('id')->on('vehicles_category_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicles_type_catalogue');
	}

}
