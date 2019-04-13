<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesPoliciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles_policies', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicles_features_id')->default(0)->unique('INDEX_UNK_vehicles_policies_vehicles_features');
			$table->integer('max_customer_wait_time')->default(0);
			$table->integer('max_prov_domestic_wait_time')->default(0);
			$table->integer('max_prov_internac_wait_time')->default(0);
			$table->enum('transport_type', array('PRIVATE','SHARED'));
			$table->boolean('has_door_to_door_service');
			$table->integer('hours_available');
			$table->integer('days_available');
			$table->string('bag_dimentions', 20);
			$table->integer('bag_weight_kg');
			$table->integer('max_stops')->default(0);

			$table->foreign('vehicles_features_id', 'FK_vehicles_policies_vehicles_features')->references('id')->on('vehicles_features')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
		});

		DB::unprepared('CREATE INDEX FK_INDEX_vehicles_policies_vehicles_features ON vehicles_policies (vehicles_features_id);');
		
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicles_policies');
	}

}
