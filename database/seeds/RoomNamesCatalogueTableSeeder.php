<?php

use Illuminate\Database\Seeder;

class RoomNamesCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('room_names_catalogue')->delete();
        
        \DB::table('room_names_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Budget Double Room',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Business Double Room with Gym Privileges',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Deluxe Double Room',
            ),
            3 => 
            array (
                'id' => 4,
            'name' => 'Deluxe Double Room (adult + child)',
            ),
            4 => 
            array (
                'id' => 5,
            'name' => 'Deluxe Double Room (adult + children)',
            ),
            5 => 
            array (
                'id' => 6,
            'name' => 'Deluxe Double Room (adults + child)',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Deluxe Double Room with Balcony',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Deluxe Double Room with Balcony and Sea View',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Deluxe Double Room with Bath',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Deluxe Double Room with Castle View',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Deluxe Double Room with Extra Bed',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Deluxe Double Room with Sea View',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Deluxe Double Room with Shower',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Deluxe Double Room with Side Sea View',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Deluxe Double or Twin Room',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Deluxe King Room',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Deluxe Queen Room',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Deluxe Room',
            ),
            18 => 
            array (
                'id' => 19,
            'name' => 'Deluxe Room (adult + child)',
            ),
            19 => 
            array (
                'id' => 20,
            'name' => 'Deluxe Room (adult + children)',
            ),
            20 => 
            array (
                'id' => 21,
            'name' => 'Deluxe Room (adults + child)',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Double Room',
            ),
            22 => 
            array (
                'id' => 23,
            'name' => 'Double Room (adult + child)',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Double Room - Disability Access',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Double Room with Balcony',
            ),
            25 => 
            array (
                'id' => 26,
            'name' => 'Double Room with Balcony (adults + child)',
            ),
            26 => 
            array (
                'id' => 27,
            'name' => 'Double Room with Balcony (adults)',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Double Room with Balcony and Sea View',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Double Room with Extra Bed',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Double Room with Garden View',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Double Room with Lake View',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Double Room with Mountain View',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Double Room with Patio',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Double Room with Pool View',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Double Room with Private Bathroom',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Double Room with Private External Bathroom',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Double Room with Sea View',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Double Room with Shared Bathroom',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Double Room with Shared Toilet',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Double Room with Spa Bath',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Double Room with Terrace',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Economy Double Room',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Garden View King',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'King Room',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'King Room - Disability Access',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'King Room with Balcony',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'King Room with Lake View',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'King Room with Mountain View',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'King Room with Pool View',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'King Room with Roll-In Shower - Disability Access',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'King Room with Sea View',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'King Room with Spa Bath',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Large Double Room',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Queen Room',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Queen Room - Disability Access',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Queen Room with Balcony',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Queen Room with Garden View',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Queen Room with Pool View',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Queen Room with Sea View',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Queen Room with Shared Bathroom',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Queen Room with Spa Bath',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Small Double Room',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Standard Double Room',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Standard Double Room with Fan',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Standard Double Room with Shared Bathroom',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Standard King Room',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Standard Queen Room',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Superior Double Room',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Superior King Room',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Superior Queen Room',
            ),
        ));
        
        
    }
}