
@extends('layouts.app')

@section('title', $blogPost->meta_title ?: $blogPost->title . ' - مدونة كود الرياض')
@section('meta_description', $blogPost->meta_description ?: $blogPost->excerpt)

@section('content')
<div style="margin-top: 76px;">
    <article>
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
                                    <a href="{{ route('blog.index') }}">المدونة</a>
                                </li>
                                @if($blogPost->category)
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('blog.index', ['category' => $blogPost->category->slug]) }}">
                                            {{ $blogPost->category->name }}
                                        </a>
                                    </li>
                                @endif
                                <li class="breadcrumb-item active">{{ $blogPost->title }}</li>
                            </ol>
                        </nav>

                        <!-- Category Badge -->
                        @if($blogPost->category)
                            <span class="badge mb-3" style="background-color: {{ $blogPost->category->color }};">
                                {{ $blogPost->category->name }}
                            </span>
                        @endif

                        <!-- Title -->
                        <h1 class="display-5 fw-bold mb-3">{{ $blogPost->title }}</h1>
                        
                        <!-- Excerpt -->
                        <p class="lead text-muted mb-4">{{ $blogPost->excerpt }}</p>
                        
                        <!-- Meta Info -->
                        <div class="d-flex flex-wrap align-items-center text-muted mb-4">
                            <span class="me-4">
                                <i class="fas fa-calendar me-2"></i>
                                {{ $blogPost->published_at->format('j F, Y') }}
                            </span>
                            @if($blogPost->reading_time)
                                <span class="me-4">
                                    <i class="fas fa-clock me-2"></i>
                                    {{ $blogPost->reading_time_text }}
                                </span>
                            @endif
                            <span class="me-4">
                                <i class="fas fa-eye me-2"></i>
                                {{ $blogPost->views_count }} مشاهدة
                            </span>
                        </div>

                        <!-- Tags -->
                        @if($blogPost->tags)
                            <div class="mb-4">
                                @foreach($blogPost->tags_array as $tag)
                                    <span class="badge bg-secondary me-2">{{ trim($tag) }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Image -->
        @if($blogPost->featured_image)
            <section class="mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <img src="{{ asset('storage/' . $blogPost->featured_image) }}" 
                                 class="img-fluid rounded shadow" 
                                 alt="{{ $blogPost->title }}">
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- Content -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="content">
                            {!! nl2br(e($blogPost->content)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Share Section -->
        <section class="py-4 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">شارك هذا المقال:</h6>
                            <div>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                                   target="_blank" class="btn btn-outline-primary btn-sm me-2">
                                    <i class="fab fa-facebook-f"></i> فيسبوك
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($blogPost->title) }}&url={{ urlencode(request()->url()) }}" 
                                   target="_blank" class="btn btn-outline-info btn-sm me-2">
                                    <i class="fab fa-twitter"></i> تويتر
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($blogPost->title . ' - ' . request()->url()) }}" 
                                   target="_blank" class="btn btn-outline-success btn-sm">
                                    <i class="fab fa-whatsapp"></i> واتساب
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <!-- Related Posts -->
    @if($relatedPosts->count())
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section-title mb-4">مقالات ذات صلة</h3>
                        <div class="row">
                            @foreach($relatedPosts as $post)
                                <div class="col-lg-4 mb-4">
                                    <div class="card blog-card h-100 shadow-sm">
                                        @if($post->featured_image)
                                            <div class="position-relative">
                                                <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                                     class="card-img-top" alt="{{ $post->title }}" 
                                                     style="height: 200px; object-fit: cover;">
                                                @if($post->category)
                                                    <span class="badge position-absolute top-0 start-0 m-2" 
                                                          style="background-color: {{ $post->category->color }};">
                                                        {{ $post->category->name }}
                                                    </span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center position-relative" 
                                                 style="height: 200px;">
                                                <i class="fas fa-newspaper fa-2x text-muted"></i>
                                                @if($post->category)
                                                    <span class="badge position-absolute top-0 start-0 m-2" 
                                                          style="background-color: {{ $post->category->color }};">
                                                        {{ $post->category->name }}
                                                    </span>
                                                @endif
                                            </div>
                                        @endif
                                        
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="{{ route('blog.show', $post->slug) }}" 
                                                   class="text-decoration-none text-dark">
                                                    {{ $post->title }}
                                                </a>
                                            </h6>
                                            <p class="card-text text-muted small">{{ Str::limit($post->excerpt, 100) }}</p>
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-1"></i>
                                                {{ $post->published_at->format('Y/m/d') }}
                                            </small>
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
            <h3 class="mb-4">هل أعجبك هذا المقال؟</h3>
            <p class="lead mb-4">تابع مدونتنا للحصول على آخر المقالات والنصائح التقنية</p>
            <a href="{{ route('blog.index') }}" class="btn btn-light btn-lg me-3">
                تصفح المزيد من المقالات
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                تواصل معنا
            </a>
        </div>
    </section>
</div>
@endsection

@section('styles')
<style>
    .content {
        font-size: 1.1rem;
        line-height: 1.8;
    }
    
    .content p {
        margin-bottom: 1.5rem;
    }
    
    .blog-card {
        transition: transform 0.3s ease;
    }
    
    .blog-card:hover {
        transform: translateY(-3px);
    }
    
    .card-title a:hover {
        color: #007bff !important;
    }
</style>
@endsection
