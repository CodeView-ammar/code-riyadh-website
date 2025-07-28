<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $settings->get('seo_title')->value ?? 'كود الرياض - شركة تطوير البرمجيات')</title>
    <meta name="description" content="@yield('meta_description', $settings->get('seo_description')->value ?? 'شركة كود الرياض متخصصة في تطوير المواقع والتطبيقات والأنظمة المتكاملة')">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts - Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: right;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #007bff !important;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
        }
        
        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .hero-section .lead {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            color: #2c3e50;
        }
        
        .service-card {
            transition: transform 0.3s ease;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .service-card:hover {
            transform: translateY(-5px);
        }
        
        .portfolio-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }
        
        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,123,255,0.9);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .portfolio-item:hover .portfolio-overlay {
            opacity: 1;
        }
        
        .whatsapp-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: #25d366;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            z-index: 1000;
            transition: transform 0.3s ease;
        }
        
        .whatsapp-btn:hover {
            transform: scale(1.1);
            color: white;
        }
        
        .client-logo {
            filter: grayscale(100%);
            transition: filter 0.3s ease;
        }
        
        .client-logo:hover {
            filter: grayscale(0%);
        }
        
        footer {
            background: #2c3e50;
            color: white;
        }
        
        .blog-card {
            transition: transform 0.3s ease;
        }
        
        .blog-card:hover {
            transform: translateY(-5px);
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-code"></i> {{ $settings->get('site_name')->value ?? 'كود الرياض' }}
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services.index') }}">خدماتنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio.index') }}">أعمالنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.index') }}">المدونة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">تواصل معنا</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- WhatsApp Button -->
    @if($settings->get('contact_whatsapp'))
    <a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', $settings->get('contact_whatsapp')->value) }}" target="_blank" class="whatsapp-btn">
        <i class="fab fa-whatsapp fa-2x"></i>
    </a>
    @endif

    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5><i class="fas fa-code"></i> {{ $settings->get('site_name')->value ?? 'كود الرياض' }}</h5>
                    <p class="text-white-50">
                        {{ $settings->get('site_description')->value ?? 'شركة متخصصة في تطوير المواقع والتطبيقات والأنظمة المتكاملة. نحن نحول أفكارك إلى حلول تقنية مبتكرة.' }}
                    </p>
                </div>
                <div class="col-lg-2 mb-4">
                    <h6>روابط سريعة</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white-50">الرئيسية</a></li>
                        <li><a href="{{ route('about') }}" class="text-white-50">من نحن</a></li>
                        <li><a href="{{ route('services.index') }}" class="text-white-50">خدماتنا</a></li>
                        <li><a href="{{ route('portfolio.index') }}" class="text-white-50">أعمالنا</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-4">
                    <h6>الخدمات</h6>
                    <ul class="list-unstyled">
                        <li><span class="text-white-50">تطوير المواقع</span></li>
                        <li><span class="text-white-50">تطبيقات الجوال</span></li>
                        <li><span class="text-white-50">الأنظمة المتكاملة</span></li>
                        <li><span class="text-white-50">التسويق الرقمي</span></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h6>تواصل معنا</h6>
                    <div class="text-white-50">
                        <p><i class="fas fa-map-marker-alt me-2"></i> {{ $settings->get('contact_address')->value ?? 'الرياض، المملكة العربية السعودية' }}</p>
                        <p><i class="fas fa-phone me-2"></i> {{ $settings->get('contact_phone')->value ?? '+966501234567' }}</p>
                        <p><i class="fas fa-envelope me-2"></i> {{ $settings->get('contact_email')->value ?? 'info@coderiyadh.com' }}</p>
                    </div>
                    <div class="mt-3">
                        @if($settings->get('social_twitter'))
                        <a href="{{ $settings->get('social_twitter')->value }}" class="text-white-50 me-3" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
                        @endif
                        @if($settings->get('social_linkedin'))
                        <a href="{{ $settings->get('social_linkedin')->value }}" class="text-white-50 me-3" target="_blank"><i class="fab fa-linkedin-in fa-lg"></i></a>
                        @endif
                        @if($settings->get('social_instagram'))
                        <a href="{{ $settings->get('social_instagram')->value }}" class="text-white-50 me-3" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
                        @endif
                        @if($settings->get('social_github'))
                        <a href="{{ $settings->get('social_github')->value }}" class="text-white-50" target="_blank"><i class="fab fa-github fa-lg"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-white">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-white-50 mb-0">&copy; 2025 {{ $settings->get('site_name')->value ?? 'كود الرياض' }}. جميع الحقوق محفوظة.</p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="text-white-50 mb-0">صُنع بـ <i class="fas fa-heart text-danger"></i> في الرياض</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>