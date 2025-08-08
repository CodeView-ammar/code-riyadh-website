@extends('layouts.app')

@section('title', $service->title . ' - خدمات كود الرياض')
@section('meta_description', $service->short_description ?? $service->description)

@section('content')
<div style="margin-top: 76px;">
    <!-- Service Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}" class="text-white-50">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('services.index') }}" class="text-white-50">الخدمات</a>
                            </li>
                            <li class="breadcrumb-item active text-white">{{ $service->title }}</li>
                        </ol>
                    </nav>
                    
                    <h1 class="display-4 fw-bold animate-slide-in-left">{{ $service->title }}</h1>
                    <p class="lead animate-slide-in-left">{{ $service->short_description ?? $service->description }}</p>
                    
                    @if($service->price_from)
                    <div class="mb-4 animate-slide-in-left">
                        <span class="price-badge">ابتداءً من {{ number_format($service->price_from) }} ريال</span>
                    </div>
                    @endif
                    
                    <div class="animate-slide-in-left">
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">احصل على عرض سعر</a>
                        <a href="#service-details" class="btn btn-outline-light btn-lg">تفاصيل الخدمة</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center animate-slide-in-right">
                    @if($service->featured_image)
                        <img src="{{ asset('storage/' . $service->featured_image) }}" alt="{{ $service->title }}" class="img-fluid rounded-4 shadow-lg">
                    @else
                        <div class="service-hero-icon">
                            @if($service->icon)
                                <i class="{{ $service->icon }} fa-8x"></i>
                            @else
                                <i class="fas fa-code fa-8x"></i>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Service Details Section -->
    <section id="service-details" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-content animate-fade-in">
                        <h2 class="section-title text-start">تفاصيل الخدمة</h2>
                        <div class="content-text">
                            {!! nl2br(e($service->description)) !!}
                        </div>
                        
                        @if($service->slug === 'web-development')
                        <!-- محتوى مخصص لخدمة تطوير المواقع -->
                        <div class="mt-5">
                            <h3 class="mb-4">ما نقدمه في خدمة تطوير المواقع:</h3>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="feature-item">
                                        <div class="feature-icon-small">
                                            <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <h5>تصميم متجاوب</h5>
                                        <p>مواقع تعمل بشكل مثالي على جميع الأجهزة والشاشات</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="feature-item">
                                        <div class="feature-icon-small">
                                            <i class="fas fa-search"></i>
                                        </div>
                                        <h5>تحسين محركات البحث</h5>
                                        <p>مواقع محسنة للظهور في نتائج البحث الأولى</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="feature-item">
                                        <div class="feature-icon-small">
                                            <i class="fas fa-shield-alt"></i>
                                        </div>
                                        <h5>أمان عالي</h5>
                                        <p>حماية متقدمة ضد الهجمات والاختراقات</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="feature-item">
                                        <div class="feature-icon-small">
                                            <i class="fas fa-rocket"></i>
                                        </div>
                                        <h5>سرعة عالية</h5>
                                        <p>مواقع سريعة التحميل لتجربة مستخدم أفضل</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <h3 class="mb-4">مراحل تطوير الموقع:</h3>
                            <div class="process-steps">
                                <div class="step-item">
                                    <div class="step-number">1</div>
                                    <div class="step-content">
                                        <h5>التخطيط والتحليل</h5>
                                        <p>دراسة متطلباتك وأهدافك ووضع استراتيجية شاملة للمشروع</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">2</div>
                                    <div class="step-content">
                                        <h5>التصميم</h5>
                                        <p>إنشاء تصاميم جذابة ومبتكرة تناسب هوية علامتك التجارية</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">3</div>
                                    <div class="step-content">
                                        <h5>التطوير</h5>
                                        <p>برمجة الموقع باستخدام أحدث التقنيات والمعايير</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">4</div>
                                    <div class="step-content">
                                        <h5>الاختبار</h5>
                                        <p>اختبار شامل للموقع للتأكد من جودته وخلوه من الأخطاء</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">5</div>
                                    <div class="step-content">
                                        <h5>النشر والدعم</h5>
                                        <p>نشر الموقع وتقديم الدعم الفني المستمر</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <h3 class="mb-4">التقنيات التي نستخدمها:</h3>
                            <div class="tech-grid">
                                <div class="tech-item">
                                    <i class="fab fa-html5"></i>
                                    <span>HTML5</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fab fa-css3-alt"></i>
                                    <span>CSS3</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fab fa-js"></i>
                                    <span>JavaScript</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fab fa-react"></i>
                                    <span>React</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fab fa-laravel"></i>
                                    <span>Laravel</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fab fa-wordpress"></i>
                                    <span>WordPress</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fab fa-node"></i>
                                    <span>Node.js</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fas fa-database"></i>
                                    <span>MySQL</span>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="service-sidebar">
                        <!-- Contact Card -->
                        <div class="sidebar-card">
                            <h4 class="card-title">احصل على استشارة مجانية</h4>
                            <p>تواصل معنا الآن للحصول على استشارة مجانية وعرض سعر مخصص لمشروعك</p>
                            <div class="contact-info">
                                <div class="contact-item">
                                    <i class="fas fa-phone"></i>
                                    <span>{{ $settings->get('contact_phone')->value ?? '+966501234567' }}</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $settings->get('contact_email')->value ?? 'info@coderiyadh.com' }}</span>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="btn btn-primary w-100 mt-3">تواصل معنا</a>
                        </div>

                        <!-- Service Features -->
                        <div class="sidebar-card">
                            <h4 class="card-title">مميزات خدماتنا</h4>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> ضمان الجودة 100%</li>
                                <li><i class="fas fa-check"></i> دعم فني مجاني لمدة 6 أشهر</li>
                                <li><i class="fas fa-check"></i> تسليم في الوقت المحدد</li>
                                <li><i class="fas fa-check"></i> أسعار تنافسية</li>
                                <li><i class="fas fa-check"></i> فريق متخصص ومحترف</li>
                                <li><i class="fas fa-check"></i> استخدام أحدث التقنيات</li>
                            </ul>
                        </div>

                        @if($service->price_from)
                        <!-- Pricing Card -->
                        <div class="sidebar-card pricing-card">
                            <h4 class="card-title">باقات الأسعار</h4>
                            <div class="price-item">
                                <div class="price-label">الباقة الأساسية</div>
                                <div class="price-value">{{ number_format($service->price_from) }} ريال</div>
                            </div>
                            @if($service->price_to)
                            <div class="price-item">
                                <div class="price-label">الباقة المتقدمة</div>
                                <div class="price-value">{{ number_format($service->price_to) }} ريال</div>
                            </div>
                            @endif
                            <p class="price-note">* الأسعار قابلة للتفاوض حسب متطلبات المشروع</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    @if($relatedServices && $relatedServices->count())
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">خدمات ذات صلة</h2>
            <div class="row">
                @foreach($relatedServices as $related)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card service-card h-100">
                        @if($related->featured_image)
                        <img src="{{ asset('storage/' . $related->featured_image) }}" class="card-img-top" alt="{{ $related->title }}">
                        @endif
                        <div class="card-body text-center">
                            @if($related->icon)
                            <div class="service-icon">
                                <i class="{{ $related->icon }}"></i>
                            </div>
                            @endif
                            <h5 class="card-title">{{ $related->title }}</h5>
                            <p class="card-text">{{ $related->short_description }}</p>
                            @if($related->price_from)
                            <p class="text-primary fw-bold">ابتداءً من {{ number_format($related->price_from) }} ريال</p>
                            @endif
                            <a href="{{ route('services.show', $related->slug) }}" class="btn btn-primary">اعرف المزيد</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="mb-4">هل أنت مستعد لبدء مشروعك؟</h2>
            <p class="lead mb-4">تواصل معنا اليوم واحصل على استشارة مجانية وعرض سعر مخصص لمشروعك</p>
            <a href="{{ route('contact') }}" class="btn btn-light btn-lg">ابدأ مشروعك الآن</a>
        </div>
    </section>
