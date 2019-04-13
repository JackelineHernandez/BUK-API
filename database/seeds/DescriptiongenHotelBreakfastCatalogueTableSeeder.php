<?php

use Illuminate\Database\Seeder;

class DescriptiongenHotelBreakfastCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('descriptiongen_hotel_breakfast_catalogue')->delete();
        
        \DB::table('descriptiongen_hotel_breakfast_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'descriptiongen_hotel_id' => 12,
                'breakfast_catalogue_id' => 10,
                'breakfast_price' => 600,
            ),
            1 => 
            array (
                'id' => 2,
                'descriptiongen_hotel_id' => 4,
                'breakfast_catalogue_id' => 3,
                'breakfast_price' => 600,
            ),
            2 => 
            array (
                'id' => 3,
                'descriptiongen_hotel_id' => 5,
                'breakfast_catalogue_id' => 3,
                'breakfast_price' => 570,
            ),
            3 => 
            array (
                'id' => 4,
                'descriptiongen_hotel_id' => 3,
                'breakfast_catalogue_id' => 6,
                'breakfast_price' => 300,
            ),
            4 => 
            array (
                'id' => 5,
                'descriptiongen_hotel_id' => 3,
                'breakfast_catalogue_id' => 7,
                'breakfast_price' => 300,
            ),
            5 => 
            array (
                'id' => 6,
                'descriptiongen_hotel_id' => 3,
                'breakfast_catalogue_id' => 11,
                'breakfast_price' => 200,
            ),
            6 => 
            array (
                'id' => 7,
                'descriptiongen_hotel_id' => 3,
                'breakfast_catalogue_id' => 3,
                'breakfast_price' => 600,
            ),
            7 => 
            array (
                'id' => 8,
                'descriptiongen_hotel_id' => 4,
                'breakfast_catalogue_id' => 3,
                'breakfast_price' => 600,
            ),
            8 => 
            array (
                'id' => 9,
                'descriptiongen_hotel_id' => 4,
                'breakfast_catalogue_id' => 3,
                'breakfast_price' => 600,
            ),
            9 => 
            array (
                'id' => 10,
                'descriptiongen_hotel_id' => 4,
                'breakfast_catalogue_id' => 3,
                'breakfast_price' => 600,
            ),
            10 => 
            array (
                'id' => 11,
                'descriptiongen_hotel_id' => 4,
                'breakfast_catalogue_id' => 11,
                'breakfast_price' => 200,
            ),
            11 => 
            array (
                'id' => 12,
                'descriptiongen_hotel_id' => 4,
                'breakfast_catalogue_id' => 3,
                'breakfast_price' => 600,
            ),
            12 => 
            array (
                'id' => 13,
                'descriptiongen_hotel_id' => 5,
                'breakfast_catalogue_id' => 4,
                'breakfast_price' => 700,
            ),
            13 => 
            array (
                'id' => 14,
                'descriptiongen_hotel_id' => 5,
                'breakfast_catalogue_id' => 2,
                'breakfast_price' => 500,
            ),
            14 => 
            array (
                'id' => 15,
                'descriptiongen_hotel_id' => 5,
                'breakfast_catalogue_id' => 12,
                'breakfast_price' => 400,
            ),
            15 => 
            array (
                'id' => 16,
                'descriptiongen_hotel_id' => 12,
                'breakfast_catalogue_id' => 8,
                'breakfast_price' => 900,
            ),
            16 => 
            array (
                'id' => 17,
                'descriptiongen_hotel_id' => 4,
                'breakfast_catalogue_id' => 1,
                'breakfast_price' => 500,
            ),
            17 => 
            array (
                'id' => 18,
                'descriptiongen_hotel_id' => 5,
                'breakfast_catalogue_id' => 1,
                'breakfast_price' => 450,
            ),
            18 => 
            array (
                'id' => 19,
                'descriptiongen_hotel_id' => 6,
                'breakfast_catalogue_id' => 1,
                'breakfast_price' => 550,
            ),
        ));
        
        
    }
}