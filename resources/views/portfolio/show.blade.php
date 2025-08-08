
@extends('layouts.app')

@section('title', $portfolio->title . ' - أعمالنا - كود الرياض')
@section('meta_description', $portfolio->description)

@section('content')
<div style="margin-top: 76px;">
    <!-- Hero Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('portfolio.index') }}">أعمالنا</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $portfolio->title }}</li>
                        </ol>
                    </nav>

                    <!-- Category Badge -->
                    @if($portfolio->category)
                        <span class="badge bg-primary mb-3">
                            {{ $portfolio->category }}
                        </span>
                    @endif

                    <!-- Title -->
                    <h1 class="display-5 fw-bold mb-3">{{ $portfolio->title }}</h1>
                    
                    <!-- Description -->
                    <p class="lead text-muted mb-4">{{ $portfolio->description }}</p>
                    
                    <!-- Project Info -->
                    <div class="row mb-4">
                        @if($portfolio->client_name)
                            <div class="col-md-6 mb-2">
                                <strong>العميل:</strong> {{ $portfolio->client_name }}
                            </div>
                        @endif
                        @if($portfolio->completion_date)
                            <div class="col-md-6 mb-2">
                                <strong>تاريخ الإنجاز:</strong> {{ $portfolio->completion_date->format('Y/m/d') }}
                            </div>
                        @endif
                        @if($portfolio->project_url)
                            <div class="col-md-12 mb-2">
                                <strong>رابط المشروع:</strong> 
                                <a href="{{ $portfolio->project_url }}" target="_blank" class="text-primary">
                                    {{ $portfolio->project_url }}
                                    <i class="fas fa-external-link-alt ms-1"></i>
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Technologies -->
                    @if($portfolio->technologies)
                        <div class="mb-4">
                            <h6>التقنيات المستخدمة:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($portfolio->technologies as $tech)
                                    <span class="badge bg-secondary">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    @if($portfolio->featured_image)
        <section class="mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <img src="{{ asset('storage/' . $portfolio->featured_image) }}" 
                             class="img-fluid rounded shadow" 
                             alt="{{ $portfolio->title }}">
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Gallery -->
    @if($portfolio->gallery && count($portfolio->gallery) > 0)
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-4">معرض الصور</h3>
                        <div class="row">
                            @foreach($portfolio->gallery as $image)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <img src="{{ asset('storage/' . $image) }}" 
                                         class="img-fluid rounded shadow gallery-image" 
                                         alt="{{ $portfolio->title }}"
                                         data-bs-toggle="modal" 
                                         data-bs-target="#imageModal"
                                         style="cursor: pointer;">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Related Projects -->
    @if($relatedPortfolios->count())
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section-title mb-4">مشاريع مشابهة</h3>
                        <div class="row">
                            @foreach($relatedPortfolios as $related)
                                <div class="col-lg-4 mb-4">
                                    <div class="card h-100 shadow-sm">
                                        @if($related->featured_image)
                                            <img src="{{ asset('storage/' . $related->featured_image) }}" 
                                                 class="card-img-top" alt="{{ $related->title }}" 
                                                 style="height: 200px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                 style="height: 200px;">
                                                <i class="fas fa-image fa-2x text-muted"></i>
                                            </div>
                                        @endif
                                        
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="{{ route('portfolio.show', $related->slug) }}" 
                                                   class="text-decoration-none text-dark">
                                                    {{ $related->title }}
                                                </a>
                                            </h6>
                                            <p class="card-text text-muted small">{{ Str::limit($related->description, 100) }}</p>
                                            @if($related->category)
                                                <span class="badge bg-primary">{{ $related->category }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h3 class="mb-4">أعجبك هذا المشروع؟</h3>
            <p class="lead mb-4">تواصل معنا لمناقشة مشروعك القادم</p>
            <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3">
                ابدأ مشروعك
            </a>
            <a href="{{ route('portfolio.index') }}" class="btn btn-outline-light btn-lg">
                تصفح المزيد من الأعمال
            </a>
        </div>
    </section>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $portfolio->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <img id="modalImage" src="" class="img-fluid w-100" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .gallery-image {
        transition: transform 0.3s ease;
    }
    
    .gallery-image:hover {
        transform: scale(1.05);
    }
    
    .card {
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-3px);
    }
    
    .card-title a:hover {
        color: #007bff !important;
    }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gallery image modal functionality
    const galleryImages = document.querySelectorAll('.gallery-image');
    const modalImage = document.getElementById('modalImage');
    
    galleryImages.forEach(image => {
        image.addEventListener('click', function() {
            modalImage.src = this.src;
        });
    });
});
</script>
@endsection
