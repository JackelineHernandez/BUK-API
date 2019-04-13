<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDescriptiongenHotelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('descriptiongen_hotel', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('hotel_service_id')->default(0)->unique('INDEX_unique_descriptiongen_hotel_service');
			$table->boolean('has_internet')->default(1)->comment('if it has internet the value is 1 if not 0');
			$table->boolean('pay_internet')->nullable()->comment('The value can be pay 1 or free 0');
			$table->integer('internet_connect_type_catalogue_id')->nullable()->index('FK_INDEX_descriptiongen_hotel_internet_connect_type_catalogue');
			$table->integer('internet_place_catalogue_id')->nullable()->index('FK_INDEX_descriptiongen_hotel_internet_place_catalogue');
			$table->bigInteger('internet_price')->nullable()->comment('price of internet, the value is expressed on dollar');
			$table->boolean('has_parking')->default(1)->comment('If it has parking the value us 1 if not 0');
			$table->boolean('pay_parking')->nullable()->comment('If the parking is pay the value is 1 if not 0');
			$table->enum('parking_condition', array('Parking free','Parking on Request'))->nullable();
			$table->enum('parking_access', array('Private','Public'))->nullable();
			$table->enum('parking_location', array('On Site','Off Site'))->nullable();
			$table->bigInteger('parking_price')->nullable();
			$table->boolean('has_breakfast')->default(1)->comment('If the price has de breakfast included the value is 1 if not 0');
			$table->boolean('pay_breakfast')->nullable()->comment('If the breakfast is pay the value is 1 if not 0');
			
			$table->foreign('hotel_service_id', 'FK_descripciongen_hotel_service')->references('id')->on('hotel_service')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('internet_connect_type_catalogue_id', 'FK_descriptiongen_hotel_internet_connect_type_catalogue')->references('id')->on('internet_connect_type_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('internet_place_catalogue_id', 'FK_descriptiongen_hotel_internet_place_catalogue')->references('id')->on('internet_place_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
			
			$table->softDeletes();
		});

		DB::unprepared('CREATE INDEX INDEX_descriptiongen_hotel_service ON descriptiongen_hotel (hotel_service_id) USING BTREE;');
		DB::statement("ALTER TABLE descriptiongen_hotel comment 'Table where the general descriptions for each hotel are stored'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('descriptiongen_hotel');
	}

}
