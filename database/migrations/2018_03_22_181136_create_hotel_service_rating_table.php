<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelServiceRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel_service_rating', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('hotel_service_id')->index('FK_INDEX_hotel_service_rating_hotel_service')->comment('foreign key to the hotel_service table');
			$table->integer('star_rating')->comment('tar rating of a hotel type establishment');
			
			$table->foreign('hotel_service_id', 'FK_hotel_service_rating_hotel_service')->references('id')->on('hotel_service')->onUpdate('CASCADE')->onDelete('RESTRICT');
			
			$table->softDeletes();
		});

		DB::statement("ALTER TABLE hotel_service_rating comment 'Table where the star rating of a hotel-type establishment is stored'");
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hotel_service_rating');
	}

}
