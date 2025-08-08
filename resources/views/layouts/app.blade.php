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
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --success-color: #059669;
            --danger-color: #dc2626;
            --warning-color: #d97706;
            --info-color: #0891b2;
            --light-color: #f8fafc;
            --dark-color: #1e293b;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-success: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        body {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: right;
            line-height: 1.7;
            color: var(--dark-color);
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.98) !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.75rem;
            color: var(--primary-color) !important;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .nav-link {
            font-weight: 500;
            color: var(--dark-color) !important;
            position: relative;
            transition: all 0.3s ease;
            margin: 0 10px;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            right: 50%;
            background: var(--primary-color);
            transition: all 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
            right: 0;
        }

        .hero-section {
            background: var(--gradient-primary);
            color: white;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="0,0 1000,0 1000,100 0,80"/></svg>');
            background-size: cover;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .hero-section .lead {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            font-weight: 400;
            line-height: 1.8;
        }

        .btn {
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: var(--primary-color);
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.6);
        }

        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.6);
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 4rem;
            color: var(--dark-color);
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.2rem;
            color: var(--secondary-color);
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .service-card {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 5px 30px rgba(0,0,0,0.08);
            border-radius: 20px;
            overflow: hidden;
            background: white;
            position: relative;
            height: 100%;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-card .card-body {
            padding: 2.5rem 2rem;
        }

        .service-card .card-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        .service-card .service-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
        }

        .portfolio-item {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            background: white;
        }

        .portfolio-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.2);
        }

        .portfolio-item img {
            transition: transform 0.5s ease;
        }

        .portfolio-item:hover img {
            transform: scale(1.1);
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.95), rgba(168, 85, 247, 0.95));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.4s ease;
            backdrop-filter: blur(5px);
        }

        .portfolio-item:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-content {
            text-align: center;
            transform: translateY(30px);
            transition: transform 0.4s ease;
        }

        .portfolio-item:hover .portfolio-content {
            transform: translateY(0);
        }

        .features-section {
            background: var(--light-color);
            position: relative;
        }

        .feature-icon {
            width: 100px;
            height: 100px;
            background: var(--gradient-success);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2.5rem;
            box-shadow: 0 10px 30px rgba(79, 172, 254, 0.3);
        }

        .stats-section {
            background: var(--dark-color);
            color: white;
        }

        .stat-item {
            text-align: center;
            padding: 2rem 1rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: var(--primary-color);
            display: block;
        }

        .stat-label {
            font-size: 1.1rem;
            color: #94a3b8;
            margin-top: 0.5rem;
        }

        .whatsapp-btn {
            position: fixed;
            bottom: 30px;
            left: 30px;
            background: #25d366;
            color: white;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 8px 30px rgba(37, 211, 102, 0.4);
            z-index: 1000;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }

        .whatsapp-btn:hover {
            transform: scale(1.15);
            color: white;
            box-shadow: 0 12px 40px rgba(37, 211, 102, 0.6);
        }

        @keyframes pulse {
            0% { box-shadow: 0 8px 30px rgba(37, 211, 102, 0.4); }
            50% { box-shadow: 0 8px 30px rgba(37, 211, 102, 0.8); }
            100% { box-shadow: 0 8px 30px rgba(37, 211, 102, 0.4); }
        }

        .client-logo {
            filter: grayscale(100%);
            transition: all 0.3s ease;
            opacity: 0.7;
        }

        .client-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.1);
        }

        footer {
            background: var(--dark-color);
            color: white;
            position: relative;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--gradient-primary);
        }

        footer h5, footer h6 {
            color: white;
            font-weight: 700;
        }

        footer .social-links a {
            display: inline-block;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 45px;
            margin-left: 10px;
            transition: all 0.3s ease;
        }

        footer .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }

        .blog-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 30px rgba(0,0,0,0.08);
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }

        .price-badge {
            background: var(--gradient-primary);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
        }

        .testimonial-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            text-align: center;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .testimonial-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            object-fit: cover;
            border: 4px solid var(--light-color);
        }

        .rating {
            color: #fbbf24;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2.2rem;
            }

            .navbar-brand {
                font-size: 1.4rem;
            }

            .service-card .card-body {
                padding: 2rem 1.5rem;
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .animate-slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Modern Footer Styles */
        .modern-footer {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            position: relative;
            overflow: hidden;
        }

        .modern-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="20" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .footer-bg {
            position: relative;
            z-index: 1;
        }

        .footer-brand .brand-name {
            color: #ffffff;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .footer-brand .brand-description {
            color: #a0aec0;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .social-section .social-title {
            color: #ffffff;
            font-weight: 600;
            font-size: 1rem;
        }

        .social-links {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .social-link {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 0.85rem;
            backdrop-filter: blur(10px);
        }

        .social-link:hover {
            background: var(--primary-color);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .social-link i {
            margin-left: 6px;
            font-size: 1rem;
        }

        .social-link.twitter:hover { background: #1da1f2; }
        .social-link.linkedin:hover { background: #0077b5; }
        .social-link.github:hover { background: #333; }
        .social-link.whatsapp:hover { background: #25d366; }

        .footer-section .section-title {
            color: #ffffff;
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .footer-section .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            right: 0;
            width: 40px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 8px;
        }

        .footer-links a {
            color: #a0aec0;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--primary-color);
            transform: translateX(-5px);
        }

        .contact-info {
            margin-top: 1rem;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.2rem;
            padding: 12px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(-3px);
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 12px;
            flex-shrink: 0;
        }

        .contact-icon i {
            color: #ffffff;
            font-size: 0.9rem;
        }

        .contact-details strong {
            color: #ffffff;
            display: block;
            font-weight: 600;
            margin-bottom: 4px;
            font-size: 0.9rem;
        }

        .contact-details span {
            color: #a0aec0;
            font-size: 0.85rem;
            line-height: 1.4;
        }

        .newsletter-section {
            background: rgba(255, 255, 255, 0.05);
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .newsletter-title {
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .newsletter-description {
            color: #a0aec0;
            font-size: 0.85rem;
            margin-bottom: 1rem;
        }

        .newsletter-form .input-group {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .newsletter-form .form-control {
            background: transparent;
            border: none;
            color: #ffffff;
            padding: 12px 15px;
            font-size: 0.9rem;
        }

        .newsletter-form .form-control::placeholder {
            color: #a0aec0;
        }

        .newsletter-form .form-control:focus {
            background: transparent;
            color: #ffffff;
            box-shadow: none;
            border: none;
        }

        .newsletter-form .btn {
            border: none;
            padding: 12px 20px;
            background: var(--primary-color);
        }

        .newsletter-form .btn:hover {
            background: var(--secondary-color);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem 0 1rem;
            margin-top: 2rem;
        }

        .copyright p {
            color: #a0aec0;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .copyright .company-reg {
            color: #718096;
            font-size: 0.8rem;
        }

        .footer-legal {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .footer-legal a {
            color: #a0aec0;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer-legal a:hover {
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .social-links {
                justify-content: center;
            }

            .footer-legal {
                justify-content: center;
                margin-top: 1rem;
            }

            .contact-item {
                flex-direction: column;
                text-align: center;
            }

            .contact-icon {
                margin: 0 auto 8px auto;
            }
        }
    </style>

    @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                @if ($settings->get('site_logo') && $settings->get('site_logo')->value)
                    <img src="{{ asset('storage/' . $settings->get('site_logo')->value) }}" alt="{{ $settings->get('site_name')->value ?? 'كود الرياض' }}" height="50">
                @else
                    <i class="fas fa-code"></i> {{ $settings->get('site_name')->value ?? 'كود الرياض' }}
                @endif
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
    <footer class="modern-footer">
        <div class="footer-bg">
            <div class="container">
                <!-- Main Footer Content -->
                <div class="row py-5">
                    <!-- Company Info -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="footer-brand">
                            <h3 class="brand-name mb-3">
                                <i class="fas fa-code text-primary me-2"></i>
                                {{ $settings->get('site_name')->value ?? 'كود الرياض' }}
                            </h3>
                            <p class="brand-description">
                                {{ $settings->get('site_description')->value ?? 'نحن شركة رائدة في تطوير الحلول التقنية والرقمية في المملكة العربية السعودية. نقدم خدمات متكاملة في تطوير المواقع والتطبيقات والأنظمة الذكية التي تساعد الشركات على النمو والازدهار في العصر الرقمي.' }}
                            </p>

                            <!-- Social Media -->
                            <div class="social-section mt-4">
                                <h6 class="social-title mb-3">تابعنا على</h6>
                                <div class="social-links">
                                    <a href="https://twitter.com/coderiyadh" target="_blank" class="social-link twitter">
                                        <i class="fab fa-twitter"></i>
                                        <span>Twitter</span>
                                    </a>
                                    <a href="https://linkedin.com/company/coderiyadh" target="_blank" class="social-link linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                        <span>LinkedIn</span>
                                    </a>
                                    <a href="https://github.com/coderiyadh" target="_blank" class="social-link github">
                                        <i class="fab fa-github"></i>
                                        <span>GitHub</span>
                                    </a>
                                    <a href="https://wa.me/966501234567" target="_blank" class="social-link whatsapp">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5 class="section-title">خدماتنا</h5>
                            <ul class="footer-links">
                                <li><a href="{{ route('services.index') }}#web-development">تطوير المواقع الإلكترونية</a></li>
                                <li><a href="{{ route('services.index') }}#mobile-apps">تطبيقات الجوال</a></li>
                                <li><a href="{{ route('services.index') }}#integrated-systems">الأنظمة المتكاملة</a></li>
                                <li><a href="{{ route('services.index') }}#ui-ux">تصميم واجهات المستخدم</a></li>
                                <li><a href="{{ route('services.index') }}#consulting">الاستشارات التقنية</a></li>
                                <li><a href="{{ route('services.index') }}#maintenance">الصيانة والدعم</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Company Links -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5 class="section-title">الشركة</h5>
                            <ul class="footer-links">
                                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                                <li><a href="{{ route('about') }}">من نحن</a></li>
                                <li><a href="{{ route('portfolio.index') }}">أعمالنا</a></li>
                                <li><a href="{{ route('blog.index') }}">المدونة</a></li>
                                <li><a href="{{ route('contact') }}">تواصل معنا</a></li>
                                <li><a href="/careers">الوظائف</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5 class="section-title">معلومات التواصل</h5>

                            <div class="contact-info">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="contact-details">
                                        <strong>العنوان:</strong>
                                        <span>برج الرياض للأعمال، الطابق 15<br>
                                        حي الملك فهد، الرياض 12271<br>
                                        المملكة العربية السعودية</span>
                                    </div>
                                </div>

                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="contact-details">
                                        <strong>الهاتف:</strong>
                                        <span>{{ $settings->get('contact_phone')->value ?? '+966 11 456 7890' }}</span>
                                    </div>
                                </div>

                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <div class="contact-details">
                                        <strong>الجوال:</strong>
                                        <span>+966 50 123 4567</span>
                                    </div>
                                </div>

                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="contact-details">
                                        <strong>البريد الإلكتروني:</strong>
                                        <span>{{ $settings->get('contact_email')->value ?? 'info@coderiyadh.com' }}</span>
                                    </div>
                                </div>

                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="contact-details">
                                        <strong>ساعات العمل:</strong>
                                        <span>الأحد - الخميس: 9:00 ص - 6:00 م<br>
                                        الجمعة - السبت: مغلق</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Newsletter -->
                            <div class="newsletter-section mt-4">
                                <h6 class="newsletter-title">اشترك في نشرتنا الإخبارية</h6>
                                <p class="newsletter-description">احصل على آخر الأخبار والعروض الخاصة</p>
                                <form class="newsletter-form">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="بريدك الإلكتروني" required>
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="footer-bottom">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright">
                                <p>&copy; 2025 {{ $settings->get('site_name')->value ?? 'كود الرياض' }}. جميع الحقوق محفوظة.</p>
                                <p class="company-reg">سجل تجاري رقم: 1010123456 | رقم ضريبي: 300123456789003</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-legal">
                                <a href="/privacy-policy">سياسة الخصوصية</a>
                                <a href="/terms-conditions">الشروط والأحكام</a>
                                <a href="/refund-policy">سياسة الاسترداد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Navbar scroll effect -->
    <script>
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Newsletter form submission
    document.addEventListener('DOMContentLoaded', function() {
        const newsletterForm = document.querySelector('.newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const email = this.querySelector('input[type="email"]').value;
                if (email) {
                    // Show success message
                    const button = this.querySelector('button');
                    const originalContent = button.innerHTML;

                    button.innerHTML = '<i class="fas fa-check"></i>';
                    button.style.background = '#10b981';

                    // Show confirmation message
                    const confirmation = document.createElement('div');
                    confirmation.style.cssText = `
                        position: fixed;
                        top: 20px;
                        right: 20px;
                        background: #10b981;
                        color: white;
                        padding: 15px 20px;
                        border-radius: 8px;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                        z-index: 9999;
                        font-size: 14px;
                    `;
                    confirmation.textContent = 'تم الاشتراك بنجاح في النشرة الإخبارية!';
                    document.body.appendChild(confirmation);

                    // Reset form after 2 seconds
                    setTimeout(() => {
                        button.innerHTML = originalContent;
                        button.style.background = '';
                        this.reset();
                        document.body.removeChild(confirmation);
                    }, 2000);
                }
            });
        }

        // Add smooth hover effects to footer links
        const footerLinks = document.querySelectorAll('.footer-links a');
        footerLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.paddingRight = '10px';
            });

            link.addEventListener('mouseleave', function() {
                this.style.paddingRight = '0';
            });
        });

        // Add click to copy functionality for contact info
        const contactDetails = document.querySelectorAll('.contact-details span');
        contactDetails.forEach(detail => {
            detail.style.cursor = 'pointer';
            detail.title = 'اضغط للنسخ';

            detail.addEventListener('click', function() {
                const text = this.textContent.trim();
                navigator.clipboard.writeText(text).then(() => {
                    // Show copied message
                    const originalText = this.textContent;
                    this.textContent = 'تم النسخ!';
                    this.style.color = '#10b981';

                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.color = '';
                    }, 1000);
                });
            });
        });
    });
    </script>

    @yield('scripts')

    <!-- Service Details Modals -->
    @include('partials.service-modals')
</body>
</html>