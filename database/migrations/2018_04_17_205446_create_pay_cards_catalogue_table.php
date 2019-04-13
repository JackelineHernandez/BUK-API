<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayCardsCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pay_cards_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('payment_catalogue_id')->default(0)->index('FK_INDEX_pay_cards_catalogue_payment_catalogue');
			$table->string('name', 70)->default('0');
			$table->text('image_path')->nullable();
			
			$table->foreign('payment_catalogue_id', 'FK_pay_cards_catalogue_payment_catalogue')->references('id')->on('payment_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pay_cards_catalogue');
	}

}
