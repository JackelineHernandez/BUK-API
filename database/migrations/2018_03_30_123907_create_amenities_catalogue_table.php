<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAmenitiesCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('amenities_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('amenities_type_id')->default(0)->index('FK_INDEX_amenities_catalogue_amenities_type');
			$table->string('amenity_description', 90)->default('0');
			
			$table->foreign('amenities_type_id', 'FK_amenities_catalogue_amenities_type')->references('id')->on('amenities_type')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});

		DB::statement("ALTER TABLE amenities_catalogue comment 'Catalog table general detail of amenites classified by type, applies only to hotel category'");
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('amenities_catalogue');
	}

}
