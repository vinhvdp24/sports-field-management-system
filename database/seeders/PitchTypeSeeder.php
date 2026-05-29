<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PitchTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pitch_types')->insert([
            [
                'code' => 'bd',
                'name' => 'Bóng đá',
                'description' => 'Sân bóng đá',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'cl',
                'name' => 'Cầu lông',
                'description' => 'Sân cầu lông',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'pkb',
                'name' => 'Pickleball',
                'description' => 'Sân pickleball',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
