<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('authors')->delete();
        
        \DB::table('authors')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'Tere liye',
                'bio' => 'Darwis, better known as his pen name Tere Liye is an Indonesian writer and former accountant. Making his writing debut in 2005 through the novel Hafalan Sholat Delisa, he has published more than 40 books throughout his writing career.',
                'photo' => 'authors/STGAKWhtsXpWnxCOz0rjgTrhyPldOIj2r9OVRO3G.png',
                'created_at' => '2025-08-13 12:31:47',
                'updated_at' => '2025-08-13 12:42:54',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'Tan malaka',
                'bio' => 'Ibrahim Simabua Datuak Sutan Malaka, also known as Tan Malaka, was an Indonesian statesman, teacher, Marxist and philosopher who is the founder of Struggle Union and Murba Party. He is also known as the Indonesian fighter, national hero, independent guerrilla and spy.',
                'photo' => 'authors/FImSiaWKOFRrdvuDSKgQoQPy4Hlv4UafmVAdW6Ux.png',
                'created_at' => '2025-08-13 13:12:06',
                'updated_at' => '2025-08-13 13:12:06',
            ),
        ));
        
        
    }
}