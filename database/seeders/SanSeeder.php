<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('san')->insert([
            [
                'MaSan' => 'SB1',
                'TenSan' => 'Sân bóng A1',
                'GiaThue' => 350000.00,
                'TinhTrang' => 'Hoạt động',
                'MoTa' => 'Sân 5 ngoài cùng, gần cổng, cỏ nhân tạo sợi kim cương 50-60mm, chất lượng cao.',
                'MaLoai' => 'bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'MaSan' => 'SB2',
                'TenSan' => 'Sân bóng A2',
                'GiaThue' => 200000.00,
                'TinhTrang' => 'Hoạt động',
                'MoTa' => 'Sân 5 tiêu chuẩn (giữa), cỏ nhân tạo 45-50mm, sợi thẳng',
                'MaLoai' => 'bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'MaSan' => 'SB3',
                'TenSan' => 'Sân bóng A3',
                'GiaThue' => 150000.00,
                'TinhTrang' => 'Hoạt động',
                'MoTa' => 'Sân 5 trong, cỏ nhân tạo 35-40mm phổ thông.',
                'MaLoai' => 'bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'MaSan' => 'SB4',
                'TenSan' => 'Sân bóng B1',
                'GiaThue' => 250000.00,
                'TinhTrang' => 'Bảo trì',
                'MoTa' => 'Đang được nâng cấp mặt cỏ',
                'MaLoai' => 'bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'MaSan' => 'SB5',
                'TenSan' => 'Sân bóng B2',
                'GiaThue' => 700000.00,
                'TinhTrang' => 'Hoạt động',
                'MoTa' => 'Sân 7, cỏ nhân tạo sợi kim cương 50-60mm, mặt sân êm.',
                'MaLoai' => 'bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'MaSan' => 'SB6',
                'TenSan' => 'Sân bóng C2',
                'GiaThue' => 1500000.00,
                'TinhTrang' => 'Hoạt động',
                'MoTa' => 'Sân 11, cỏ 55–60mm cao cấp, độ nảy chuẩn.',
                'MaLoai' => 'bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'MaSan' => 'SCL1',
                'TenSan' => 'Sân cầu lông 1',
                'GiaThue' => 80000.00,
                'TinhTrang' => 'Hoạt động',
                'MoTa' => 'Sân trong nhà, mặt thảm chuẩn',
                'MaLoai' => 'cl',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'MaSan' => 'SCL2',
                'TenSan' => 'Sân cầu lông 2',
                'GiaThue' => 80000.00,
                'TinhTrang' => 'Hoạt động',
                'MoTa' => 'Có đèn chiếu sáng LED',
                'MaLoai' => 'cl',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'MaSan' => 'SPKB1',
                'TenSan' => 'Sân Pickleball 1',
                'GiaThue' => 120000.00,
                'TinhTrang' => 'Hoạt động',
                'MoTa' => 'Sân ngoài trời tiêu chuẩn',
                'MaLoai' => 'pkb',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
