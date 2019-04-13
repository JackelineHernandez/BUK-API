<?php

use Illuminate\Database\Seeder;

class VehiclesCategoryCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehicles_category_catalogue')->delete();
        
        \DB::table('vehicles_category_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bus',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Truck',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Car',
            ),
        ));
        
        
    }
}