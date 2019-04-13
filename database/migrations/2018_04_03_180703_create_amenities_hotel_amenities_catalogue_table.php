<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAmenitiesHotelAmenitiesCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('amenities_hotel_amenities_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('amenities_hotel_id')->default(0)->index('FK_INDEX_amenities_hotel_amenities_catalogue');
			$table->integer('amenities_catalogue_id')->default(0)->index('FK_INDEX_amenities_catalogue_amenities_hotel');
			
			$table->foreign('amenities_catalogue_id', 'FK_amenities_catalogue_amenities_hotel')->references('id')->on('amenities_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('amenities_hotel_id', 'FK_amenities_hotel_amenities_catalogue')->references('id')->on('amenities_hotel')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('amenities_hotel_amenities_catalogue');
	}

}
