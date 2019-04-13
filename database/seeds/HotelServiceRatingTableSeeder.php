<?php

use Illuminate\Database\Seeder;

class HotelServiceRatingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hotel_service_rating')->delete();
        
        \DB::table('hotel_service_rating')->insert(array (
            0 => 
            array (
                'id' => 1,
                'hotel_service_id' => 1,
                'star_rating' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'hotel_service_id' => 2,
                'star_rating' => 4,
            ),
            2 => 
            array (
                'id' => 3,
                'hotel_service_id' => 3,
                'star_rating' => 5,
            ),
            3 => 
            array (
                'id' => 4,
                'hotel_service_id' => 4,
                'star_rating' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'hotel_service_id' => 5,
                'star_rating' => 1,
            ),
        ));
        
        
    }
}