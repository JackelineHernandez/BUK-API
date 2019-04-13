<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivitiesServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities_service', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('catagory_id')->default(0)->index('FK_INDEX_activies_service_category_catalogue');
			$table->string('comany_name', 50)->default('0');
			$table->string('home_address', 50)->default('0');
			$table->string('country', 50)->default('0');
			$table->string('state', 50)->default('0');
			$table->string('city', 50)->default('0');
			$table->string('email', 50)->default('0');
			$table->string('responsible_name', 50)->default('0');
			
			$table->foreign('catagory_id', 'FK_activies_service_category_catalogue')->references('id')->on('category_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activities_service');
	}

}
