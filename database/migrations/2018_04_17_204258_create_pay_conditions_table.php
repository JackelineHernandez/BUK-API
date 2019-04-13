<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayConditionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pay_conditions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('politic_conditions_id')->unique('INDEX_UNK_pay_conditions_politic_conditions');
			$table->boolean('charge_credit_card')->default(0);
			$table->boolean('apply_vat_tax')->nullable()->default(0);
			$table->boolean('apply_city_tax')->nullable()->default(0);
			$table->boolean('price_include_city_tax')->nullable()->default(0);
			$table->bigInteger('city_tax_amount')->default(0);
			$table->enum('city_tax_type', array('US$/For Stay','US$/For  person for night','Dont not apply','US$/For night','Dont can to calculate','US$/For person for stay','%'))->nullable();
			
			$table->foreign('politic_conditions_id', 'FK_pay_conditions_politic_conditions')->references('id')->on('politic_conditions')->onUpdate('CASCADE')->onDelete('RESTRICT');
			
			$table->softDeletes();
		});

		DB::unprepared('CREATE INDEX FK_INDEX_pay_conditions_politic_conditions ON pay_conditions (politic_conditions_id);');
		DB::statement("ALTER TABLE pay_conditions comment 'Table where the information of the payments by hotel reservation is stored'");
	
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pay_conditions');
	}

}
