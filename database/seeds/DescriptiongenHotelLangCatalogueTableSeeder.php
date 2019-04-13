<?php

use Illuminate\Database\Seeder;

class DescriptiongenHotelLangCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('descriptiongen_hotel_lang_catalogue')->delete();
        
        \DB::table('descriptiongen_hotel_lang_catalogue')->insert(array (
            0 => 
            array (
                'id' => 2,
                'descriptiongen_hotel_id' => 3,
                'lang_catalogue_id' => 1,
            ),
            1 => 
            array (
                'id' => 12,
                'descriptiongen_hotel_id' => 3,
                'lang_catalogue_id' => 4,
            ),
            2 => 
            array (
                'id' => 15,
                'descriptiongen_hotel_id' => 3,
                'lang_catalogue_id' => 7,
            ),
            3 => 
            array (
                'id' => 3,
                'descriptiongen_hotel_id' => 4,
                'lang_catalogue_id' => 1,
            ),
            4 => 
            array (
                'id' => 10,
                'descriptiongen_hotel_id' => 4,
                'lang_catalogue_id' => 4,
            ),
            5 => 
            array (
                'id' => 4,
                'descriptiongen_hotel_id' => 5,
                'lang_catalogue_id' => 1,
            ),
            6 => 
            array (
                'id' => 16,
                'descriptiongen_hotel_id' => 5,
                'lang_catalogue_id' => 3,
            ),
            7 => 
            array (
                'id' => 9,
                'descriptiongen_hotel_id' => 5,
                'lang_catalogue_id' => 4,
            ),
            8 => 
            array (
                'id' => 5,
                'descriptiongen_hotel_id' => 6,
                'lang_catalogue_id' => 1,
            ),
            9 => 
            array (
                'id' => 8,
                'descriptiongen_hotel_id' => 6,
                'lang_catalogue_id' => 4,
            ),
            10 => 
            array (
                'id' => 6,
                'descriptiongen_hotel_id' => 12,
                'lang_catalogue_id' => 1,
            ),
            11 => 
            array (
                'id' => 13,
                'descriptiongen_hotel_id' => 12,
                'lang_catalogue_id' => 2,
            ),
            12 => 
            array (
                'id' => 7,
                'descriptiongen_hotel_id' => 12,
                'lang_catalogue_id' => 4,
            ),
            13 => 
            array (
                'id' => 14,
                'descriptiongen_hotel_id' => 12,
                'lang_catalogue_id' => 5,
            ),
        ));
        
        
    }
}