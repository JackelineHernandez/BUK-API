<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGaleryServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galery_services', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('image_path');
			$table->integer('category_catalogue_id')->index('FK_INDEX_galery_services_category_catalogue');
			$table->integer('hotel_service_id')->nullable()->index('FK_INDEX_galery_services_hotel_service');
			$table->integer('transfer_service_id')->nullable()->index('FK_INDEX_galery_services_transfer_service');
			$table->integer('activities_service_id')->nullable()->index('FK_INDEX_galery_services_activities_service');
			
			$table->foreign('activities_service_id', 'FK_galery_services_activities_service')->references('id')->on('activities_service')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('category_catalogue_id', 'FK_galery_services_category_catalogue')->references('id')->on('category_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('hotel_service_id', 'FK_galery_services_hotel_service')->references('id')->on('hotel_service')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('transfer_service_id', 'FK_galery_services_transfer_service')->references('id')->on('transfer_service')->onUpdate('CASCADE')->onDelete('RESTRICT');
			
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('galery_services');
	}

}
