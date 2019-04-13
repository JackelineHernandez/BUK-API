<?php

use Illuminate\Database\Seeder;

class AmenitiesHotelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('amenities_hotel')->delete();
        
        \DB::table('amenities_hotel')->insert(array (
            0 => 
            array (
                'id' => 1,
                'hotel_service_id' => 4,
                'has_extra_bed' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'hotel_service_id' => 2,
                'has_extra_bed' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'hotel_service_id' => 5,
                'has_extra_bed' => 1,
            ),
        ));
        
        
    }
}