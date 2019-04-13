<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles_features', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('transfer_service_id')->default(0)->index('FK_INDEX_vehicles_features_transfer_service');
			$table->string('brand', 50)->default('0');
			$table->string('model', 70)->default('0');
			$table->integer('max_person_bags')->default(0);
			$table->integer('max_person_handbags')->default(0);
			$table->integer('vehicles_type_catalogue_id')->default(0)->index('FK_INDEX_vehicles_features_vehicles_type_catalogue');
			$table->integer('persons_quantity')->default(0);
			$table->string('other_features', 180)->default('0');
			$table->float('price', 10, 0)->default(0);
			
			$table->foreign('transfer_service_id', 'FK_vehicles_features_transfer_service')->references('id')->on('transfer_service')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('vehicles_type_catalogue_id', 'FK_vehicles_features_vehicles_type_catalogue')->references('id')->on('vehicles_type_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
		});

		DB::statement("ALTER TABLE vehicles_features comment 'Table where are stored the types of vehicles of a transfer campaign and its characteristics'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicles_features');
	}

}
