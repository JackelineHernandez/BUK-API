<?php

use Illuminate\Database\Seeder;

class CustomerTypeCatalogueTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('customer_type_catalogue')->delete();
        
        \DB::table('customer_type_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_catalogue_id' => 1,
                'client_kind_description' => 'Agency',
            ),
            1 => 
            array (
                'id' => 2,
                'category_catalogue_id' => 1,
                'client_kind_description' => 'Direct',
            ),
            2 => 
            array (
                'id' => 3,
                'category_catalogue_id' => 1,
                'client_kind_description' => 'Operators',
            ),
            3 => 
            array (
                'id' => 4,
                'category_catalogue_id' => 1,
                'client_kind_description' => 'OTAS',
            ),
        ));
    }
}
