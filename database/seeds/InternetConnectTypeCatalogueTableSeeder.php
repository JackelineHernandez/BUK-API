<?php

use Illuminate\Database\Seeder;

class InternetConnectTypeCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('internet_connect_type_catalogue')->delete();
        
        \DB::table('internet_connect_type_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
            'connect_type' => 'Wi-Fi',
            ),
            1 => 
            array (
                'id' => 2,
            'connect_type' => 'Cable',
            ),
        ));
        
        
    }
}