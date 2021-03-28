<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AjaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	
    {
        DB::table('ajax')->insert([
        	['for' => 'genre',
			'value' => 'action'],
			
        	['for' => 'genre',
			'value' => 'romance'],
			
        	['for' => 'genre',
			'value' => 'school'],
			
        	['for' => 'genre',
			'value' => 'comedy'],
			
        	['for' => 'genre',
			'value' => 'drama'],
			
        	['for' => 'genre',
			'value' => 'fantasy'],
			
        	['for' => 'genre',
			'value' => 'adventure'],
			
        	['for' => 'genre',
			'value' => 'psychological'],
			
        	['for' => 'genre',
			'value' => 'sports'],
			
        	['for' => 'genre',
			'value' => 'slice of life'],
			
        	['for' => 'genre',
			'value' => 'mystery'],
			
        	['for' => 'genre',
			'value' => 'supernatural'],
			
        	['for' => 'genre',
			'value' => 'sci-fi'],
			
        	['for' => 'genre',
			'value' => 'music'],
			
        	['for' => 'genre',
			'value' => 'super power'],
			
        	['for' => 'genre',
			'value' => 'magic'],
			
        	['for' => 'genre',
			'value' => 'military'],
			
        	['for' => 'genre',
			'value' => 'parody'],
			
			['for' => 'genre',
        	'value' => 'demons'],
			
			['for' => 'genre',
        	'value' => 'gore'],
			
			['for' => 'genre',
			'value' => 'horror'],
			
			['for' => 'genre',
        	'value' => 'police'],
        ]);
    }
}
