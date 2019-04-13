<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAmenityExtraBedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('amenity_extra_beds', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('amenities_hotel_id')->default(0)->index('FK_INDEX_amenity_extra_beds_amenities_hotel');
			$table->integer('extra_beds_quantity')->default(0);
			$table->boolean('have_children_in_cribs')->default(0);
			$table->bigInteger('child_cribs_price')->default(0);
			$table->boolean('have_children')->default(0);
			$table->enum('children_ages', array('Up to 6 years old','Up to 12 years old','Up to 16  years old'))->default('Up to 6 years old')->nullable();
			$table->bigInteger('children_price')->default(0);
			$table->boolean('have_adults')->default(1);
			$table->bigInteger('adult_price')->default(0);
			
			$table->foreign('amenities_hotel_id', 'FK_amenity_extra_beds_amenities_hotel')->references('id')->on('amenities_hotel')->onUpdate('CASCADE')->onDelete('RESTRICT');
			
			$table->softDeletes();
		});

		DB::statement("ALTER TABLE amenity_extra_beds comment 'set up table where is defined the extra beds options'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('amenity_extra_beds');
	}

}
