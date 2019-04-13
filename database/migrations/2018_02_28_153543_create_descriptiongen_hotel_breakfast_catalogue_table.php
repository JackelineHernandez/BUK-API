<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDescriptiongenHotelBreakfastCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('descriptiongen_hotel_breakfast_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('descriptiongen_hotel_id')->default(0)->index('FK_INDEX_descriptiongen_hotel_breakfast_catalogue');
			$table->integer('breakfast_catalogue_id')->default(0)->index('FK_INDEX_breakfast_catalogue_descriptiongen_hotel');
			$table->bigInteger('breakfast_price')->default(0);
			
			$table->foreign('breakfast_catalogue_id', 'FK_breakfast_catalogue_descriptiongen_hotel')->references('id')->on('breakfast_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('descriptiongen_hotel_id', 'FK_descriptiongen_hotel_breakfast_catalogue')->references('id')->on('descriptiongen_hotel')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});

		DB::statement("ALTER TABLE descriptiongen_hotel_breakfast_catalogue comment 'pivot table where the breakfast\'s types offered by a hotel and its price are associated'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('descriptiongen_hotel_breakfast_catalogue');
	}

}
