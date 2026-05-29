<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiSanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loaisan')->insert([
            [
                'MaLoai' => 'bd',
                'TenLoai' => 'Bóng đá',
                'MoTa' => 'Sân bóng đá',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'MaLoai' => 'cl',
                'TenLoai' => 'Cầu lông',
                'MoTa' => 'Sân cầu lông',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'MaLoai' => 'pkb',
                'TenLoai' => 'Pickleball',
                'MoTa' => 'Sân pickleball',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
