<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PitchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pitches')->insert([
            [
                'code' => 'SB1',
                'name' => 'Sân bóng A1',
                'price' => 350000.00,
                'status' => 'Hoạt động',
                'description' => 'Sân 5 ngoài cùng, gần cổng, cỏ nhân tạo sợi kim cương 50-60mm, chất lượng cao.',
                'pitch_type_code' => 'bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SB2',
                'name' => 'Sân bóng A2',
                'price' => 200000.00,
                'status' => 'Hoạt động',
                'description' => 'Sân 5 tiêu chuẩn (giữa), cỏ nhân tạo 45-50mm, sợi thẳng',
                'pitch_type_code' => 'bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SB3',
                'name' => 'Sân bóng A3',
                'price' => 150000.00,
                'status' => 'Hoạt động',
                'description' => 'Sân 5 trong, cỏ nhân tạo 35-40mm phổ thông.',
                'pitch_type_code' => 'bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SB4',
                'name' => 'Sân bóng B1',
                'price' => 250000.00,
                'status' => 'Bảo trì',
                'description' => 'Đang được nâng cấp mặt cỏ',
                'pitch_type_code' => 'bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SB5',
                'name' => 'Sân bóng B2',
                'price' => 700000.00,
                'status' => 'Hoạt động',
                'description' => 'Sân 7, cỏ nhân tạo sợi kim cương 50-60mm, mặt sân êm.',
                'pitch_type_code' => 'bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SB6',
                'name' => 'Sân bóng C2',
                'price' => 1500000.00,
                'status' => 'Hoạt động',
                'description' => 'Sân 11, cỏ 55–60mm cao cấp, độ nảy chuẩn.',
                'pitch_type_code' => 'bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SCL1',
                'name' => 'Sân cầu lông 1',
                'price' => 80000.00,
                'status' => 'Hoạt động',
                'description' => 'Sân trong nhà, mặt thảm chuẩn',
                'pitch_type_code' => 'cl',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SCL2',
                'name' => 'Sân cầu lông 2',
                'price' => 80000.00,
                'status' => 'Hoạt động',
                'description' => 'Có đèn chiếu sáng LED',
                'pitch_type_code' => 'cl',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SPKB1',
                'name' => 'Sân Pickleball 1',
                'price' => 120000.00,
                'status' => 'Hoạt động',
                'description' => 'Sân ngoài trời tiêu chuẩn',
                'pitch_type_code' => 'pkb',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
