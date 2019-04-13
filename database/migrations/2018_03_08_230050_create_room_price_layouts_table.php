<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomPriceLayoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_price_layouts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('hotel_service_id')->default(0)->index('INDEX_room_price_layouts_hotel_service')->comment('Foreign key to table hotel_service');
			$table->integer('room_type_catalogue_id')->default(0)->index('FK_INDEX_room_price_layouts_room_type_catalogue')->comment('Foreign key to table room_type_catalogue');
			$table->integer('room_names_catalogue_id')->default(0)->index('FK_INDEX_room_price_layouts_room_names_catalogue');
			$table->integer('room_quantity')->default(0)->comment('Quantity of internal room in the principal room');
			$table->integer('living_quantity')->default(0)->comment('Quantity of living in the room');
			$table->integer('bath_quantity')->default(0)->comment('Quantity of bath in the room');
			$table->integer('room_people_quantity')->default(0)->comment('Quantity  of people by room integer value');
			$table->integer('room_total_measure')->nullable()->comment('Total Measures of room integer value');
			$table->enum('unit_measure_room', array('Square meters','Square feet'))->nullable();
			$table->string('custom_name', 70)->nullable()->comment('custom name');
			$table->boolean('has_smoking_policy')->default(1)->comment('Boolean if the value is true smoking is not allowed, if it is false the smoking is allowed');
			$table->text('smoking_policy_description', 65535)->nullable()->comment('describes the smoking policies of the establishment');
			$table->bigInteger('price')->nullable()->comment('Base Price of room big int value');

			
			$table->foreign('hotel_service_id', 'FK_room_price_layouts_hotel_service')->references('id')->on('hotel_service')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('room_type_catalogue_id', 'FK_room_price_layouts_room_type_catalogue')->references('id')->on('room_type_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('room_names_catalogue_id', 'FK_room_price_layouts_room_names_catalogue')->references('id')->on('room_names_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
			
			$table->softDeletes();
		});

		DB::statement("ALTER TABLE room_price_layouts comment 'Table where the layout characteristics of a hotel are stored'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('room_price_layouts');
	}

}
