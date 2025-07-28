@extends('layouts.app')

@section('title', 'كود الرياض - شركة تطوير البرمجيات والمواقع والتطبيقات')
@section('meta_description', 'شركة كود الرياض الرائدة في تطوير المواقع والتطبيقات والأنظمة المتكاملة في السعودية. نحول أفكارك إلى حلول تقنية مبتكرة.')

@section('content')
<div style="margin-top: 76px;">
    <!-- Hero Banners Section -->
    @if($banners->count())
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($banners as $index => $banner)
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" 
                    class="{{ $index === 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>
        
        <div class="carousel-inner">
            @foreach($banners as $index => $banner)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="hero-section" @if($banner->image) style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('storage/' . $banner->image) }}'); background-size: cover; background-position: center;" @endif>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <h1 class="display-4 fw-bold">{{ $banner->title }}</h1>
                                @if($banner->description)
                                <p class="lead">{{ $banner->description }}</p>
                                @endif
                                @if($banner->button_text && $banner->button_link)
                                <a href="{{ $banner->button_link }}" class="btn btn-primary btn-lg">{{ $banner->button_text }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    @else
    <!-- Default Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold">مرحباً بك في كود الرياض</h1>
                    <p class="lead">شريكك المثالي في تطوير المواقع والتطبيقات والأنظمة المتكاملة</p>
                    <p class="mb-4">نحن فريق من المطورين المحترفين نساعدك في تحويل أفكارك إلى حلول تقنية مبتكرة تخدم عملك وتحقق أهدافك.</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">ابدأ مشروعك</a>
                    <a href="{{ route('portfolio.index') }}" class="btn btn-outline-light btn-lg">اطلع على أعمالنا</a>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="fas fa-laptop-code" style="font-size: 15rem; opacity: 0.7;"></i>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Services Section -->
    @if($services->count())
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">خدماتنا</h2>
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card service-card h-100">
                        @if($service->featured_image)
                        <img src="{{ asset('storage/' . $service->featured_image) }}" class="card-img-top" alt="{{ $service->title }}">
                        @endif
                        <div class="card-body text-center">
                            @if($service->icon)
                            <i class="{{ $service->icon }} fa-3x text-primary mb-3"></i>
                            @endif
                            <h5 class="card-title">{{ $service->title }}</h5>
                            <p class="card-text">{{ $service->short_description }}</p>
                            @if($service->price_from)
                            <p class="text-primary fw-bold">ابتداءً من {{ number_format($service->price_from) }} ريال</p>
                            @endif
                            <a href="{{ route('services.show', $service->slug) }}" class="btn btn-primary">اعرف المزيد</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('services.index') }}" class="btn btn-outline-primary btn-lg">جميع الخدمات</a>
            </div>
        </div>
    </section>
    @endif

    <!-- Portfolio Section -->
    @if($portfolios->count())
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">أعمالنا المميزة</h2>
            <div class="row">
                @foreach($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="portfolio-item">
                        @if($portfolio->featured_image)
                        <img src="{{ asset('storage/' . $portfolio->featured_image) }}" class="img-fluid" alt="{{ $portfolio->title }}">
                        @else
                        <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 250px;">
                            <i class="fas fa-image fa-3x text-white"></i>
                        </div>
                        @endif
                        <div class="portfolio-overlay">
                            <div class="text-center">
                                <h5>{{ $portfolio->title }}</h5>
                                <p>{{ $portfolio->category }}</p>
                                <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="btn btn-light">عرض التفاصيل</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('portfolio.index') }}" class="btn btn-outline-primary btn-lg">جميع الأعمال</a>
            </div>
        </div>
    </section>
    @endif

    <!-- Clients Section -->
    @if($clients->count())
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">عملاؤنا</h2>
            <div class="row align-items-center">
                @foreach($clients as $client)
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    @if($client->logo)
                    <img src="{{ asset('storage/' . $client->logo) }}" class="img-fluid client-logo" 
                         alt="{{ $client->name }}" style="max-height: 100px;">
                    @else
                    <div class="client-placeholder">
                        <h5 class="text-muted">{{ $client->name }}</h5>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Blog Section -->
    @if($blogPosts->count())
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">آخر المقالات</h2>
            <div class="row">
                @foreach($blogPosts as $post)
                <div class="col-lg-4 mb-4">
                    <div class="card blog-card h-100">
                        @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}">
                        @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-newspaper fa-3x text-muted"></i>
                        </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <small class="text-muted">{{ $post->published_at->format('Y/m/d') }}</small>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary">اقرأ المزيد</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('blog.index') }}" class="btn btn-outline-primary btn-lg">جميع المقالات</a>
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="mb-4">هل لديك مشروع تود تنفيذه؟</h2>
            <p class="lead mb-4">نحن هنا لمساعدتك في تحويل فكرتك إلى واقع رقمي مميز</p>
            <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3">تواصل معنا</a>
            <a href="https://wa.me/+966500000000" class="btn btn-success btn-lg">
                <i class="fab fa-whatsapp me-2"></i>راسلنا عبر الواتس
            </a>
        </div>
    </section>
</div>
@endsection