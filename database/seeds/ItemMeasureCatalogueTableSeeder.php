<?php

use Illuminate\Database\Seeder;

class ItemMeasureCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('item_measure_catalogue')->delete();
        
        \DB::table('item_measure_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
            'item_name' => 'Twin bed(s)',
                'measure' => '90-130 cm wide',
            ),
            1 => 
            array (
                'id' => 2,
            'item_name' => 'Full bed(s)',
                'measure' => '131-150 cm wide',
            ),
            2 => 
            array (
                'id' => 3,
            'item_name' => 'Queen bed(s)',
                'measure' => '151-180 cm wide',
            ),
            3 => 
            array (
                'id' => 4,
            'item_name' => 'King bed(s) ',
                'measure' => '181-210 cm wide',
            ),
            4 => 
            array (
                'id' => 5,
                'item_name' => 'Bunk bed',
                'measure' => 'Variable Size',
            ),
            5 => 
            array (
                'id' => 6,
                'item_name' => 'Sofa bed',
                'measure' => 'Variable Size',
            ),
            6 => 
            array (
                'id' => 7,
            'item_name' => 'Futon bed(s)',
                'measure' => 'Variable Size',
            ),
        ));
        
        
    }
}