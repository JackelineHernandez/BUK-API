<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransferServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transfer_service', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('company_name', 70)->comment('Name of the Transfer company');
			$table->integer('category_catalogue_id')->index('FK_INDEX_transfer_service_category_catalogue');
			$table->string('home_address', 256)->comment('Address');
			$table->string('country', 50);
			$table->string('city', 50);
			$table->string('state', 50);
			$table->string('zip', 20);
			$table->string('email', 20)->comment('email of company');
			$table->string('responsible_name', 70)->nullable()->comment('Responsible name of company');
			
			$table->foreign('category_catalogue_id', 'FK_transfer_service_category_catalogue')->references('id')->on('category_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
		});

		DB::statement("ALTER TABLE transfer_service comment 'Table where the basic information of the company that provides the transfer service is stored'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transfer_service');
	}

}
