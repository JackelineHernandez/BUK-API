<?php

use Illuminate\Database\Seeder;

class HotelServiceCustomerTypeCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hotel_service_customer_type_catalogue')->delete();
        
        \DB::table('hotel_service_customer_type_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'customer_type_catalogue_id' => 1,
                'hotel_service_id' => 1,
                'active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'customer_type_catalogue_id' => 2,
                'hotel_service_id' => 1,
                'active' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'customer_type_catalogue_id' => 3,
                'hotel_service_id' => 1,
                'active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'customer_type_catalogue_id' => 4,
                'hotel_service_id' => 1,
                'active' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'customer_type_catalogue_id' => 1,
                'hotel_service_id' => 2,
                'active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'customer_type_catalogue_id' => 2,
                'hotel_service_id' => 2,
                'active' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'customer_type_catalogue_id' => 3,
                'hotel_service_id' => 2,
                'active' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'customer_type_catalogue_id' => 4,
                'hotel_service_id' => 2,
                'active' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'customer_type_catalogue_id' => 1,
                'hotel_service_id' => 3,
                'active' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'customer_type_catalogue_id' => 2,
                'hotel_service_id' => 3,
                'active' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'customer_type_catalogue_id' => 3,
                'hotel_service_id' => 3,
                'active' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'customer_type_catalogue_id' => 4,
                'hotel_service_id' => 3,
                'active' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'customer_type_catalogue_id' => 1,
                'hotel_service_id' => 4,
                'active' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'customer_type_catalogue_id' => 2,
                'hotel_service_id' => 4,
                'active' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'customer_type_catalogue_id' => 3,
                'hotel_service_id' => 4,
                'active' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'customer_type_catalogue_id' => 4,
                'hotel_service_id' => 4,
                'active' => 0,
            ),
            16 => 
            array (
                'id' => 17,
                'customer_type_catalogue_id' => 1,
                'hotel_service_id' => 5,
                'active' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'customer_type_catalogue_id' => 2,
                'hotel_service_id' => 5,
                'active' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'customer_type_catalogue_id' => 3,
                'hotel_service_id' => 5,
                'active' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'customer_type_catalogue_id' => 4,
                'hotel_service_id' => 5,
                'active' => 0,
            ),
        ));
        
        
    }
}