<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomPriceLayoutsItemMeasureCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_price_layouts_item_measure_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('room_price_layouts_id')->default(0)->index('FK_INDEX_room_price_layouts_item_measure_catalogue')->comment('foreign key to room_price_layouts');
			$table->integer('item_measure_catalogue_id')->default(0)->index('FK_INDEX_item_measure_catalogue_room_price_layouts')->comment('foreign key to catalog of items measure');
			$table->integer('item_quantity')->default(0)->comment('quantity of item type by room');
			$table->integer('item_people_quantity')->default(0)->comment('quantity of people by item');
			
			$table->foreign('room_price_layouts_id', 'FK_room_price_layouts_item_measure_catalogue')->references('id')->on('room_price_layouts')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('item_measure_catalogue_id', 'FK_item_measure_catalogue_room_price_layouts')->references('id')->on('item_measure_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});

		DB::statement("ALTER TABLE room_price_layouts_item_measure_catalogue comment 'Table where the information of the bedroom items associated with the hotel\'s layout is loaded'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('room_price_layouts_item_measure_catalogue');
	}

}
