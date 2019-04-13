<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCancelPoliticsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cancel_politics', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->enum('cancellation_days', array('Day of arrival (18:00/6:00 pm)','1 Day','2 Days','3 Days','4 Days','7 Days','14 Days'))->nullable();
			$table->boolean('has_grace_period')->default(0);
			$table->enum('grace_time_period', array('1 Hour After Booking: Takes care of instant cancellation requests','4 Hours After Booking: Covers most accidental bookings','24 Hours After Booking: Protects you from the highest amount of cancellation requests'))->nullable();
			$table->enum('penality', array('Of the First Night','Of Full Stay'))->nullable();
			$table->integer('politic_conditions_id')->default(0)->unique('INDEX_UNK_cancel_politics_conditions');
		
			$table->foreign('politic_conditions_id', 'FK_cancel_politics_conditions')->references('id')->on('politic_conditions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			
			$table->softDeletes();
		});

		DB::unprepared('CREATE INDEX FK_INDEX_cancel_politics_conditions ON cancel_politics (politic_conditions_id);');
		DB::statement("ALTER TABLE cancel_politics comment 'Table where the cancellation conditions are stored'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cancel_politics');
	}

}
