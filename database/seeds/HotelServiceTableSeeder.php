<?php

use Illuminate\Database\Seeder;

class HotelServiceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hotel_service')->delete();
        
        \DB::table('hotel_service')->insert(array (
            0 => 
            array (
                'id' => 1,
                'establishment_name' => 'hotel lomas',
                'category_catalogue_id' => 1,
                'establishment_type_catalogue_id' => 11,
                'city' => 'caracas',
                'state' => 'distrito capital',
                'country' => 'venezuela',
                'zip' => '1030',
                'reference' => '',
                'home_address' => 'Calle Principal Zona F, Caracas 1030, Distrito Capital, Venezuela',
                'quantity_rooms' => 33,
                'geo_coordinates' => '10.504768939448446, -66.94593991946107',
                'channel_manager' => 0,
                'channelmanager_descript' => NULL,
                'responsible_name' => 'PEDRO MORAN',
                'belongs_hotel_chain' => NULL,
                'hotel_chain_description' => NULL,
                'email' => 'pcgmiguel@gmail.com',
            ),
            1 => 
            array (
                'id' => 2,
                'establishment_name' => 'hotel paseo las mercedes',
                'category_catalogue_id' => 1,
                'establishment_type_catalogue_id' => 11,
                'city' => 'caracas',
                'state' => 'distrito capital',
                'country' => 'venezuela',
                'zip' => '1080',
                'reference' => 'CC PASEO LAS MERCEDES',
                'home_address' => 'Avenida Principal de las Mercedes, Caracas 1080, Distrito Capital, Venezuela',
                'quantity_rooms' => 700,
                'geo_coordinates' => '10.478327649645237, -66.85798645019531',
                'channel_manager' => 0,
                'channelmanager_descript' => NULL,
                'responsible_name' => 'JOSE MARQUEZ',
                'belongs_hotel_chain' => NULL,
                'hotel_chain_description' => NULL,
                'email' => 'pcgmiguel@gmail.com',
            ),
            2 => 
            array (
                'id' => 3,
                'establishment_name' => 'hotel tamanaco intercontinental',
                'category_catalogue_id' => 1,
                'establishment_type_catalogue_id' => 11,
                'city' => 'caracas',
                'state' => 'distrito capital',
                'country' => 'venezuela',
                'zip' => '1061',
                'reference' => 'CCCT',
                'home_address' => 'Calle Herrera Toro, Caracas 1061, Distrito Capital, Venezuela',
                'quantity_rooms' => 800,
                'geo_coordinates' => '10.477230456073755, -66.85658633708954',
                'channel_manager' => 0,
                'channelmanager_descript' => NULL,
                'responsible_name' => 'LUIS C',
                'belongs_hotel_chain' => NULL,
                'hotel_chain_description' => NULL,
                'email' => 'pcgmiguel@gmail.com',
            ),
            3 => 
            array (
                'id' => 4,
                'establishment_name' => 'hotel chacao & suites',
                'category_catalogue_id' => 1,
                'establishment_type_catalogue_id' => 11,
                'city' => 'caracas',
                'state' => 'distrito capital',
                'country' => 'venezuela',
                'zip' => '1060',
                'reference' => 'CC Bello campo',
                'home_address' => 'Edf. Pedalbia I, Avenida Mohedano, Caracas 1060, Distrito Capital, Venezuela',
                'quantity_rooms' => 300,
                'geo_coordinates' => '10.493350370592518, -66.85335159301758',
                'channel_manager' => 0,
                'channelmanager_descript' => '',
                'responsible_name' => 'JOSE PEREZ',
                'belongs_hotel_chain' => NULL,
                'hotel_chain_description' => NULL,
                'email' => 'jperezl@gmail.com',
            ),
            4 => 
            array (
                'id' => 5,
                'establishment_name' => 'hotel shelter suites',
                'category_catalogue_id' => 1,
                'establishment_type_catalogue_id' => 11,
                'city' => 'caracas',
                'state' => 'distrito capital',
                'country' => 'venezuela',
                'zip' => '1080',
                'reference' => 'CC Bello campo',
                'home_address' => 'Gourmet Plus Venezuela, Av. Jose Felix Sosa con Av. Libertador, Avenida Libertador, Caracas 1080, Distrito Capital, Venezuela',
                'quantity_rooms' => 300,
                'geo_coordinates' => '10.490607512470339, -66.85352325439453',
                'channel_manager' => 1,
                'channelmanager_descript' => 'channell  inctype',
                'responsible_name' => 'LUIS GONZALEZ',
                'belongs_hotel_chain' => NULL,
                'hotel_chain_description' => NULL,
                'email' => 'lgonzalez@gmail.com',
            ),
        ));
        
        
    }
}