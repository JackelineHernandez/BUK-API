<?php

use Illuminate\Database\Seeder;

class TransferServiceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transfer_service')->delete();
        
        \DB::table('transfer_service')->insert(array (
            0 => 
            array (
                'id' => 1,
                'company_name' => 'BE QUICK ,TRANSFERS',
                'category_catalogue_id' => 8,
                'home_address' => 'BOSTON',
                'country' => 'UNITED STATES OF AMERICA',
                'city' => 'BOSTON',
                'state' => 'MASASHUSETS',
                'zip' => '3456',
                'email' => 'mail@bequick.com',
                'responsible_name' => 'jhon connor',
            ),
            1 => 
            array (
                'id' => 2,
                'company_name' => 'HIGHT SPEED D ,TRANSFERS',
                'category_catalogue_id' => 8,
                'home_address' => 'LAS VEGAS',
                'country' => 'UNITED STATES OF AMERICA',
                'city' => 'LAS VEGAS',
                'state' => 'NEVADA',
                'zip' => '3451',
                'email' => 'mail@hightspeed.com',
                'responsible_name' => 'dave mustaine',
            ),
            2 => 
            array (
                'id' => 3,
                'company_name' => 'Turbo Lover ,Transfers',
                'category_catalogue_id' => 8,
                'home_address' => 'L.A.',
                'country' => 'UNITED STATES OF AMERICA',
                'city' => 'L.A.',
                'state' => 'CALIFORNIA',
                'zip' => '098',
                'email' => 'mail@turbol.com',
                'responsible_name' => 'Glen tipton',
            ),
        ));
        
        
    }
}