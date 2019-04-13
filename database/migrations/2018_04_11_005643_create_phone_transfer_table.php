<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhoneTransferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phone_transfer', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('transfer_service_id')->nullable()->default(0)->index('FK_INDEX_phone_transfer_service');
			$table->string('phone_number', 25)->nullable()->default('0');
			
			$table->foreign('transfer_service_id', 'FK_phone_transfer_service')->references('id')->on('transfer_service')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
		});

		DB::statement("ALTER TABLE phone_transfer comment 'table to store the telephone number of a hotel'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('phone_transfer');
	}

}
