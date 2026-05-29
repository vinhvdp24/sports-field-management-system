@extends('layouts.app')

@section('content')
<style>
    .pitch-detail-card {
        border: none;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }
    
    .detail-img-panel {
        min-height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 8rem;
        position: relative;
    }
    .bg-detail-bd {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }
    .bg-detail-cl {
        background: linear-gradient(135deg, #f2994a 0%, #f2c94c 100%);
    }
    .bg-detail-pkb {
        background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);
    }

    .detail-status-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        padding: 8px 20px;
        border-radius: 25px;
        font-size: 0.9rem;
        font-weight: 700;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .info-price {
        font-size: 2.2rem;
        font-weight: 800;
        color: #2c5364;
    }
    .info-price span {
        font-size: 1.1rem;
        font-weight: 500;
        color: #6c757d;
    }

    .btn-booking {
        border-radius: 15px;
        padding: 14px 30px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        background: linear-gradient(45deg, #00c6ff, #0072ff);
        color: white;
        border: none;
        box-shadow: 0 5px 15px rgba(0, 198, 255, 0.3);
    }
    .btn-booking:hover {
        background: linear-gradient(45deg, #00b4e5, #005ecb);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 198, 255, 0.4);
    }
    .btn-booking:disabled {
        background: #ced4da;
        box-shadow: none;
        cursor: not-allowed;
    }

    .btn-back {
        border-radius: 12px;
        padding: 8px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-back:hover {
        transform: translateX(-5px);
    }
</style>

<div class="container py-4">
    <!-- Nút Quay Lại -->
    <div class="mb-4">
        <a href="{{ route('pitches.index') }}" class="btn btn-outline-secondary btn-back">
            <i class="fas fa-chevron-left me-2"></i> Quay lại danh sách
        </a>
    </div>

    <div class="card pitch-detail-card">
        <div class="row g-0">
            <!-- Cột Trái: Visual Panel -->
            <div class="col-lg-5">
                <div class="detail-img-panel bg-detail-{{ $pitch->pitch_type_code }} h-100">
                    @if($pitch->pitch_type_code === 'bd')
                        ⚽
                    @elseif($pitch->pitch_type_code === 'cl')
                        🏸
                    @elseif($pitch->pitch_type_code === 'pkb')
                        🎾
                    @else
                        🏆
                    @endif
                    
                    <span class="detail-status-badge {{ $pitch->status === 'Hoạt động' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                        <i class="fas {{ $pitch->status === 'Hoạt động' ? 'fa-check-circle' : 'fa-tools' }} me-1"></i> {{ $pitch->status }}
                    </span>
                </div>
            </div>

            <!-- Cột Phải: Nội dung chi tiết -->
            <div class="col-lg-7 p-4 p-md-5 d-flex flex-column justify-content-between">
                <div>
                    <span class="badge bg-primary text-uppercase px-3 py-2 mb-3" style="font-size: 0.8rem; letter-spacing: 1px; border-radius: 10px;">
                        {{ $pitch->pitchType->name }}
                    </span>
                    
                    <h1 class="fw-extrabold text-dark mb-3">{{ $pitch->name }}</h1>
                    
                    <div class="info-price mb-4">
                        {{ number_format($pitch->price, 0, ',', '.') }} <span>VND / giờ</span>
                    </div>

                    <h5 class="fw-bold text-secondary mb-3">Mô tả chi tiết sân</h5>
                    <p class="text-muted fs-5 lh-base mb-4" style="text-align: justify;">
                        {{ $pitch->description ?: 'Hiện tại sân này chưa được cập nhật mô tả chi tiết từ quản trị viên. Vui lòng liên hệ trực tiếp số hotline để biết thêm chi tiết.' }}
                    </p>

                    <!-- Một số thông tin nổi bật tiện ích -->
                    <div class="row g-3 mb-4">
                        <div class="col-6 col-md-4 d-flex align-items-center gap-2">
                            <span class="fs-4 text-success"><i class="fas fa-lightbulb"></i></span>
                            <span class="text-secondary fw-semibold">Đèn LED chiếu sáng</span>
                        </div>
                        <div class="col-6 col-md-4 d-flex align-items-center gap-2">
                            <span class="fs-4 text-primary"><i class="fas fa-tint"></i></span>
                            <span class="text-secondary fw-semibold">Nước uống miễn phí</span>
                        </div>
                        <div class="col-6 col-md-4 d-flex align-items-center gap-2">
                            <span class="fs-4 text-warning"><i class="fas fa-parking"></i></span>
                            <span class="text-secondary fw-semibold">Bãi giữ xe rộng rãi</span>
                        </div>
                    </div>
                </div>

                <!-- Action Panel -->
                <div class="border-top pt-4 mt-3">
                    @if($pitch->status === 'Hoạt động')
                        @auth
                            <!-- Đã đăng nhập: Nút đặt sân -->
                            <button class="btn btn-booking w-100" onclick="bookingAlert()">
                                <i class="fas fa-calendar-check me-2"></i> Đặt Sân Ngay
                            </button>
                        @else
                            <!-- Chưa đăng nhập: Redirect đăng nhập -->
                            <a href="{{ route('login') }}" class="btn btn-booking w-100 text-center">
                                <i class="fas fa-sign-in-alt me-2"></i> Đăng Nhập Để Đặt Sân
                            </a>
                        @endauth
                    @else
                        <!-- Đang bảo trì -->
                        <button class="btn btn-booking w-100" disabled>
                            <i class="fas fa-ban me-2"></i> Sân Đang Bảo Trì
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function bookingAlert() {
        alert("Tính năng Đặt Sân đang được phát triển ở module tiếp theo. Vui lòng thử lại sau!");
    }
</script>
@endsection
