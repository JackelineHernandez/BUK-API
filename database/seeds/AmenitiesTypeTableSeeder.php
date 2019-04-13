<?php

use Illuminate\Database\Seeder;

class AmenitiesTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('amenities_type')->delete();
        
        \DB::table('amenities_type')->insert(array (
            0 => 
            array (
                'id' => 1,
                'amenities_type_description' => 'General Amenities',
            ),
            1 => 
            array (
                'id' => 2,
                'amenities_type_description' => 'Bathroom',
            ),
            2 => 
            array (
                'id' => 3,
                'amenities_type_description' => 'Media & Technology',
            ),
            3 => 
            array (
                'id' => 4,
                'amenities_type_description' => 'Food & Drink',
            ),
            4 => 
            array (
                'id' => 5,
                'amenities_type_description' => 'Services & Extras',
            ),
            5 => 
            array (
                'id' => 6,
                'amenities_type_description' => 'Outdoor & View',
            ),
            6 => 
            array (
                'id' => 7,
                'amenities_type_description' => 'Accessibility',
            ),
            7 => 
            array (
                'id' => 8,
                'amenities_type_description' => 'Building characteristics',
            ),
            8 => 
            array (
                'id' => 9,
                'amenities_type_description' => 'Entertainment & Family Services',
            ),
        ));
        
        
    }
}