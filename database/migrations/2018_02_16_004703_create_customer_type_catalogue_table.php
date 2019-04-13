<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTypeCatalogueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_type_catalogue', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('category_catalogue_id')->default(0)->index('FK_INDEX_customer_type_catalogue_category_catalogue');
			$table->string('client_kind_description', 70)->nullable()->default('0')->comment('Type of CLient Description');
			
			$table->foreign('category_catalogue_id', 'FK_customer_type_catalogue_category_catalogue')->references('id')->on('category_catalogue')->onUpdate('CASCADE')->onDelete('RESTRICT');
		
        });
        
        DB::statement("ALTER TABLE customer_type_catalogue comment 'Catalog Table of types of customer'");
	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_type_catalogue');
    }
}
