<?php

use Illuminate\Database\Seeder;

class VehiclesExtraChargesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehicles_extra_charges')->delete();
        
        \DB::table('vehicles_extra_charges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'extra_charges_catalogue_id' => 2,
                'vehicles_features_id' => 3,
                'quantity' => 2,
                'unit_price' => 45,
            ),
            1 => 
            array (
                'id' => 2,
                'extra_charges_catalogue_id' => 1,
                'vehicles_features_id' => 3,
                'quantity' => 30,
                'unit_price' => 50,
            ),
            2 => 
            array (
                'id' => 3,
                'extra_charges_catalogue_id' => 3,
                'vehicles_features_id' => 6,
                'quantity' => 30,
                'unit_price' => 50,
            ),
        ));
        
        
    }
}