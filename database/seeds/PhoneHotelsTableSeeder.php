<?php

use Illuminate\Database\Seeder;

class PhoneHotelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('phone_hotels')->delete();
        
        \DB::table('phone_hotels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'hotel_service_id' => 1,
                'phone_number' => '+58-2124445566',
            ),
            1 => 
            array (
                'id' => 2,
                'hotel_service_id' => 2,
                'phone_number' => '+58-2129995566',
            ),
            2 => 
            array (
                'id' => 3,
                'hotel_service_id' => 2,
                'phone_number' => '+58-2129995567',
            ),
            3 => 
            array (
                'id' => 4,
                'hotel_service_id' => 2,
                'phone_number' => '+58-2129995556',
            ),
            4 => 
            array (
                'id' => 5,
                'hotel_service_id' => 3,
                'phone_number' => '+58-2129994433',
            ),
            5 => 
            array (
                'id' => 6,
                'hotel_service_id' => 3,
                'phone_number' => '+58-2129994434',
            ),
            6 => 
            array (
                'id' => 7,
                'hotel_service_id' => 3,
                'phone_number' => '+58-2129994467',
            ),
            7 => 
            array (
                'id' => 8,
                'hotel_service_id' => 4,
                'phone_number' => '+58-2122535566',
            ),
            8 => 
            array (
                'id' => 9,
                'hotel_service_id' => 4,
                'phone_number' => '+58-2122536789',
            ),
            9 => 
            array (
                'id' => 10,
                'hotel_service_id' => 4,
                'phone_number' => '+58-2122534456',
            ),
            10 => 
            array (
                'id' => 11,
                'hotel_service_id' => 5,
                'phone_number' => '+58-2122533488',
            ),
            11 => 
            array (
                'id' => 12,
                'hotel_service_id' => 5,
                'phone_number' => '+58-2122533412',
            ),
            12 => 
            array (
                'id' => 13,
                'hotel_service_id' => 5,
                'phone_number' => '+58-21223489',
            ),
        ));
        
        
    }
}