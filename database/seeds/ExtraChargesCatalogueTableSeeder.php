<?php

use Illuminate\Database\Seeder;

class ExtraChargesCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('extra_charges_catalogue')->delete();
        
        \DB::table('extra_charges_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 8,
            'name' => 'Extra time(minutes)',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 8,
                'name' => 'Extra km',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 8,
                'name' => 'Extra suitcases/bags',
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 8,
                'name' => 'Special packages',
            ),
        ));
        
        
    }
}