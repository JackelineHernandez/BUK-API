<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePoliticConditionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('politic_conditions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('hotel_service_id')->default(0)->unique('INDEX_UNK_politic_conditions_hotel_service');
			$table->time('checkin_time_from')->default('00:00:00');
			$table->time('checkin_time_to')->default('00:00:00');
			$table->time('checkout_time_from')->default('00:00:00');
			$table->time('checkout_time_to')->default('00:00:00');
			$table->boolean('child_allowed')->default(0);
			$table->enum('child_ages_limit', array('Up to 6 years old','Up to 12 years old','Up to 16  years old'))->nullable();
			$table->integer('child_quantity')->default(0);
			$table->enum('pets_allowed', array('Yes','No','On request'))->nullable();
			$table->enum('pets_charges', array('Pets can stay for free','Charges may be apply'))->nullable();
			$table->integer('minimun_stay')->default(0);
			
			$table->foreign('hotel_service_id', 'FK_politics_conditions_hotel_service')->references('id')->on('hotel_service')->onUpdate('CASCADE')->onDelete('RESTRICT');
			
			$table->softDeletes();
		});

		DB::unprepared('CREATE INDEX FK_INDEX_politic_conditions_hotel_service ON politic_conditions (hotel_service_id);');
		DB::statement("ALTER TABLE politic_conditions comment 'table where hotel conditions and policies are charged'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('politic_conditions');
	}

}
