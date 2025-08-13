<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'Fiction',
                'description' => 'Fiction is any creative work, chiefly any narrative work, portraying individuals, events, or places that are imaginary or in ways that are imaginary. Fictional portrayals are thus inconsistent with fact, history, or plausibility.',
                'created_at' => '2025-08-13 12:37:18',
                'updated_at' => '2025-08-13 12:57:12',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'Biography',
            'description' => 'A biography is a non-fiction text about someone\'s life. Biographies are true pieces of text, based on fact, so biographers (the people who write biographies) have to do a lot of research.',
                'created_at' => '2025-08-13 13:04:54',
                'updated_at' => '2025-08-13 13:06:57',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'Non-FIction',
            'description' => 'Non-fiction (or nonfiction) is any document or media content that attempts, in good faith, to convey information only about the real world, rather than being grounded in imagination.',
                'created_at' => '2025-08-13 13:11:06',
                'updated_at' => '2025-08-13 13:11:06',
            ),
        ));
        
        
    }
}