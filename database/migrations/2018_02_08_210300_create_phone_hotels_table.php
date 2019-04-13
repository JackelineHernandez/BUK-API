<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhoneHotelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phone_hotels', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('hotel_service_id')->nullable()->default(0)->index('FK_INDEX_phone_hotels_hotel_service');
			$table->string('phone_number', 25)->nullable()->default('0');

			$table->foreign('hotel_service_id', 'FK_phone_hotels_hotel_service')->references('id')->on('hotel_service')->onUpdate('CASCADE')->onDelete('RESTRICT');
			
			$table->softDeletes();
		});
		
		DB::statement("ALTER TABLE phone_hotels comment 'table to store the telephone number of a hotel'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('phone_hotels');
	}

}
