<?php

use Illuminate\Database\Seeder;

class PayCardsCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pay_cards_catalogue')->delete();
        
        \DB::table('pay_cards_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'payment_catalogue_id' => 1,
                'name' => 'Visa',
                'image_path' => 'http://res.cloudinary.com/buk/image/upload/v1524495048/Cards/visa.png'
            ),
            1 => 
            array (
                'id' => 2,
                'payment_catalogue_id' => 1,
                'name' => 'Euro/Mastercard',
                'image_path' => 'http://res.cloudinary.com/buk/image/upload/v1524495047/Cards/master.png'
            ),
            2 => 
            array (
                'id' => 3,
                'payment_catalogue_id' => 1,
                'name' => 'American Express',
                'image_path' => 'http://res.cloudinary.com/buk/image/upload/v1524495045/Cards/americanExpress.png'
            ),
            3 => 
            array (
                'id' => 4,
                'payment_catalogue_id' => 1,
                'name' => 'Discover',
                'image_path' => 'http://res.cloudinary.com/buk/image/upload/v1524495045/Cards/discover.png'
            ),
            4 => 
            array (
                'id' => 5,
                'payment_catalogue_id' => 1,
                'name' => 'Diners Club',
                'image_path' => 'http://res.cloudinary.com/buk/image/upload/v1524495046/Cards/dinners.png'
            ),
            5 => 
            array (
                'id' => 6,
                'payment_catalogue_id' => 1,
                'name' => 'Union Pay Credit Card',
                'image_path' => 'http://res.cloudinary.com/buk/image/upload/v1524495048/Cards/union.pay.png'
            ),
        ));
        
        
    }
}