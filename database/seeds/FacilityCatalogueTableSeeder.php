<?php

use Illuminate\Database\Seeder;

class FacilityCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('facility_catalogue')->delete();
        
        \DB::table('facility_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'facility_description' => 'Air conditioner',
            ),
            1 => 
            array (
                'id' => 2,
                'facility_description' => 'Family blunt',
            ),
            2 => 
            array (
                'id' => 3,
                'facility_description' => 'Transfers',
            ),
            3 => 
            array (
                'id' => 4,
                'facility_description' => 'Solárium',
            ),
            4 => 
            array (
                'id' => 5,
                'facility_description' => 'Pool',
            ),
        ));
        
        
    }
}