<?php

use Illuminate\Database\Seeder;

class CategoryCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category_catalogue')->delete();
        
        \DB::table('category_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_name' => 'Hotels',
            ),
            1 => 
            array (
                'id' => 2,
                'category_name' => 'Car Rental',
            ),
            2 => 
            array (
                'id' => 3,
                'category_name' => 'Cruise',
            ),
            3 => 
            array (
                'id' => 4,
                'category_name' => 'Theme parks',
            ),
            4 => 
            array (
                'id' => 5,
                'category_name' => 'Flights',
            ),
            5 => 
            array (
                'id' => 6,
                'category_name' => 'Tours',
            ),
            6 => 
            array (
                'id' => 7,
                'category_name' => 'Tourist packages',
            ),
            7 => 
            array (
                'id' => 8,
                'category_name' => 'Transfers',
            ),
            8 => 
            array (
                'id' => 9,
                'category_name' => 'Tickets',
            ),
            9 => 
            array (
                'id' => 10,
                'category_name' => 'Travel insurance',
            ),
            10 => 
            array (
                'id' => 11,
                'category_name' => 'Restaurants',
            ),
            11 => 
            array (
                'id' => 12,
                'category_name' => 'Disney',
            ),
        ));
        
        
    }
}