<?php

use Illuminate\Database\Seeder;

class VehiclesFeaturesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehicles_features')->delete();
        
        \DB::table('vehicles_features')->insert(array (
            0 => 
            array (
                'id' => 1,
                'transfer_service_id' => 1,
                'brand' => 'FORD',
                'model' => 'EXPLORER',
                'max_person_bags' => 1,
                'max_person_handbags' => 1,
                'vehicles_type_catalogue_id' => 13,
                'persons_quantity' => 4,
                'other_features' => 'Spanish-speaking driver',
                'price' => 220.78,
            ),
            1 => 
            array (
                'id' => 2,
                'transfer_service_id' => 1,
                'brand' => 'CHEVROLET',
                'model' => 'THAOE',
                'max_person_bags' => 2,
                'max_person_handbags' => 1,
                'vehicles_type_catalogue_id' => 15,
                'persons_quantity' => 5,
                'other_features' => 'bilingual driver',
                'price' => 280.78,
            ),
            2 => 
            array (
                'id' => 3,
                'transfer_service_id' => 2,
                'brand' => 'NISSAN',
                'model' => 'PATH FINDER',
                'max_person_bags' => 1,
                'max_person_handbags' => 1,
                'vehicles_type_catalogue_id' => 15,
                'persons_quantity' => 5,
                'other_features' => 'Spanish-speaking driver',
                'price' => 300.0,
            ),
            3 => 
            array (
                'id' => 4,
                'transfer_service_id' => 2,
                'brand' => 'NISSAN',
                'model' => 'MURANO',
                'max_person_bags' => 1,
                'max_person_handbags' => 1,
                'vehicles_type_catalogue_id' => 13,
                'persons_quantity' => 4,
                'other_features' => 'Spanish-speaking driver',
                'price' => 300.0,
            ),
            4 => 
            array (
                'id' => 5,
                'transfer_service_id' => 3,
                'brand' => 'VOLVO',
                'model' => 'volvobus',
                'max_person_bags' => 3,
                'max_person_handbags' => 1,
                'vehicles_type_catalogue_id' => 17,
                'persons_quantity' => 40,
                'other_features' => 'Spanish-speaking driver',
                'price' => 900.0,
            ),
            5 => 
            array (
                'id' => 6,
                'transfer_service_id' => 3,
                'brand' => 'Audi',
                'model' => 'A5',
                'max_person_bags' => 1,
                'max_person_handbags' => 1,
                'vehicles_type_catalogue_id' => 6,
                'persons_quantity' => 6,
                'other_features' => 'Spanish-speaking driver',
                'price' => 400.0,
            ),
            6 => 
            array (
                'id' => 7,
                'transfer_service_id' => 3,
                'brand' => 'Honda',
                'model' => 'Acoord',
                'max_person_bags' => 1,
                'max_person_handbags' => 1,
                'vehicles_type_catalogue_id' => 6,
                'persons_quantity' => 5,
                'other_features' => 'Spanish-speaking driver',
                'price' => 380.0,
            ),
            7 => 
            array (
                'id' => 8,
                'transfer_service_id' => 1,
                'brand' => 'Volskwagen',
                'model' => 'BORA',
                'max_person_bags' => 1,
                'max_person_handbags' => 1,
                'vehicles_type_catalogue_id' => 4,
                'persons_quantity' => 4,
                'other_features' => 'bilingual driver',
                'price' => 280.78,
            ),
        ));
        
        
    }
}