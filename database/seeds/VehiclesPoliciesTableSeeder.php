<?php

use Illuminate\Database\Seeder;

class VehiclesPoliciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehicles_policies')->delete();
        
        \DB::table('vehicles_policies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'vehicles_features_id' => 1,
                'max_customer_wait_time' => 30,
                'max_prov_domestic_wait_time' => 60,
                'max_prov_internac_wait_time' => 90,
                'transport_type' => 'PRIVATE',
                'has_door_to_door_service' => 1,
                'hours_available' => 24,
                'days_available' => 0,
                'bag_dimentions' => '',
                'bag_weight_kg' => 0,
                'max_stops' => 4,
            ),
            1 => 
            array (
                'id' => 4,
                'vehicles_features_id' => 2,
                'max_customer_wait_time' => 30,
                'max_prov_domestic_wait_time' => 60,
                'max_prov_internac_wait_time' => 90,
                'transport_type' => 'SHARED',
                'has_door_to_door_service' => 1,
                'hours_available' => 24,
                'days_available' => 0,
                'bag_dimentions' => '',
                'bag_weight_kg' => 0,
                'max_stops' => 1,
            ),
            2 => 
            array (
                'id' => 5,
                'vehicles_features_id' => 3,
                'max_customer_wait_time' => 30,
                'max_prov_domestic_wait_time' => 60,
                'max_prov_internac_wait_time' => 90,
                'transport_type' => 'PRIVATE',
                'has_door_to_door_service' => 1,
                'hours_available' => 24,
                'days_available' => 0,
                'bag_dimentions' => '',
                'bag_weight_kg' => 0,
                'max_stops' => 3,
            ),
            3 => 
            array (
                'id' => 7,
                'vehicles_features_id' => 4,
                'max_customer_wait_time' => 30,
                'max_prov_domestic_wait_time' => 60,
                'max_prov_internac_wait_time' => 90,
                'transport_type' => 'SHARED',
                'has_door_to_door_service' => 1,
                'hours_available' => 24,
                'days_available' => 0,
                'bag_dimentions' => '',
                'bag_weight_kg' => 0,
                'max_stops' => 1,
            ),
            4 => 
            array (
                'id' => 10,
                'vehicles_features_id' => 5,
                'max_customer_wait_time' => 30,
                'max_prov_domestic_wait_time' => 60,
                'max_prov_internac_wait_time' => 90,
                'transport_type' => 'PRIVATE',
                'has_door_to_door_service' => 1,
                'hours_available' => 24,
                'days_available' => 0,
                'bag_dimentions' => '',
                'bag_weight_kg' => 0,
                'max_stops' => 1,
            ),
            5 => 
            array (
                'id' => 11,
                'vehicles_features_id' => 6,
                'max_customer_wait_time' => 30,
                'max_prov_domestic_wait_time' => 60,
                'max_prov_internac_wait_time' => 90,
                'transport_type' => 'PRIVATE',
                'has_door_to_door_service' => 1,
                'hours_available' => 24,
                'days_available' => 0,
                'bag_dimentions' => '',
                'bag_weight_kg' => 0,
                'max_stops' => 1,
            ),
            6 => 
            array (
                'id' => 13,
                'vehicles_features_id' => 7,
                'max_customer_wait_time' => 30,
                'max_prov_domestic_wait_time' => 60,
                'max_prov_internac_wait_time' => 90,
                'transport_type' => 'PRIVATE',
                'has_door_to_door_service' => 1,
                'hours_available' => 24,
                'days_available' => 0,
                'bag_dimentions' => '',
                'bag_weight_kg' => 0,
                'max_stops' => 1,
            ),
            7 => 
            array (
                'id' => 16,
                'vehicles_features_id' => 8,
                'max_customer_wait_time' => 30,
                'max_prov_domestic_wait_time' => 60,
                'max_prov_internac_wait_time' => 90,
                'transport_type' => 'PRIVATE',
                'has_door_to_door_service' => 1,
                'hours_available' => 24,
                'days_available' => 0,
                'bag_dimentions' => '',
                'bag_weight_kg' => 0,
                'max_stops' => 1,
            ),
        ));
        
        
    }
}