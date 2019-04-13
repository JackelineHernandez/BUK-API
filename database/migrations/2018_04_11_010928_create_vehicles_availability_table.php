<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesAvailabilityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles_availability', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicles_features_id')->default(0)->unique('INDEX_UNK_vehicles_availability_vehicles_features');
			$table->integer('vehicle_stock_quantity')->default(0);
			$table->integer('vehicle_occupied_quantity')->default(0);
			
			$table->foreign('vehicles_features_id', 'FK_vehicles_availability_vehicles_features')->references('id')->on('vehicles_features')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
		});
		
		DB::unprepared('CREATE INDEX FK_INDEX_vehicles_availability_vehicles_features ON vehicles_availability (vehicles_features_id);');
		DB::statement("ALTER TABLE vehicles_availability comment 'Table where the availability and stock of a type of vehicle of a transfer company is stored'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicles_availability');
	}

}
