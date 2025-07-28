
@extends('layouts.app')

@section('title', 'المدونة - كود الرياض')
@section('meta_description', 'اطلع على آخر المقالات والنصائح التقنية في مدونة كود الرياض. مقالات متخصصة في تطوير المواقع والتطبيقات والتقنيات الحديثة.')

@section('content')
<div style="margin-top: 76px;">
    <!-- Hero Section -->
    <section class="py-5 bg-gradient-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-4">
                        @if($selectedCategory)
                            مقالات {{ $selectedCategory->name }}
                        @else
                            مدونة كود الرياض
                        @endif
                    </h1>
                    <p class="lead mb-4">
                        @if($selectedCategory)
                            {{ $selectedCategory->description ?? 'تصفح جميع المقالات في قسم ' . $selectedCategory->name }}
                        @else
                            اكتشف آخر التطورات والنصائح في عالم التقنية وتطوير البرمجيات
                        @endif
                    </p>
                    
                    <!-- Search Form -->
                    <form method="GET" class="d-flex justify-content-center mb-4">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <div class="input-group" style="max-width: 400px;">
                            <input type="text" class="form-control" name="search" 
                                   placeholder="ابحث في المقالات..." 
                                   value="{{ request('search') }}">
                            <button class="btn btn-light" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 mb-5">
                <div class="sticky-top" style="top: 100px;">
                    <!-- Categories -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-folder-open me-2"></i>الأقسام</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <a href="{{ route('blog.index') }}" 
                                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ !request('category') ? 'active' : '' }}">
                                    جميع المقالات
                                    <span class="badge bg-primary rounded-pill">{{ $posts->total() }}</span>
                                </a>
                                @foreach($categories as $category)
                                    <a href="{{ route('blog.index', ['category' => $category->slug]) }}" 
                                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request('category') == $category->slug ? 'active' : '' }}">
                                        <span>
                                            <span class="badge me-2" style="background-color: {{ $category->color }};">&nbsp;</span>
                                            {{ $category->name }}
                                        </span>
                                        <span class="badge bg-secondary rounded-pill">{{ $category->published_posts_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Popular Tags -->
                    @php
                        $popularTags = collect();
                        foreach($posts as $post) {
                            if($post->tags) {
                                $tags = explode(',', $post->tags);
                                foreach($tags as $tag) {
                                    $popularTags->push(trim($tag));
                                }
                            }
                        }
                        $popularTags = $popularTags->countBy()->take(10);
                    @endphp
                    
                    @if($popularTags->count())
                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white">
                            <h6 class="mb-0"><i class="fas fa-tags me-2"></i>الكلمات المفتاحية</h6>
                        </div>
                        <div class="card-body">
                            @foreach($popularTags as $tag => $count)
                                <span class="badge bg-light text-dark me-2 mb-2">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                @if($posts->count())
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-lg-6 mb-4">
                                <article class="card blog-card h-100 shadow-sm">
                                    @if($post->featured_image)
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                                 class="card-img-top" alt="{{ $post->title }}" 
                                                 style="height: 250px; object-fit: cover;">
                                            @if($post->category)
                                                <span class="badge position-absolute top-0 start-0 m-3" 
                                                      style="background-color: {{ $post->category->color }};">
                                                    {{ $post->category->name }}
                                                </span>
                                            @endif
                                        </div>
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center position-relative" 
                                             style="height: 250px;">
                                            <i class="fas fa-newspaper fa-3x text-muted"></i>
                                            @if($post->category)
                                                <span class="badge position-absolute top-0 start-0 m-3" 
                                                      style="background-color: {{ $post->category->color }};">
                                                    {{ $post->category->name }}
                                                </span>
                                            @endif
                                        </div>
                                    @endif
                                    
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('blog.show', $post->slug) }}" 
                                               class="text-decoration-none text-dark">
                                                {{ $post->title }}
                                            </a>
                                        </h5>
                                        <p class="card-text text-muted">{{ $post->excerpt }}</p>
                                        
                                        <!-- Meta Info -->
                                        <div class="d-flex justify-content-between align-items-center text-muted small mb-3">
                                            <span>
                                                <i class="fas fa-calendar me-1"></i>
                                                {{ $post->published_at->format('Y/m/d') }}
                                            </span>
                                            <div>
                                                @if($post->reading_time)
                                                    <span class="me-3">
                                                        <i class="fas fa-clock me-1"></i>
                                                        {{ $post->reading_time_text }}
                                                    </span>
                                                @endif
                                                <span>
                                                    <i class="fas fa-eye me-1"></i>
                                                    {{ $post->views_count }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Tags -->
                                        @if($post->tags)
                                            <div class="mb-3">
                                                @foreach($post->tags_array as $tag)
                                                    <span class="badge bg-light text-dark me-1">{{ trim($tag) }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="card-footer bg-transparent">
                                        <a href="{{ route('blog.show', $post->slug) }}" 
                                           class="btn btn-primary">
                                            اقرأ المزيد <i class="fas fa-arrow-left ms-1"></i>
                                        </a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-5">
                        {{ $posts->withQueryString()->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4>لا توجد مقالات</h4>
                        <p class="text-muted">
                            @if(request('search'))
                                لم يتم العثور على مقالات تحتوي على "{{ request('search') }}"
                            @elseif($selectedCategory)
                                لا توجد مقالات في قسم {{ $selectedCategory->name }} حالياً
                            @else
                                لا توجد مقالات منشورة حالياً
                            @endif
                        </p>
                        @if(request('search') || request('category'))
                            <a href="{{ route('blog.index') }}" class="btn btn-primary">
                                عرض جميع المقالات
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .blog-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
    }
    
    .card-title a:hover {
        color: #007bff !important;
    }
    
    .list-group-item.active {
        background-color: #007bff;
        border-color: #007bff;
    }
</style>
@endsection
