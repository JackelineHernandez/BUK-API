<?php

use Illuminate\Database\Seeder;

class DescriptiongenHotelFacilityCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('descriptiongen_hotel_facility_catalogue')->delete();
        
        \DB::table('descriptiongen_hotel_facility_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'descriptiongen_hotel_id' => 3,
                'facility_catalogue_id' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'descriptiongen_hotel_id' => 3,
                'facility_catalogue_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'descriptiongen_hotel_id' => 3,
                'facility_catalogue_id' => 5,
            ),
            3 => 
            array (
                'id' => 4,
                'descriptiongen_hotel_id' => 3,
                'facility_catalogue_id' => 4,
            ),
            4 => 
            array (
                'id' => 5,
                'descriptiongen_hotel_id' => 3,
                'facility_catalogue_id' => 3,
            ),
        ));
        
        
    }
}