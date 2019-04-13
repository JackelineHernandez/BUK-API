<?php

use Illuminate\Database\Seeder;

class VehiclesAvailabilityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehicles_availability')->delete();
        
        \DB::table('vehicles_availability')->insert(array (
            0 => 
            array (
                'id' => 1,
                'vehicles_features_id' => 1,
                'vehicle_stock_quantity' => 8,
                'vehicle_occupied_quantity' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'vehicles_features_id' => 2,
                'vehicle_stock_quantity' => 4,
                'vehicle_occupied_quantity' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'vehicles_features_id' => 3,
                'vehicle_stock_quantity' => 7,
                'vehicle_occupied_quantity' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'vehicles_features_id' => 4,
                'vehicle_stock_quantity' => 10,
                'vehicle_occupied_quantity' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'vehicles_features_id' => 5,
                'vehicle_stock_quantity' => 8,
                'vehicle_occupied_quantity' => 3,
            ),
            5 => 
            array (
                'id' => 6,
                'vehicles_features_id' => 7,
                'vehicle_stock_quantity' => 8,
                'vehicle_occupied_quantity' => 3,
            ),
            6 => 
            array (
                'id' => 7,
                'vehicles_features_id' => 6,
                'vehicle_stock_quantity' => 8,
                'vehicle_occupied_quantity' => 3,
            ),
            7 => 
            array (
                'id' => 8,
                'vehicles_features_id' => 8,
                'vehicle_stock_quantity' => 8,
                'vehicle_occupied_quantity' => 1,
            ),
        ));
        
        
    }
}