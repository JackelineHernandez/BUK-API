<?php

use Illuminate\Database\Seeder;

class DescriptiongenHotelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('descriptiongen_hotel')->delete();
        
        \DB::table('descriptiongen_hotel')->insert(array (
            0 => 
            array (
                'id' => 3,
                'hotel_service_id' => 4,
                'has_internet' => 1,
                'pay_internet' => 0,
                'internet_connect_type_catalogue_id' => 1,
                'internet_place_catalogue_id' => 3,
                'internet_price' => 0,
                'has_parking' => 1,
                'pay_parking' => 1,
                'parking_condition' => 'Parking free',
                'parking_access' => 'Private',
                'parking_location' => 'On Site',
                'parking_price' => 20,
                'has_breakfast' => 1,
                'pay_breakfast' => 1,
            ),
            1 => 
            array (
                'id' => 4,
                'hotel_service_id' => 1,
                'has_internet' => 0,
                'pay_internet' => 0,
                'internet_connect_type_catalogue_id' => NULL,
                'internet_place_catalogue_id' => NULL,
                'internet_price' => 0,
                'has_parking' => 1,
                'pay_parking' => 1,
                'parking_condition' => 'Parking on Request',
                'parking_access' => 'Public',
                'parking_location' => 'Off Site',
                'parking_price' => 15,
                'has_breakfast' => 1,
                'pay_breakfast' => 1,
            ),
            2 => 
            array (
                'id' => 5,
                'hotel_service_id' => 2,
                'has_internet' => 1,
                'pay_internet' => 0,
                'internet_connect_type_catalogue_id' => 2,
                'internet_place_catalogue_id' => 2,
                'internet_price' => 0,
                'has_parking' => 1,
                'pay_parking' => 1,
                'parking_condition' => 'Parking on Request',
                'parking_access' => 'Private',
                'parking_location' => 'On Site',
                'parking_price' => 30,
                'has_breakfast' => 1,
                'pay_breakfast' => 1,
            ),
            3 => 
            array (
                'id' => 6,
                'hotel_service_id' => 3,
                'has_internet' => 1,
                'pay_internet' => 1,
                'internet_connect_type_catalogue_id' => 1,
                'internet_place_catalogue_id' => 2,
                'internet_price' => 15,
                'has_parking' => 1,
                'pay_parking' => 1,
                'parking_condition' => 'Parking on Request',
                'parking_access' => 'Private',
                'parking_location' => 'On Site',
                'parking_price' => 40,
                'has_breakfast' => 1,
                'pay_breakfast' => 1,
            ),
            4 => 
            array (
                'id' => 12,
                'hotel_service_id' => 5,
                'has_internet' => 1,
                'pay_internet' => 1,
                'internet_connect_type_catalogue_id' => 2,
                'internet_place_catalogue_id' => 3,
                'internet_price' => 20,
                'has_parking' => 1,
                'pay_parking' => 1,
                'parking_condition' => 'Parking free',
                'parking_access' => 'Private',
                'parking_location' => 'Off Site',
                'parking_price' => 47,
                'has_breakfast' => 1,
                'pay_breakfast' => 1,
            ),
        ));
        
        
    }
}