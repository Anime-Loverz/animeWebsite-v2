<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animes')->insert([
        	['title' => 'Code Geass',
        	'genre' => 'action',
            'motivasi' => 'politik kren tman',
            'status' => 1,
            'user_id' => 1],
            // 'email' => 'admin@admin.com'],
        	['title' => 'majou no tabi tabi',
        	'genre' => 'adventure',
            'motivasi' => 'ngaprak kren tman',
            'status' => 1,
            'user_id' => 1],
            // 'email' => 'admin@admin.com'],
        	['title' => 'k-on',
        	'genre' => 'music',
            'motivasi' => 'ngegitar kren tman',
            'status' => 1,
            'user_id' => 1],
            // 'email' => 'admin@admin.com'],
        	['title' => 'Death Note',
        	'genre' => 'psychological',
            'motivasi' => 'jadi dewa kren tman',
            'status' => 1,
            'user_id' => 1],
            // 'email' => 'admin@admin.com'],
        	['title' => 'dr stone',
        	'genre' => 'sci-fi',
            'motivasi' => 'jadi batu kren tman',
            'status' => 1,
            'user_id' => 1],
            // 'email' => 'user@user.com'],
        	['title' => 'nisekoi',
        	'genre' => 'romance',
            'motivasi' => 'punya kanojo enak tman',
            'status' => 1,
            'user_id' => 2],
            // 'email' => 'user@user.com'],
        	['title' => 'Charlotte',
        	'genre' => 'drama',
            'motivasi' => 'punya kekuatan op kren tman',
            'status' => 1,
            'user_id' => 2],
            // 'email' => 'user@user.com'],
        	['title' => 'fullmetal alchemist',
        	'genre' => 'action',
            'motivasi' => 'ngebohong kren tman',
            'status' => 1,
            'user_id' => 2],
            // 'email' => 'user@user.com'],
        	['title' => 'saiki kusuo',
        	'genre' => 'comedy',
            'motivasi' => 'jadi op + lawak kren tman',
            'status' => 1,
            'user_id' => 2],
            // 'email' => 'admin@admin.com'],
        ]);
    }
}
