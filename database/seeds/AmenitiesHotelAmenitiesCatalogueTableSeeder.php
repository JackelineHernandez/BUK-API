<?php

use Illuminate\Database\Seeder;

class AmenitiesHotelAmenitiesCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('amenities_hotel_amenities_catalogue')->delete();
        
        \DB::table('amenities_hotel_amenities_catalogue')->insert(array (
            0 => 
            array (
                'id' => 2,
                'amenities_hotel_id' => 1,
                'amenities_catalogue_id' => 6,
            ),
            1 => 
            array (
                'id' => 3,
                'amenities_hotel_id' => 1,
                'amenities_catalogue_id' => 9,
            ),
            2 => 
            array (
                'id' => 4,
                'amenities_hotel_id' => 1,
                'amenities_catalogue_id' => 55,
            ),
            3 => 
            array (
                'id' => 5,
                'amenities_hotel_id' => 1,
                'amenities_catalogue_id' => 5,
            ),
            4 => 
            array (
                'id' => 6,
                'amenities_hotel_id' => 1,
                'amenities_catalogue_id' => 14,
            ),
            5 => 
            array (
                'id' => 7,
                'amenities_hotel_id' => 1,
                'amenities_catalogue_id' => 45,
            ),
            6 => 
            array (
                'id' => 8,
                'amenities_hotel_id' => 1,
                'amenities_catalogue_id' => 10,
            ),
            7 => 
            array (
                'id' => 9,
                'amenities_hotel_id' => 1,
                'amenities_catalogue_id' => 34,
            ),
            8 => 
            array (
                'id' => 10,
                'amenities_hotel_id' => 1,
                'amenities_catalogue_id' => 50,
            ),
            9 => 
            array (
                'id' => 11,
                'amenities_hotel_id' => 2,
                'amenities_catalogue_id' => 9,
            ),
            10 => 
            array (
                'id' => 12,
                'amenities_hotel_id' => 2,
                'amenities_catalogue_id' => 5,
            ),
            11 => 
            array (
                'id' => 13,
                'amenities_hotel_id' => 2,
                'amenities_catalogue_id' => 14,
            ),
            12 => 
            array (
                'id' => 14,
                'amenities_hotel_id' => 2,
                'amenities_catalogue_id' => 45,
            ),
            13 => 
            array (
                'id' => 15,
                'amenities_hotel_id' => 2,
                'amenities_catalogue_id' => 10,
            ),
            14 => 
            array (
                'id' => 16,
                'amenities_hotel_id' => 2,
                'amenities_catalogue_id' => 34,
            ),
            15 => 
            array (
                'id' => 17,
                'amenities_hotel_id' => 2,
                'amenities_catalogue_id' => 50,
            ),
            16 => 
            array (
                'id' => 18,
                'amenities_hotel_id' => 3,
                'amenities_catalogue_id' => 9,
            ),
            17 => 
            array (
                'id' => 19,
                'amenities_hotel_id' => 3,
                'amenities_catalogue_id' => 5,
            ),
            18 => 
            array (
                'id' => 20,
                'amenities_hotel_id' => 3,
                'amenities_catalogue_id' => 14,
            ),
            19 => 
            array (
                'id' => 21,
                'amenities_hotel_id' => 3,
                'amenities_catalogue_id' => 45,
            ),
            20 => 
            array (
                'id' => 22,
                'amenities_hotel_id' => 3,
                'amenities_catalogue_id' => 34,
            ),
            21 => 
            array (
                'id' => 23,
                'amenities_hotel_id' => 3,
                'amenities_catalogue_id' => 50,
            ),
            22 => 
            array (
                'id' => 24,
                'amenities_hotel_id' => 3,
                'amenities_catalogue_id' => 55,
            ),
            23 => 
            array (
                'id' => 25,
                'amenities_hotel_id' => 3,
                'amenities_catalogue_id' => 5,
            ),
        ));
        
        
    }
}