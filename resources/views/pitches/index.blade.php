@extends('layouts.app')

@section('content')
<style>
    .filter-btn {
        border-radius: 25px;
        padding: 8px 24px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    .filter-btn.active {
        background: linear-gradient(45deg, #00c6ff, #0072ff) !important;
        color: white !important;
        box-shadow: 0 4px 15px rgba(0, 198, 255, 0.3);
    }
    .filter-btn:not(.active) {
        background: white;
        color: #495057;
        border-color: #e9ecef;
    }
    .filter-btn:hover:not(.active) {
        border-color: #00c6ff;
        color: #00c6ff;
        transform: translateY(-2px);
    }

    .pitch-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }
    .pitch-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 45px rgba(0,0,0,0.12);
        border-color: rgba(0, 198, 255, 0.4);
    }
    
    .pitch-img-placeholder {
        height: 200px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 4rem;
        font-weight: bold;
    }
    .bg-pitch-bd {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }
    .bg-pitch-cl {
        background: linear-gradient(135deg, #f2994a 0%, #f2c94c 100%);
    }
    .bg-pitch-pkb {
        background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);
    }

    .status-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .status-active {
        background-color: #28a745;
        color: white;
    }
    .status-maintenance {
        background-color: #dc3545;
        color: white;
    }

    .pitch-type-tag {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        color: #0072ff;
        margin-bottom: 8px;
        display: inline-block;
    }

    .pitch-price {
        font-size: 1.35rem;
        font-weight: 800;
        color: #2c3e50;
    }
    .pitch-price span {
        font-size: 0.9rem;
        font-weight: 500;
        color: #6c757d;
    }

    .btn-details {
        border-radius: 12px;
        padding: 10px 24px;
        font-weight: 600;
        transition: all 0.3s ease;
        background: linear-gradient(45deg, #2c3e50, #3498db);
        color: white;
        border: none;
    }
    .btn-details:hover {
        background: linear-gradient(45deg, #1a252f, #2980b9);
        color: white;
        transform: scale(1.03);
    }
</style>

<div class="container py-4">
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="background: linear-gradient(45deg, #2c3e50, #3498db); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Danh Sách Sân Thể Thao</h1>
        <p class="text-muted">Chọn loại sân mong muốn và xem thông tin chi tiết</p>
    </div>

    <!-- Bộ lọc loại sân -->
    <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
        <a href="{{ route('pitches.index') }}" class="btn filter-btn {{ !$selectedType ? 'active' : '' }}">
            🌍 Tất cả
        </a>
        @foreach($pitchTypes as $type)
            <a href="{{ route('pitches.index', ['type' => $type->code]) }}" class="btn filter-btn {{ $selectedType === $type->code ? 'active' : '' }}">
                @if($type->code === 'bd')
                    ⚽ {{ $type->name }}
                @elseif($type->code === 'cl')
                    🏸 {{ $type->name }}
                @elseif($type->code === 'pkb')
                    🎾 {{ $type->name }}
                @else
                    🏆 {{ $type->name }}
                @endif
            </a>
        @endforeach
    </div>

    <!-- Grid danh sách sân -->
    @if($pitches->isEmpty())
        <div class="text-center py-5">
            <h4 class="text-muted">Hiện tại không có sân nào thuộc thể loại này.</h4>
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($pitches as $pitch)
                <div class="col">
                    <div class="card pitch-card h-100">
                        <!-- Hình ảnh minh họa dựa theo loại sân -->
                        <div class="pitch-img-placeholder bg-pitch-{{ $pitch->pitch_type_code }}">
                            @if($pitch->pitch_type_code === 'bd')
                                ⚽
                            @elseif($pitch->pitch_type_code === 'cl')
                                🏸
                            @elseif($pitch->pitch_type_code === 'pkb')
                                🎾
                            @else
                                🏆
                            @endif
                            
                            <!-- Badge Tình Trạng -->
                            <span class="status-badge {{ $pitch->status === 'Hoạt động' ? 'status-active' : 'status-maintenance' }}">
                                {{ $pitch->status }}
                            </span>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <span class="pitch-type-tag">
                                {{ $pitch->pitchType->name }}
                            </span>
                            <h4 class="card-title fw-bold text-dark mb-3">
                                {{ $pitch->name }}
                            </h4>
                            <p class="card-text text-muted mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $pitch->description ?: 'Không có mô tả chi tiết cho sân này.' }}
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto border-top pt-3">
                                <div class="pitch-price">
                                    {{ number_format($pitch->price, 0, ',', '.') }} <span>đ/giờ</span>
                                </div>
                                <a href="{{ route('pitches.show', $pitch->code) }}" class="btn btn-details">
                                    Chi tiết <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
