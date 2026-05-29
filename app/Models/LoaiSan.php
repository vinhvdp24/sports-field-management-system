<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LoaiSan extends Model
{
    use HasFactory;

    // Tên bảng
    protected $table = 'loaisan';

    // Khóa chính
    protected $primaryKey = 'MaLoai';

    // Khóa chính không tự động tăng
    public $incrementing = false;

    // Kiểu dữ liệu của khóa chính
    protected $keyType = 'string';

    // Các trường được phép gán dữ liệu hàng loạt
    protected $fillable = [
        'MaLoai',
        'TenLoai',
        'MoTa'
    ];

    /**
     * Mối quan hệ: Một loại sân có nhiều sân.
     */
    public function sans(): HasMany
    {
        return $this->hasMany(San::class, 'MaLoai', 'MaLoai');
    }
}
