<?php

use Illuminate\Database\Seeder;

class LangCatalogueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lang_catalogue')->delete();
        
        \DB::table('lang_catalogue')->insert(array (
            0 => 
            array (
                'id' => 1,
                'lang_description' => 'Spanish or Castilian',
                'iso_codelang' => 'es',
            ),
            1 => 
            array (
                'id' => 2,
                'lang_description' => 'Italian',
                'iso_codelang' => 'it',
            ),
            2 => 
            array (
                'id' => 3,
                'lang_description' => 'Japanese',
                'iso_codelang' => 'ja',
            ),
            3 => 
            array (
                'id' => 4,
                'lang_description' => 'English',
                'iso_codelang' => 'en',
            ),
            4 => 
            array (
                'id' => 5,
                'lang_description' => 'French',
                'iso_codelang' => 'fr',
            ),
            5 => 
            array (
                'id' => 6,
                'lang_description' => 'German',
                'iso_codelang' => 'de',
            ),
            6 => 
            array (
                'id' => 7,
                'lang_description' => 'Portuguese',
                'iso_codelang' => 'pt',
            ),
            7 => 
            array (
                'id' => 8,
                'lang_description' => 'Chinese',
                'iso_codelang' => 'zh',
            ),
        ));
        
        
    }
}