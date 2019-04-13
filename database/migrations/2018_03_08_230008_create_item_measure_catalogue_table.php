<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemMeasureCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_measure_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('item_name', 80)->nullable()->default('0');
			$table->string('measure', 70)->nullable()->default('0');
		});

		DB::statement("ALTER TABLE item_measure_catalogue comment 'Catalog table where the bedroom items and their measurements are stored'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_measure_catalogue');
	}

}
