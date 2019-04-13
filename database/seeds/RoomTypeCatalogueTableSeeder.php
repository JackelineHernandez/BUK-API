<?php

use Illuminate\Database\Seeder;

class RoomTypeCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('room_type_catalogue')->delete();
        
        \DB::table('room_type_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'room_type_description' => 'Standard',
            ),
            1 => 
            array (
                'id' => 2,
                'room_type_description' => 'Junior',
            ),
            2 => 
            array (
                'id' => 3,
                'room_type_description' => 'Suite',
            ),
            3 => 
            array (
                'id' => 4,
                'room_type_description' => 'Family',
            ),
            4 => 
            array (
                'id' => 5,
                'room_type_description' => 'Executive',
            ),
			 5 => 
            array (
                'id' => 6,
                'room_type_description' => 'Single Room',
            ),
			 6 => 
            array (
                'id' => 7,
                'room_type_description' => 'Double Room',
            ),
			 7 => 
            array (
                'id' => 8,
                'room_type_description' => 'Twin',
            ),
			 8 => 
            array (
                'id' => 9,
                'room_type_description' => 'Twin/Double',
            ),
			 9 => 
            array (
                'id' => 10,
                'room_type_description' => 'Triple Room',
            ),
			 10 => 
            array (
                'id' => 11,
                'room_type_description' => 'Quadruple Room',
            ),
			 11 => 
            array (
                'id' => 12,
                'room_type_description' => 'Deluxe Room',
            ),
			 12 => 
            array (
                'id' => 13,
                'room_type_description' => 'Studio',
            ),
			 13 => 
            array (
                'id' => 14,
                'room_type_description' => 'Apartment',
            ),
			 14 => 
            array (
                'id' => 15,
                'room_type_description' => 'Dorm Room',
            ),
			 15 => 
            array (
                'id' => 16,
                'room_type_description' => 'Bed in Dorm Room',
            ),
        ));
        
        
    }
}