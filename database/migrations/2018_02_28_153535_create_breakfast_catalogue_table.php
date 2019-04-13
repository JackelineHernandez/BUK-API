<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBreakfastCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('breakfast_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('breakfast_type', 50)->default('0')->comment('breakfast\'s type description');
		});

		DB::statement("ALTER TABLE breakfast_catalogue comment 'Catalog table where breakfast types are stored'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('breakfast_catalogue');
	}

}
