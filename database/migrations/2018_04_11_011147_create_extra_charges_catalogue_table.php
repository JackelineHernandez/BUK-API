<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtraChargesCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('extra_charges_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('category_id')->default(0)->index('FK_INDEX_extra_charges_catalogue_category_catalogue');
			$table->string('name', 90)->default('0');
			
			$table->foreign('category_id', 'FK_extra_charges_catalogue_category_catalogue')->references('id')->on('category_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
		});

		DB::statement("ALTER TABLE extra_charges_catalogue comment 'Catalogue table of Extra Charges'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('extra_charges_catalogue');
	}

}
