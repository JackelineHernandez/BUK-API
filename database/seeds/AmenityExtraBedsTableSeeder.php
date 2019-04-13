<?php

use Illuminate\Database\Seeder;

class AmenityExtraBedsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('amenity_extra_beds')->delete();
        
        \DB::table('amenity_extra_beds')->insert(array (
            0 => 
            array (
                'id' => 1,
                'amenities_hotel_id' => 2,
                'extra_beds_quantity' => 2,
                'have_children_in_cribs' => 1,
                'child_cribs_price' => 20,
                'have_children' => 1,
                'children_ages' => 'Up to 6 years old',
                'children_price' => 35,
                'have_adults' => 1,
                'adult_price' => 50,
            ),
            1 => 
            array (
                'id' => 2,
                'amenities_hotel_id' => 3,
                'extra_beds_quantity' => 3,
                'have_children_in_cribs' => 0,
                'child_cribs_price' => 0,
                'have_children' => 2,
                'children_ages' => 'Up to 12 years old',
                'children_price' => 45,
                'have_adults' => 1,
                'adult_price' => 70,
            ),
        ));
        
        
    }
}