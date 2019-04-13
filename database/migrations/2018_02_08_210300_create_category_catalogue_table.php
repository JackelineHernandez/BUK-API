<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('category_name', 70)->default('0');
		});

		DB::statement("ALTER TABLE category_catalogue comment 'Catalog table of system categories'");
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_catalogue');
	}

}
