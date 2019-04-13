<?php

use Illuminate\Database\Seeder;

class InternetPlaceCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('internet_place_catalogue')->delete();
        
        \DB::table('internet_place_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
            'internet_place' => 'Public Areas',
            ),
            1 => 
            array (
                'id' => 2,
            'internet_place' => 'Some Rooms',
            ),
            2 => 
            array (
                'id' => 3,
            'internet_place' => 'All Rooms',
            ),
            3 => 
            array (
                'id' => 4,
            'internet_place' => 'Entire Property',
            ),
        ));
        
        
    }
}