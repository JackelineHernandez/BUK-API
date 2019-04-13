<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAmenitiesTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('amenities_type', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('amenities_type_description', 50)->nullable()->default('0');
		});

		DB::statement("ALTER TABLE amenities_type comment 'General amenites catalog table only applies to the hotel category'");
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('amenities_type');
	}

}
