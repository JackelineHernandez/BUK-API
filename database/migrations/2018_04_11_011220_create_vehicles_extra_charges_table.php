<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesExtraChargesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles_extra_charges', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('extra_charges_catalogue_id')->default(0)->index('FK_INDEX_vehicles_extra_charges_catalogue');
			$table->integer('vehicles_features_id')->default(0)->index('FK_INDEX_vehicles_extra_charges_vehicles_features');
			$table->integer('quantity')->default(0);
			$table->bigInteger('unit_price')->default(0);

			$table->foreign('extra_charges_catalogue_id', 'FK_vehicles_extra_charges_catalogue')->references('id')->on('extra_charges_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('vehicles_features_id', 'FK_vehicles_extra_charges_vehicles_features')->references('id')->on('vehicles_features')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicles_extra_charges');
	}

}
