<?php

use Illuminate\Database\Seeder;

class BreakfastCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('breakfast_catalogue')->delete();
        
        \DB::table('breakfast_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'breakfast_type' => 'Continental',
            ),
            1 => 
            array (
                'id' => 2,
                'breakfast_type' => 'American',
            ),
            2 => 
            array (
                'id' => 3,
                'breakfast_type' =>'Buffet',
            ),
            3 => 
            array (
                'id' => 4,
                'breakfast_type' => utf8_encode("À la carte"),
            ),
            4 => 
            array (
                'id' => 5,
                'breakfast_type' => 'Italian',
            ),
            5 => 
            array (
                'id' => 6,
                'breakfast_type' => 'Full English/Irish',
            ),
            6 => 
            array (
                'id' => 7,
                'breakfast_type' => 'Vegetarian',
            ),
            7 => 
            array (
                'id' => 8,
                'breakfast_type' => 'Vegan',
            ),
            8 => 
            array (
                'id' => 9,
                'breakfast_type' => 'Halal',
            ),
            9 => 
            array (
                'id' => 10,
                'breakfast_type' => 'Gluten-Free',
            ),
            10 => 
            array (
                'id' => 11,
                'breakfast_type' => 'Kosher',
            ),
            11 => 
            array (
                'id' => 12,
                'breakfast_type' => 'Asian',
            ),
        ));
        
        
    }
}