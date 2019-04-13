<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDescriptiongenHotelFacilityCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('descriptiongen_hotel_facility_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('descriptiongen_hotel_id')->nullable()->index('FK_INDEX_descripciongen_hotel_facility_catalogue');
			$table->integer('facility_catalogue_id')->nullable()->index('FK_INDEX_facility_catalogue_descriptiongen_hotel');
			
			$table->foreign('descriptiongen_hotel_id', 'FK_descripciongen_hotel_facility_catalogue')->references('id')->on('descriptiongen_hotel')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('facility_catalogue_id', 'FK_facility_catalogue_descriptiongen_hotel')->references('id')->on('facility_catalogue')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});

		DB::statement("ALTER TABLE descriptiongen_hotel_facility_catalogue comment 'pivot table where the hotel\'s general data are associated with the facilities'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('descriptiongen_hotel_facility_catalogue');
	}

}
