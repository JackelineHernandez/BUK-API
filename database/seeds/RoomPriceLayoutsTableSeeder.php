<?php

use Illuminate\Database\Seeder;

class RoomPriceLayoutsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('room_price_layouts')->delete();
        
        \DB::table('room_price_layouts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'hotel_service_id' => 4,
                'room_type_catalogue_id' => 4,
                'room_names_catalogue_id' => 6,
                'room_quantity' => 3,
                'living_quantity' => 1,
                'bath_quantity' => 2,
                'room_people_quantity' => 6,
                'room_total_measure' => NULL,
                'unit_measure_room' => 'Square meters',
                'custom_name' => NULL,
                'has_smoking_policy' => 1,
                'smoking_policy_description' => NULL,
                'price' => 1500,
            ),
            1 => 
            array (
                'id' => 2,
                'hotel_service_id' => 4,
                'room_type_catalogue_id' => 2,
                'room_names_catalogue_id' => 63,
                'room_quantity' => 1,
                'living_quantity' => 0,
                'bath_quantity' => 1,
                'room_people_quantity' => 2,
                'room_total_measure' => NULL,
                'unit_measure_room' => 'Square meters',
                'custom_name' => NULL,
                'has_smoking_policy' => 1,
                'smoking_policy_description' => NULL,
                'price' => 350,
            ),
            2 => 
            array (
                'id' => 3,
                'hotel_service_id' => 4,
                'room_type_catalogue_id' => 1,
                'room_names_catalogue_id' => 3,
                'room_quantity' => 2,
                'living_quantity' => 0,
                'bath_quantity' => 1,
                'room_people_quantity' => 3,
                'room_total_measure' => NULL,
                'unit_measure_room' => 'Square meters',
                'custom_name' => NULL,
                'has_smoking_policy' => 1,
                'smoking_policy_description' => NULL,
                'price' => 480,
            ),
            3 => 
            array (
                'id' => 4,
                'hotel_service_id' => 4,
                'room_type_catalogue_id' => 3,
                'room_names_catalogue_id' => 1,
                'room_quantity' => 2,
                'living_quantity' => 0,
                'bath_quantity' => 2,
                'room_people_quantity' => 4,
                'room_total_measure' => NULL,
                'unit_measure_room' => 'Square meters',
                'custom_name' => NULL,
                'has_smoking_policy' => 1,
                'smoking_policy_description' => NULL,
                'price' => 800,
            ),
            4 => 
            array (
                'id' => 5,
                'hotel_service_id' => 4,
                'room_type_catalogue_id' => 5,
                'room_names_catalogue_id' => 6,
                'room_quantity' => 2,
                'living_quantity' => 1,
                'bath_quantity' => 2,
                'room_people_quantity' => 4,
                'room_total_measure' => NULL,
                'unit_measure_room' => 'Square meters',
                'custom_name' => NULL,
                'has_smoking_policy' => 1,
                'smoking_policy_description' => NULL,
                'price' => 800,
            ),
            5 => 
            array (
                'id' => 6,
                'hotel_service_id' => 2,
                'room_type_catalogue_id' => 4,
                'room_names_catalogue_id' => 5,
                'room_quantity' => 3,
                'living_quantity' => 1,
                'bath_quantity' => 2,
                'room_people_quantity' => 6,
                'room_total_measure' => NULL,
                'unit_measure_room' => 'Square meters',
                'custom_name' => NULL,
                'has_smoking_policy' => 1,
                'smoking_policy_description' => NULL,
                'price' => 1000,
            ),
            6 => 
            array (
                'id' => 7,
                'hotel_service_id' => 2,
                'room_type_catalogue_id' => 3,
                'room_names_catalogue_id' => 26,
                'room_quantity' => 2,
                'living_quantity' => 1,
                'bath_quantity' => 2,
                'room_people_quantity' => 4,
                'room_total_measure' => NULL,
                'unit_measure_room' => 'Square meters',
                'custom_name' => NULL,
                'has_smoking_policy' => 1,
                'smoking_policy_description' => NULL,
                'price' => 700,
            ),
            7 => 
            array (
                'id' => 8,
                'hotel_service_id' => 2,
                'room_type_catalogue_id' => 4,
                'room_names_catalogue_id' => 5,
                'room_quantity' => 3,
                'living_quantity' => 1,
                'bath_quantity' => 2,
                'room_people_quantity' => 6,
                'room_total_measure' => NULL,
                'unit_measure_room' => 'Square meters',
                'custom_name' => NULL,
                'has_smoking_policy' => 1,
                'smoking_policy_description' => NULL,
                'price' => 800,
            ),
            8 => 
            array (
                'id' => 9,
                'hotel_service_id' => 3,
                'room_type_catalogue_id' => 4,
                'room_names_catalogue_id' => 21,
                'room_quantity' => 3,
                'living_quantity' => 1,
                'bath_quantity' => 2,
                'room_people_quantity' => 6,
                'room_total_measure' => NULL,
                'unit_measure_room' => 'Square meters',
                'custom_name' => NULL,
                'has_smoking_policy' => 1,
                'smoking_policy_description' => NULL,
                'price' => 1000,
            ),
            9 => 
            array (
                'id' => 10,
                'hotel_service_id' => 3,
                'room_type_catalogue_id' => 3,
                'room_names_catalogue_id' => 14,
                'room_quantity' => 2,
                'living_quantity' => 1,
                'bath_quantity' => 2,
                'room_people_quantity' => 4,
                'room_total_measure' => NULL,
                'unit_measure_room' => 'Square meters',
                'custom_name' => NULL,
                'has_smoking_policy' => 1,
                'smoking_policy_description' => NULL,
                'price' => 700,
            ),
            10 => 
            array (
                'id' => 11,
                'hotel_service_id' => 3,
                'room_type_catalogue_id' => 4,
                'room_names_catalogue_id' => 18,
                'room_quantity' => 3,
                'living_quantity' => 1,
                'bath_quantity' => 2,
                'room_people_quantity' => 6,
                'room_total_measure' => NULL,
                'unit_measure_room' => 'Square feet',
                'custom_name' => NULL,
                'has_smoking_policy' => 1,
                'smoking_policy_description' => NULL,
                'price' => 800,
            ),
        ));
        
        
    }
}