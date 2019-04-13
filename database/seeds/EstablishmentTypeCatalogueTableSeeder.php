<?php

use Illuminate\Database\Seeder;

class EstablishmentTypeCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('establishment_type_catalogue')->delete();
        
        \DB::table('establishment_type_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'establishment_type_description' => 'Apartment',
                'property_description' => 'Apartment: Furnished, independent accommodations available for short- and long-term rental',
                'active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'establishment_type_description' => 'Bed and breakfast',
                'property_description' => 'Bed and breakfast: Private home offering overnight stays and breakfast',
                'active' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'establishment_type_description' => 'Country House',
                'property_description' => 'Country House: Private home in the countryside with simple accommodations',
                'active' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'establishment_type_description' => 'Guest House',
                'property_description' => 'Guesthouse: Private home with separate living facilities for host and guest',
                'active' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'establishment_type_description' => 'Homestay',
                'property_description' => 'Homestay: Private home with shared living facilities for host and guest',
                'active' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'establishment_type_description' => 'Farm stay',
                'property_description' => 'Farm stay: Private farm with simple accommodations',
                'active' => 0,
            ),
            6 => 
            array (
                'id' => 7,
                'establishment_type_description' => 'Lodge',
                'property_description' => 'Lodge: Private home with accommodations surrounded by nature, such as a forest or mountains',
                'active' => 0,
            ),
            7 => 
            array (
                'id' => 8,
                'establishment_type_description' => 'Holyday Home',
                'property_description' => 'Holyday Home: A home that people own in order to holiday in and that is in a different location to the home they usually live in',
                'active' => 0,
            ),
            8 => 
            array (
                'id' => 9,
                'establishment_type_description' => 'Villa',
                'property_description' => 'Villa: Private, freestanding and independent home with a luxury feel',
                'active' => 0,
            ),
            9 => 
            array (
                'id' => 10,
                'establishment_type_description' => 'Chalet',
                'property_description' => 'Chalet: Freestanding home characterized by a sloping roof and rented specifically for vacations',
                'active' => 0,
            ),
            10 => 
            array (
                'id' => 11,
                'establishment_type_description' => 'Hotel',
                'property_description' => 'Hotel:Accommodations for travelers often with restaurants, meeting rooms and other guest services',
                'active' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'establishment_type_description' => 'Hostel',
                'property_description' => 'Hostel: Budget accommodations with mostly dorm-style beds and social atmosphere',
                'active' => 0,
            ),
            12 => 
            array (
                'id' => 13,
                'establishment_type_description' => 'Motel',
                'property_description' => 'Motel: Roadside hotel usually for motorists, with direct access to parking and fewer amenities',
                'active' => 0,
            ),
            13 => 
            array (
                'id' => 14,
                'establishment_type_description' => 'Inn',
                'property_description' => 'Inn: Small property with basic accommodations and a rustic feel',
                'active' => 0,
            ),
            14 => 
            array (
                'id' => 15,
                'establishment_type_description' => 'Capsule Hotel',
                'property_description' => 'Capsule Hotel: Extremely small units or capsules offering cheap and basic overnight accommodations',
                'active' => 0,
            ),
            15 => 
            array (
                'id' => 16,
                'establishment_type_description' => 'Condo hotel',
                'property_description' => 'Condo hotel: Independent apartments with some hotel facilities like a front desk',
                'active' => 0,
            ),
            16 => 
            array (
                'id' => 17,
                'establishment_type_description' => 'Resort',
                'property_description' => 'Resort: A place for relaxation with on-site restaurants, activities and often a luxury feel',
                'active' => 0,
            ),
            17 => 
            array (
                'id' => 18,
                'establishment_type_description' => 'HolyDay park',
                'property_description' => 'Description not available',
                'active' => 0,
            ),
            18 => 
            array (
                'id' => 19,
                'establishment_type_description' => 'Campground',
                'property_description' => 'Campground: Accommodations offering cabins or bungalows alongside areas for camping or campers, with shared facilities or recreational activities',
                'active' => 0,
            ),
            19 => 
            array (
                'id' => 20,
                'establishment_type_description' => 'Luxury tent',
                'property_description' => 'Luxury Tent: Tents with fixed beds and some services, located in natural surroundings',
                'active' => 0,
            ),
            20 => 
            array (
                'id' => 21,
                'establishment_type_description' => 'Riad',
                'property_description' => 'Riad: Traditional Moroccan accommodations with a courtyard and luxury feel',
                'active' => 0,
            ),
            21 => 
            array (
                'id' => 22,
                'establishment_type_description' => 'Ryokan',
                'property_description' => 'Ryokan: Traditional Japanese-style accommodations with meal options',
                'active' => 0,
            ),
            22 => 
            array (
                'id' => 23,
                'establishment_type_description' => 'Love Hotel',
                'property_description' => 'Love Hotel: Adult-only accommodations rented by the hour or night',
                'active' => 0,
            ),
            23 => 
            array (
                'id' => 24,
                'establishment_type_description' => 'Boat',
                'property_description' => 'Boat: Commercial travel accommodations located on a boat',
                'active' => 0,
            ),
            24 => 
            array (
                'id' => 25,
                'establishment_type_description' => 'Economy Hotel',
                'property_description' => 'Economy hotel:  Are small to medium-sized hotel establishments that offer basic accommodations with little to no services.',
                'active' => 0,
            ),
        ));
        
        
    }
}