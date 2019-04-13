<?php

use Illuminate\Database\Seeder;

class AmenitiesCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('amenities_catalogue')->delete();
        
        \DB::table('amenities_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'amenities_type_id' => 1,
                'amenity_description' => 'Private Pool',
            ),
            1 => 
            array (
                'id' => 2,
                'amenities_type_id' => 1,
                'amenity_description' => 'Hair dryer',
            ),
            2 => 
            array (
                'id' => 3,
                'amenities_type_id' => 2,
                'amenity_description' => 'Toilette paper',
            ),
            3 => 
            array (
                'id' => 4,
                'amenities_type_id' => 2,
                'amenity_description' => 'Bidet',
            ),
            4 => 
            array (
                'id' => 5,
                'amenities_type_id' => 2,
                'amenity_description' => 'Sauna',
            ),
            5 => 
            array (
                'id' => 6,
                'amenities_type_id' => 2,
                'amenity_description' => 'Spa Tub',
            ),
            6 => 
            array (
                'id' => 7,
                'amenities_type_id' => 2,
                'amenity_description' => 'Hot water',
            ),
            7 => 
            array (
                'id' => 8,
                'amenities_type_id' => 3,
                'amenity_description' => 'Computer',
            ),
            8 => 
            array (
                'id' => 9,
                'amenities_type_id' => 3,
                'amenity_description' => 'Ipad',
            ),
            9 => 
            array (
                'id' => 10,
                'amenities_type_id' => 3,
                'amenity_description' => 'Game console',
            ),
            10 => 
            array (
                'id' => 11,
                'amenities_type_id' => 3,
                'amenity_description' => 'TV',
            ),
            11 => 
            array (
                'id' => 12,
                'amenities_type_id' => 3,
                'amenity_description' => 'Apple tv',
            ),
            12 => 
            array (
                'id' => 13,
                'amenities_type_id' => 4,
                'amenity_description' => 'Grill',
            ),
            13 => 
            array (
                'id' => 14,
                'amenities_type_id' => 4,
                'amenity_description' => 'Food Zone',
            ),
            14 => 
            array (
                'id' => 15,
                'amenities_type_id' => 4,
                'amenity_description' => 'Toaster',
            ),
            15 => 
            array (
                'id' => 16,
                'amenities_type_id' => 4,
                'amenity_description' => 'Dishwasher',
            ),
            16 => 
            array (
                'id' => 17,
                'amenities_type_id' => 4,
                'amenity_description' => 'Kitchenette',
            ),
            17 => 
            array (
                'id' => 18,
                'amenities_type_id' => 4,
                'amenity_description' => 'Fridge',
            ),
            18 => 
            array (
                'id' => 19,
                'amenities_type_id' => 5,
                'amenity_description' => 'Alarm clock',
            ),
            19 => 
            array (
                'id' => 20,
                'amenities_type_id' => 5,
                'amenity_description' => 'Towels',
            ),
            20 => 
            array (
                'id' => 21,
                'amenities_type_id' => 6,
                'amenity_description' => 'Balcony',
            ),
            21 => 
            array (
                'id' => 22,
                'amenities_type_id' => 6,
                'amenity_description' => 'Yard',
            ),
            22 => 
            array (
                'id' => 23,
                'amenities_type_id' => 6,
                'amenity_description' => 'Terrace',
            ),
            23 => 
            array (
                'id' => 24,
                'amenities_type_id' => 6,
                'amenity_description' => 'Lake',
            ),
            24 => 
            array (
                'id' => 25,
                'amenities_type_id' => 6,
                'amenity_description' => 'River',
            ),
            25 => 
            array (
                'id' => 26,
                'amenities_type_id' => 6,
                'amenity_description' => 'Ocean',
            ),
            26 => 
            array (
                'id' => 27,
                'amenities_type_id' => 7,
                'amenity_description' => 'floor located',
            ),
            27 => 
            array (
                'id' => 28,
                'amenities_type_id' => 7,
                'amenity_description' => 'Complete for wheelchairs',
            ),
            28 => 
            array (
                'id' => 29,
                'amenities_type_id' => 8,
                'amenity_description' => 'Modern',
            ),
            29 => 
            array (
                'id' => 30,
                'amenities_type_id' => 8,
                'amenity_description' => 'Old',
            ),
            30 => 
            array (
                'id' => 31,
                'amenities_type_id' => 4,
                'amenity_description' => 'Tea/Coffee maker',
            ),
            31 => 
            array (
                'id' => 32,
                'amenities_type_id' => 1,
                'amenity_description' => 'Clothes rack',
            ),
            32 => 
            array (
                'id' => 33,
                'amenities_type_id' => 1,
                'amenity_description' => 'Drying rack for Clothing',
            ),
            33 => 
            array (
                'id' => 34,
                'amenities_type_id' => 1,
                'amenity_description' => 'Fold-up bed',
            ),
            34 => 
            array (
                'id' => 35,
                'amenities_type_id' => 1,
                'amenity_description' => 'Air conditioning',
            ),
            35 => 
            array (
                'id' => 36,
                'amenities_type_id' => 1,
                'amenity_description' => 'Wardrobe/Closet',
            ),
            36 => 
            array (
                'id' => 37,
                'amenities_type_id' => 1,
                'amenity_description' => 'Carpeted',
            ),
            37 => 
            array (
                'id' => 38,
                'amenities_type_id' => 1,
                'amenity_description' => 'Walk-in closet',
            ),
            38 => 
            array (
                'id' => 39,
                'amenities_type_id' => 1,
                'amenity_description' => 'Fan',
            ),
            39 => 
            array (
                'id' => 40,
                'amenities_type_id' => 1,
                'amenity_description' => 'Fireplace',
            ),
            40 => 
            array (
                'id' => 41,
                'amenities_type_id' => 1,
                'amenity_description' => 'Heating',
            ),
            41 => 
            array (
                'id' => 42,
                'amenities_type_id' => 1,
                'amenity_description' => 'Iron',
            ),
            42 => 
            array (
                'id' => 43,
                'amenities_type_id' => 1,
                'amenity_description' => 'Ironing facilities',
            ),
            43 => 
            array (
                'id' => 44,
                'amenities_type_id' => 1,
                'amenity_description' => 'hot tub',
            ),
            44 => 
            array (
                'id' => 45,
                'amenities_type_id' => 1,
                'amenity_description' => 'Mosquito Net',
            ),
            45 => 
            array (
                'id' => 46,
                'amenities_type_id' => 1,
                'amenity_description' => 'Safe',
            ),
            46 => 
            array (
                'id' => 47,
                'amenities_type_id' => 1,
                'amenity_description' => 'Soundproof',
            ),
            47 => 
            array (
                'id' => 48,
                'amenities_type_id' => 1,
                'amenity_description' => 'Sitting area',
            ),
            48 => 
            array (
                'id' => 49,
                'amenities_type_id' => 1,
                'amenity_description' => 'Tile/Marble floor',
            ),
            49 => 
            array (
                'id' => 50,
                'amenities_type_id' => 1,
                'amenity_description' => 'Washing machine',
            ),
            50 => 
            array (
                'id' => 51,
                'amenities_type_id' => 1,
                'amenity_description' => 'Hardwood/Parquet floors',
            ),
            51 => 
            array (
                'id' => 52,
                'amenities_type_id' => 1,
                'amenity_description' => 'Desk',
            ),
            52 => 
            array (
                'id' => 53,
                'amenities_type_id' => 1,
                'amenity_description' => 'Hypoallergenic',
            ),
            53 => 
            array (
                'id' => 54,
                'amenities_type_id' => 1,
                'amenity_description' => 'Cleanning products',
            ),
            54 => 
            array (
                'id' => 55,
                'amenities_type_id' => 1,
                'amenity_description' => 'Electric blankets',
            ),
            55 => 
            array (
                'id' => 56,
                'amenities_type_id' => 4,
                'amenity_description' => 'Refrigerator',
            ),
            56 => 
            array (
                'id' => 57,
                'amenities_type_id' => 4,
                'amenity_description' => 'Dining Area',
            ),
            57 => 
            array (
                'id' => 58,
                'amenities_type_id' => 4,
                'amenity_description' => 'Dining table',
            ),
            58 => 
            array (
                'id' => 59,
                'amenities_type_id' => 4,
                'amenity_description' => 'Barbecue',
            ),
            59 => 
            array (
                'id' => 60,
                'amenities_type_id' => 4,
                'amenity_description' => 'Oven',
            ),
            60 => 
            array (
                'id' => 61,
                'amenities_type_id' => 4,
                'amenity_description' => 'Stovetop',
            ),
            61 => 
            array (
                'id' => 62,
                'amenities_type_id' => 4,
                'amenity_description' => 'Toaster',
            ),
            62 => 
            array (
                'id' => 63,
                'amenities_type_id' => 4,
                'amenity_description' => 'Electric kettle',
            ),
            63 => 
            array (
                'id' => 64,
                'amenities_type_id' => 4,
                'amenity_description' => 'Outdooor Dining Area',
            ),
            64 => 
            array (
                'id' => 65,
                'amenities_type_id' => 4,
                'amenity_description' => 'Outdooor Furniture',
            ),
            65 => 
            array (
                'id' => 66,
                'amenities_type_id' => 4,
                'amenity_description' => 'Minibar',
            ),
            66 => 
            array (
                'id' => 67,
                'amenities_type_id' => 4,
                'amenity_description' => 'Kitchen',
            ),
            67 => 
            array (
                'id' => 68,
                'amenities_type_id' => 4,
                'amenity_description' => 'Kitchenware',
            ),
            68 => 
            array (
                'id' => 69,
                'amenities_type_id' => 4,
                'amenity_description' => 'Microwave',
            ),
            69 => 
            array (
                'id' => 70,
                'amenities_type_id' => 4,
                'amenity_description' => 'Coffee Machine',
            ),
            70 => 
            array (
                'id' => 71,
                'amenities_type_id' => 4,
                'amenity_description' => 'High chair',
            ),
            71 => 
            array (
                'id' => 72,
                'amenities_type_id' => 2,
                'amenity_description' => 'Toilet with grab Rails',
            ),
            72 => 
            array (
                'id' => 73,
                'amenities_type_id' => 2,
                'amenity_description' => 'Bathtub',
            ),
            73 => 
            array (
                'id' => 74,
                'amenities_type_id' => 2,
                'amenity_description' => 'Free toiletries',
            ),
            74 => 
            array (
                'id' => 75,
                'amenities_type_id' => 2,
                'amenity_description' => 'Guest Bathroom',
            ),
            75 => 
            array (
                'id' => 76,
                'amenities_type_id' => 2,
                'amenity_description' => 'Hairdryer',
            ),
            76 => 
            array (
                'id' => 77,
                'amenities_type_id' => 2,
                'amenity_description' => 'Shower',
            ),
            77 => 
            array (
                'id' => 78,
                'amenities_type_id' => 2,
                'amenity_description' => 'Slipper',
            ),
            78 => 
            array (
                'id' => 79,
                'amenities_type_id' => 2,
                'amenity_description' => 'Additional Bathroom',
            ),
            79 => 
            array (
                'id' => 83,
                'amenities_type_id' => 3,
                'amenity_description' => 'Game console-Nintendo wii',
            ),
            80 => 
            array (
                'id' => 84,
                'amenities_type_id' => 3,
                'amenity_description' => 'Game console-PS2',
            ),
            81 => 
            array (
                'id' => 85,
                'amenities_type_id' => 3,
                'amenity_description' => 'Game console-PS3',
            ),
            82 => 
            array (
                'id' => 86,
                'amenities_type_id' => 3,
                'amenity_description' => 'Game console-XBOX 360',
            ),
            83 => 
            array (
                'id' => 87,
                'amenities_type_id' => 3,
                'amenity_description' => 'Laptop',
            ),
            84 => 
            array (
                'id' => 88,
                'amenities_type_id' => 3,
                'amenity_description' => 'Cable channels',
            ),
            85 => 
            array (
                'id' => 89,
                'amenities_type_id' => 3,
                'amenity_description' => 'Ipod Dock',
            ),
            86 => 
            array (
                'id' => 90,
                'amenities_type_id' => 3,
                'amenity_description' => 'Laptop Safe',
            ),
            87 => 
            array (
                'id' => 91,
                'amenities_type_id' => 3,
                'amenity_description' => 'Flat-Screen TV',
            ),
            88 => 
            array (
                'id' => 92,
                'amenities_type_id' => 3,
                'amenity_description' => 'Pay-per-view cable channels',
            ),
            89 => 
            array (
                'id' => 93,
                'amenities_type_id' => 3,
                'amenity_description' => 'Satellite channels',
            ),
            90 => 
            array (
                'id' => 94,
                'amenities_type_id' => 3,
                'amenity_description' => 'Telephone',
            ),
            91 => 
            array (
                'id' => 95,
                'amenities_type_id' => 3,
                'amenity_description' => 'Video Games',
            ),
            92 => 
            array (
                'id' => 96,
                'amenities_type_id' => 3,
                'amenity_description' => 'Video',
            ),
            93 => 
            array (
                'id' => 97,
                'amenities_type_id' => 5,
                'amenity_description' => 'Wakeup Services',
            ),
            94 => 
            array (
                'id' => 98,
                'amenities_type_id' => 5,
                'amenity_description' => 'Linens',
            ),
            95 => 
            array (
                'id' => 99,
                'amenities_type_id' => 5,
            'amenity_description' => 'Towels/sheets(extra free)',
            ),
            96 => 
            array (
                'id' => 100,
                'amenities_type_id' => 7,
                'amenity_description' => 'Room is located on the ground floor',
            ),
            97 => 
            array (
                'id' => 101,
                'amenities_type_id' => 7,
                'amenity_description' => 'Room is completely wheelchair accessible',
            ),
            98 => 
            array (
                'id' => 102,
                'amenities_type_id' => 7,
                'amenity_description' => 'Upper floors accessible by stairs only',
            ),
            99 => 
            array (
                'id' => 103,
                'amenities_type_id' => 9,
                'amenity_description' => 'Baby safety gates',
            ),
            100 => 
            array (
                'id' => 104,
                'amenities_type_id' => 9,
                'amenity_description' => 'Board gaames/puzzles',
            ),
            101 => 
            array (
                'id' => 105,
                'amenities_type_id' => 9,
                'amenity_description' => 'Books, DVDs or music for childrens',
            ),
            102 => 
            array (
                'id' => 106,
                'amenities_type_id' => 9,
                'amenity_description' => 'Child safety socket covers',
            ),
        ));
        
        
    }
}