<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelServiceCustomerTypeCatalogueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_service_customer_type_catalogue', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('customer_type_catalogue_id')->default(0)->comment('clave foranea hacia la tabla customer type catalogue');
			$table->integer('hotel_service_id')->default(0)->index('FK_INDEX_hotel_service_customer_type_catalogue')->comment('clave foranea hacia la tabla hotel_service');
			$table->boolean('active')->nullable()->default(0)->comment('recibe valor 0 para fase o inactivo y 1 para true o activo');
			$table->unique(['customer_type_catalogue_id','hotel_service_id'], 'INDEX_unkactcli');
			
			$table->foreign('customer_type_catalogue_id', 'FK_customer_type_catalogue_hotel_service')->references('id')->on('customer_type_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('hotel_service_id', 'FK_hotel_service_customer_type_catalogue')->references('id')->on('hotel_service')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
        });
        
        DB::statement("ALTER TABLE hotel_service_customer_type_catalogue comment 'tabla intermedia donde se asocian los tipos de cliente que pueden estar activos para el hotel'");
	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hotel_service_customer_type_catalogue');
    }
}
