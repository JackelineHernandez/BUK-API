<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDescriptiongenHotelLangCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('descriptiongen_hotel_lang_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('descriptiongen_hotel_id')->default(0)->comment('foreign key to descriptiongen_hotel');
			$table->integer('lang_catalogue_id')->default(0)->index('FK_INDEX_lang_catalogue_descriptiongen_hotel')->comment('foreign key to languages catalog');
			$table->unique(['descriptiongen_hotel_id','lang_catalogue_id'], 'UNK_descriptiongen_hotel_lang_catalogue');
			
			$table->foreign('lang_catalogue_id', 'FK_lang_catalogue_descriptiongen_hotel')->references('id')->on('lang_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('descriptiongen_hotel_id', 'FK_descriptiongen_hotel_lang_catalogue')->references('id')->on('descriptiongen_hotel')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});

		DB::statement("ALTER TABLE descriptiongen_hotel_lang_catalogue comment 'Pivot table where the hotel\'s general data is associated with the languages'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('descriptiongen_hotel_lang_catalogue');
	}

}
