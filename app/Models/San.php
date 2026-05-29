<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class San extends Model
{
    use HasFactory;

    // Tên bảng
    protected $table = 'san';

    // Khóa chính
    protected $primaryKey = 'MaSan';

    // Khóa chính không tự động tăng
    public $incrementing = false;

    // Kiểu dữ liệu của khóa chính
    protected $keyType = 'string';

    // Các trường được phép gán dữ liệu hàng loạt
    protected $fillable = [
        'MaSan',
        'TenSan',
        'GiaThue',
        'TinhTrang',
        'MoTa',
        'MaLoai'
    ];

    /**
     * Mối quan hệ: Một sân thuộc về một loại sân.
     */
    public function loaiSan(): BelongsTo
    {
        return $this->belongsTo(LoaiSan::class, 'MaLoai', 'MaLoai');
    }
}
