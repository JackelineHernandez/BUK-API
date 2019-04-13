<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentCatalogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_catalogue', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 80)->nullable()->default('0');
		});

		DB::statement("ALTER TABLE payment_catalogue comment 'Table where the payment methods are stored'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_catalogue');
	}

}
