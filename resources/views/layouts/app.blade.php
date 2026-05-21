<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống đặt sân thể thao</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- CSS tùy chỉnh (Nếu có file style.css thì bỏ comment dòng dưới) -->
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
    
    <style>
        /* Custom Header Styles */
        .custom-navbar {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364) !important;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 0.8rem 0;
            transition: all 0.3s ease;
        }
        .navbar-brand {
            font-size: 1.5rem;
            letter-spacing: 0.5px;
        }
        .nav-btn {
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
        }
        .nav-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .btn-cart {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }
        .btn-cart:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        .btn-login {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.5);
        }
        .btn-register {
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            color: white !important;
            border: none;
        }

        /* Custom Footer Styles */
        .custom-footer {
            background: linear-gradient(to right, #141e30, #243b55);
            border-top: 5px solid #00c6ff;
        }
        .footer-title {
            font-weight: 800;
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem;
        }
        .footer-link {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer-link:hover {
            color: #00c6ff;
        }
        .footer-icon {
            width: 30px;
            text-align: center;
            margin-right: 10px;
            color: #00c6ff;
        }
        .map-wrapper {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            border: 2px solid rgba(255,255,255,0.1);
        }
    </style>
</head>
<body>

<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center">
                <a class="navbar-brand text-white fw-bold mb-0 d-flex align-items-center" href="{{ route('home') }}">
                    <span class="fs-3 me-2">⚽</span> <span style="background: linear-gradient(45deg, #00f2fe, #4facfe); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Hệ thống đặt sân thể thao</span>
                </a>
            </div>
            
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-2 mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-medium px-3" href="{{ route('home') }}">Trang Chủ</a>
                    </li>
                    
                    <!-- Xử lý menu dựa theo Auth của Laravel -->
                    @auth
                        <!-- Nút cho Admin/Owner -->
                        @if(Auth::user()->role === 'admin' || Auth::user()->role === 'owner')
                            <li class="nav-item">
                                <a class="btn btn-danger nav-btn ms-2 shadow-sm" href="#"> 
                                    <i class="fas fa-cog me-1"></i> Quản Trị 
                                </a>
                            </li>
                        @endif

                        <!-- Nút chung cho User đã đăng nhập -->
                        <li class="nav-item">
                            <a class="btn btn-light text-primary nav-btn ms-2 shadow-sm" href="{{ route('dashboard') }}">
                                <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->username ?? Auth::user()->name }}
                            </a>
                        </li>
                        
                        <!-- Nút Đăng Xuất (Laravel bắt buộc dùng Form POST để đăng xuất) -->
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light nav-btn ms-2">
                                    <i class="fas fa-sign-out-alt me-1"></i> Đăng Xuất
                                </button>
                            </form>
                        </li>
                    @else
                        <!-- Hiển thị khi CHƯA đăng nhập -->
                        <li class="nav-item">
                            <a class="btn btn-login nav-btn text-white ms-2" href="{{ route('login') }}">Đăng Nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-register nav-btn ms-2 shadow-sm" href="{{ route('register') }}">Đăng Ký</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>

<div id="wrapper">
    <main class="container mt-4 flex-fill">
        <!-- NỘI DUNG CỦA CÁC TRANG CON SẼ ĐƯỢC CHÈN VÀO ĐÂY -->
        @yield('content')
    </main>
</div> 

<footer class="custom-footer text-white pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row g-4 mb-4">
            <div class="col-lg-7">
                <h3 class="footer-title">Hệ Thống Đặt Sân Thể Thao</h3>
                <p class="mb-4 opacity-75" style="max-width: 500px;">
                    Nền tảng đặt sân thể thao hàng đầu, cung cấp trải nghiệm tốt nhất cho người yêu thể thao. Đặt sân dễ dàng, quản lý chuyên nghiệp.
                </p>

                <h5 class="fw-bold mb-3 text-white">Liên hệ với chúng tôi</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-3 d-flex align-items-center">
                        <i class="fas fa-map-marker-alt footer-icon fs-5"></i>
                        <span>180 Cao Lỗ, Phường 4, Quận 8, TP.HCM</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="fas fa-envelope footer-icon fs-5"></i>
                        <a href="mailto:vdpvinh24@gmail.com" class="footer-link">vdpvinh24@gmail.com</a>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="fas fa-phone-alt footer-icon fs-5"></i>
                        <a href="tel:0877399514" class="footer-link fw-bold text-warning">0877.399.514</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-5">
                <div class="map-wrapper" style="height: 250px;">
                    <iframe 
                        src="https://www.google.com/maps?q=180+Cao+Lỗ,+Quận+8&output=embed" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>

        <div class="text-center border-top border-secondary pt-4 mt-4">
            <p class="text-muted mb-0">&copy; 2026 SVD Pro - Soccer Field Management. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>