</div>

@endsection

@section('styles')
<style>
.service-hero-icon {
    opacity: 0.8;
    margin-bottom: 2rem;
}

.content-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--secondary-color);
}

.feature-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.5rem;
}

.feature-icon-small {
    width: 50px;
    height: 50px;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin-left: 1rem;
    margin-top: 0.25rem;
    flex-shrink: 0;
}

.feature-item h5 {
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: var(--dark-color);
}

.feature-item p {
    color: var(--secondary-color);
    margin: 0;
}

.process-steps {
    position: relative;
}

.step-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 2rem;
    position: relative;
}

.step-item:not(:last-child)::after {
    content: '';
    position: absolute;
    right: 24px;
    top: 60px;
    width: 2px;
    height: 60px;
    background: var(--light-color);
}

.step-number {
    width: 48px;
    height: 48px;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    margin-left: 1rem;
    flex-shrink: 0;
    position: relative;
    z-index: 1;
}

.step-content h5 {
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: var(--dark-color);
}

.step-content p {
    color: var(--secondary-color);
    margin: 0;
}

.tech-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.tech-item {
    text-align: center;
    padding: 1.5rem 1rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
}

.tech-item:hover {
    transform: translateY(-5px);
}

.tech-item i {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
    display: block;
}

.tech-item span {
    font-weight: 600;
    color: var(--dark-color);
}

.sidebar-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}

.sidebar-card .card-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 1rem;
}

.contact-info {
    margin: 1.5rem 0;
}

.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.75rem;
}

.contact-item i {
    width: 20px;
    color: var(--primary-color);
    margin-left: 0.5rem;
}

.feature-list {
    list-style: none;
    padding: 0;
}

.feature-list li {
    display: flex;
    align-items: center;
    margin-bottom: 0.75rem;
    color: var(--secondary-color);
}

.feature-list i {
    color: var(--success-color);
    margin-left: 0.5rem;
    width: 16px;
}

.pricing-card {
    background: var(--gradient-primary) !important;
    color: white;
}

.pricing-card .card-title {
    color: white !important;
}

.price-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

.price-item:last-child {
    border-bottom: none;
}

.price-label {
    font-weight: 600;
}

.price-value {
    font-size: 1.2rem;
    font-weight: 700;
}

.price-note {
    font-size: 0.9rem;
    opacity: 0.8;
    margin-top: 1rem;
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .tech-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .sidebar-card {
        padding: 1.5rem;
    }
}
</style>
@endsection