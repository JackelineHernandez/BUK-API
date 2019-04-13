<?php

use Illuminate\Database\Seeder;

class PaymentCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_catalogue')->delete();
        
        \DB::table('payment_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Credit card',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Debit Card',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Cash',
            ),
        ));
        
        
    }
}