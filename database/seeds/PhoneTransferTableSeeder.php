<?php

use Illuminate\Database\Seeder;

class PhoneTransferTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('phone_transfer')->delete();
        
        \DB::table('phone_transfer')->insert(array (
            0 => 
            array (
                'id' => 1,
                'transfer_service_id' => 1,
                'phone_number' => '+58-2124445566',
            ),
            1 => 
            array (
                'id' => 2,
                'transfer_service_id' => 2,
                'phone_number' => '+58-2129995566',
            ),
            2 => 
            array (
                'id' => 3,
                'transfer_service_id' => 2,
                'phone_number' => '+58-2129995567',
            ),
            3 => 
            array (
                'id' => 4,
                'transfer_service_id' => 3,
                'phone_number' => '+58-2129994433',
            ),
            4 => 
            array (
                'id' => 5,
                'transfer_service_id' => 3,
                'phone_number' => '+58-2129994434',
            ),
        ));
        
        
    }
}