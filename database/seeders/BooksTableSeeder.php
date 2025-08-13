<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('books')->delete();
        
        \DB::table('books')->insert(array (
            0 => 
            array (
                'id' => 4,
                'title' => 'Bumi',
                'description' => 'Raib, seorang gadis remaja, memiliki kemampuan untuk menghilang. Suatu hari, ia mengalami kejadian aneh yang membawanya ke dunia paralel, Klan Bulan. Di sana, ia bertemu Seli, yang memiliki kekuatan mengeluarkan petir, dan Ali, seorang jenius yang meramalkan dunia paralel. Bersama-sama, mereka mengungkap bahwa mereka memiliki takdir untuk menyelamatkan Bumi dari ancaman klan jahat yang dipimpin oleh Tamus.',
                'published_year' => '2014',
                'cover_image' => 'books/8TbcRB33I1UJnISPicYmrRTvf8ARGy4HA5bMX85p.jpg',
                'category_id' => 3,
                'author_id' => 5,
                'created_at' => '2025-08-13 12:39:55',
                'updated_at' => '2025-08-13 12:40:38',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'title' => 'Madilog',
                'description' => 'The Madilog by Iljas Hussein, first published in 1943, official first edition 1951, is the magnum opus of Tan Malaka, the Indonesian national hero and is the most influential work in the history of modern Indonesian philosophy. Madilog is an Indonesian acronym that stands for Materialisme Dialektika Logika.',
                'published_year' => '1943',
                'cover_image' => 'books/P7C3ffwpGXqi6QR85l4vwk1qPGSz69YFP40oVGya.png',
                'category_id' => 5,
                'author_id' => 6,
                'created_at' => '2025-08-13 13:13:32',
                'updated_at' => '2025-08-13 13:13:32',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}