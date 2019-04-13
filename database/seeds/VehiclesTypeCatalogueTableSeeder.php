<?php

use Illuminate\Database\Seeder;

class VehiclesTypeCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehicles_type_catalogue')->delete();
        
        \DB::table('vehicles_type_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'vehicles_category_catalogue_id' => 3,
                'name' => 'Microcar',
            ),
            1 => 
            array (
                'id' => 2,
                'vehicles_category_catalogue_id' => 3,
                'name' => 'Hatchback ',
            ),
            2 => 
            array (
                'id' => 3,
                'vehicles_category_catalogue_id' => 3,
                'name' => 'Family',
            ),
            3 => 
            array (
                'id' => 4,
                'vehicles_category_catalogue_id' => 3,
                'name' => 'Sedan',
            ),
            4 => 
            array (
                'id' => 5,
                'vehicles_category_catalogue_id' => 3,
                'name' => 'Crossover',
            ),
            5 => 
            array (
                'id' => 6,
                'vehicles_category_catalogue_id' => 3,
                'name' => 'Executive',
            ),
            6 => 
            array (
                'id' => 7,
                'vehicles_category_catalogue_id' => 3,
                'name' => 'Compact executive',
            ),
            7 => 
            array (
                'id' => 8,
                'vehicles_category_catalogue_id' => 3,
                'name' => 'Sports sedan',
            ),
            8 => 
            array (
                'id' => 9,
                'vehicles_category_catalogue_id' => 3,
                'name' => 'Sports',
            ),
            9 => 
            array (
                'id' => 10,
                'vehicles_category_catalogue_id' => 2,
                'name' => 'All terrain',
            ),
            10 => 
            array (
                'id' => 11,
                'vehicles_category_catalogue_id' => 2,
                'name' => 'Minivan',
            ),
            11 => 
            array (
                'id' => 12,
                'vehicles_category_catalogue_id' => 2,
                'name' => 'Van',
            ),
            12 => 
            array (
                'id' => 13,
                'vehicles_category_catalogue_id' => 2,
                'name' => 'Luxury 4x2',
            ),
            13 => 
            array (
                'id' => 14,
                'vehicles_category_catalogue_id' => 2,
                'name' => 'Family / ranch',
            ),
            14 => 
            array (
                'id' => 15,
                'vehicles_category_catalogue_id' => 2,
                'name' => 'Luxury 4x4',
            ),
            15 => 
            array (
                'id' => 16,
                'vehicles_category_catalogue_id' => 2,
                'name' => 'Van / passengers',
            ),
            16 => 
            array (
                'id' => 17,
                'vehicles_category_catalogue_id' => 1,
                'name' => 'Midibús',
            ),
            17 => 
            array (
                'id' => 18,
                'vehicles_category_catalogue_id' => 1,
                'name' => 'Minibus',
            ),
            18 => 
            array (
                'id' => 19,
                'vehicles_category_catalogue_id' => 1,
                'name' => 'Two floor bus',
            ),
            19 => 
            array (
                'id' => 20,
                'vehicles_category_catalogue_id' => 1,
                'name' => 'Autocar bus',
            ),
        ));
        
        
    }
}