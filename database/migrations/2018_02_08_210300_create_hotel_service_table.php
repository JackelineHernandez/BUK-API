<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel_service', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('id de clave principal');
			$table->string('establishment_name', 180)->default('0')->comment('nombre establecimiento');
			$table->integer('category_catalogue_id')->default(0)->index('FK_INDEX_hotel_service_hotel_category_catalogue')->comment('foreign key to the categories catalog table');
			$table->integer('establishment_type_catalogue_id')->default(0)->index('FK_INDEX_hotel_service_establishment_type_catalogue')->comment('foreign key to the establishment type catalog table');
			$table->string('city', 70)->default('0')->comment('City');
			$table->string('state', 70)->default('0')->comment('State');
			$table->string('country', 70)->default('0')->comment('Country');
			$table->string('zip', 11)->default('0')->comment('zip');
			$table->text('reference', 65535)->comment('points of reference of location');
			$table->text('home_address', 65535)->comment('address, exact address or more approx');
			$table->bigInteger('quantity_rooms')->comment('Hotel\'s quantity of rooms');
			$table->text('geo_coordinates', 65535)->comment('Geographical location data');
			$table->boolean('channel_manager')->nullable()->comment('channel manager logical data that indicates whether or not it has');
			$table->string('channelmanager_descript', 90)->nullable()->comment('description or name of channel manager');
			$table->string('responsible_name', 70)->comment('name of the responsible');
			$table->string('email', 70)->comment('email');
			$table->boolean('belongs_hotel_chain')->nullable()->comment('indicates if it belongs to a hotel chain');
			$table->string('hotel_chain_description', 70)->nullable()->comment('description or hotel chain name');
			
			$table->foreign('establishment_type_catalogue_id', 'FK_hotel_service_establishment_type_catalogue')->references('id')->on('establishment_type_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('category_catalogue_id', 'FK_hotel_service_hotel_category_catalogue')->references('id')->on('category_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
			$table->softDeletes();
		});

		DB::unprepared('CREATE INDEX estname ON hotel_service (establishment_name) USING BTREE;');
		DB::statement("ALTER TABLE hotel_service comment 'Table where the hotel\'s basic information is stored'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hotel_service');
	}

}
