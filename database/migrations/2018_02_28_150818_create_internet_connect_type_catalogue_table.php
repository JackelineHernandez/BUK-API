<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInternetConnectTypeCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('internet_connect_type_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('connect_type', 70)->default('0');
		});

		DB::statement("ALTER TABLE internet_connect_type_catalogue comment 'Catalog table of types of connection to internet'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('internet_connect_type_catalogue');
	}

}
