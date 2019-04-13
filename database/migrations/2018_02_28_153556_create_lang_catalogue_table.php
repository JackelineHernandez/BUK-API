<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLangCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lang_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('lang_description', 80)->default('0')->comment('Language\'s name');
			$table->string('iso_codelang', 40)->nullable()->default('0')->comment('estandar code ISO-639-1 of language');
		});

		DB::statement("ALTER TABLE lang_catalogue comment 'Catalog table of Languages'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lang_catalogue');
	}

}
