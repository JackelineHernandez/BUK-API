<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayConditionsPayCardsCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pay_conditions_pay_cards_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pay_cards_catalogue_id')->default(0)->index('FK_INDEX_pay_cards_catalogue_pay_conditions');
			$table->integer('pay_conditions_id')->default(0)->index('FK_INDEX_pay_conditions_pay_cards_catalogue');
			
			$table->foreign('pay_cards_catalogue_id', 'FK_pay_cards_catalogue_pay_conditions')->references('id')->on('pay_cards_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('pay_conditions_id', 'FK_pay_conditions_pay_cards_catalogue')->references('id')->on('pay_conditions')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pay_conditions_pay_cards_catalogue');
	}

}
