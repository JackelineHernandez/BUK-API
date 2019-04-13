<?php

use Illuminate\Database\Seeder;

class RoomPriceLayoutsItemMeasureCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('room_price_layouts_item_measure_catalogue')->delete();
        
        \DB::table('room_price_layouts_item_measure_catalogue')->insert(array (
            0 => 
            array (
                'id' => 2,
                'room_price_layouts_id' => 1,
                'item_measure_catalogue_id' => 3,
                'item_quantity' => 1,
                'item_people_quantity' => 2,
            ),
            1 => 
            array (
                'id' => 3,
                'room_price_layouts_id' => 1,
                'item_measure_catalogue_id' => 1,
                'item_quantity' => 2,
                'item_people_quantity' => 2,
            ),
            2 => 
            array (
                'id' => 4,
                'room_price_layouts_id' => 2,
                'item_measure_catalogue_id' => 2,
                'item_quantity' => 1,
                'item_people_quantity' => 2,
            ),
            3 => 
            array (
                'id' => 5,
                'room_price_layouts_id' => 3,
                'item_measure_catalogue_id' => 2,
                'item_quantity' => 1,
                'item_people_quantity' => 2,
            ),
            4 => 
            array (
                'id' => 6,
                'room_price_layouts_id' => 3,
                'item_measure_catalogue_id' => 5,
                'item_quantity' => 1,
                'item_people_quantity' => 1,
            ),
        ));
        
        
    }
}