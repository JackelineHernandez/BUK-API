<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAmenitiesHotelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('amenities_hotel', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('hotel_service_id')->default(0)->unique('INDEX_UNK_amenities_hotel_service');
			$table->boolean('has_extra_bed')->nullable()->comment('if chose yes extrabed value 1 else value 0');
			
			$table->foreign('hotel_service_id', 'FK_amenities_hotel_service')->references('id')->on('hotel_service')->onUpdate('CASCADE')->onDelete('RESTRICT');
			
			$table->softDeletes();
		});

		DB::unprepared('CREATE INDEX FK_INDEX_amenities_hotel_service ON amenities_hotel (hotel_service_id);');
		DB::statement("ALTER TABLE amenities_hotel comment 'Intermediate table where the amenities that a hotel can have are associated'");
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('amenities_hotel');
	}

}
