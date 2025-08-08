
@extends('layouts.app')

@section('title', 'أعمالنا - كود الرياض')
@section('meta_description', 'استكشف مجموعة من أعمالنا المميزة في تطوير المواقع والتطبيقات والأنظمة المتكاملة.')

@section('content')
<div style="margin-top: 76px;">
    <!-- Portfolio Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold animate-fade-in">أعمالنا المميزة</h1>
                    <p class="lead animate-fade-in">نفخر بما حققناه من مشاريع ناجحة ومتنوعة في مختلف المجالات التقنية</p>
                    <div class="animate-fade-in">
                        <a href="#portfolio-grid" class="btn btn-primary btn-lg me-3">استكشف أعمالنا</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">ابدأ مشروعك</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Filter -->
    <section class="py-3 bg-light border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="portfolio-filters text-center">
                        <button class="filter-btn active" data-filter="all">الكل</button>
                        <button class="filter-btn" data-filter="website">مواقع الكترونية</button>
                        <button class="filter-btn" data-filter="mobile">تطبيقات الجوال</button>
                        <button class="filter-btn" data-filter="system">أنظمة متكاملة</button>
                        <button class="filter-btn" data-filter="ecommerce">متاجر الكترونية</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid -->
    <section id="portfolio-grid" class="py-5">
        <div class="container">
            @if($portfolios->count())
            <div class="row portfolio-container">
                @foreach ($portfolios as $index => $portfolio)
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item-wrapper" data-category="{{ $portfolio->category ?? 'website' }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="portfolio-item">
                        @if($portfolio->featured_image)
                            <img src="{{ asset('storage/' . $portfolio->featured_image) }}" alt="{{ $portfolio->title }}" class="img-fluid">
                        @else
                            <div class="portfolio-placeholder">
                                <i class="fas fa-image fa-3x text-muted"></i>
                                <p class="mt-2 text-muted">صورة المشروع</p>
                            </div>
                        @endif
                        
                        <div class="portfolio-overlay">
                            <div class="portfolio-content">
                                <h5 class="portfolio-title">{{ $portfolio->title }}</h5>
                                <p class="portfolio-category">{{ $portfolio->category ?? 'موقع الكتروني' }}</p>
                                <p class="portfolio-description">{{ Str::limit($portfolio->description, 80) }}</p>
                                <div class="portfolio-actions">
                                    @if($portfolio->button_link && $portfolio->button_text)
                                        <a href="{{ $portfolio->button_link }}" target="_blank" class="btn btn-light btn-sm me-2">
                                            <i class="fas fa-external-link-alt me-1"></i>
                                            {{ $portfolio->button_text }}
                                        </a>
                                    @endif
                                    @if(method_exists($portfolio, 'slug'))
                                        <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="btn btn-outline-light btn-sm">
                                            <i class="fas fa-eye me-1"></i>
                                            عرض التفاصيل
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <!-- Empty State -->
            <div class="row">
                <div class="col-12">
                    <div class="empty-state text-center py-5">
                        <div class="empty-icon mb-4">
                            <i class="fas fa-briefcase fa-5x text-muted"></i>
                        </div>
                        <h3 class="text-muted">نحن نعمل على إضافة أعمالنا</h3>
                        <p class="text-muted mb-4">سنقوم بعرض مشاريعنا المميزة قريباً. في الوقت الحالي، يمكنك التواصل معنا لمشاهدة أعمالنا السابقة.</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">تواصل معنا</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Technologies Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">التقنيات التي نستخدمها</h2>
                    <p class="section-subtitle">نستخدم أحدث التقنيات والأدوات لضمان جودة وكفاءة مشاريعنا</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="tech-showcase">
                        <div class="tech-category">
                            <h5>تطوير الواجهات الأمامية</h5>
                            <div class="tech-items">
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
                                    <i class="fab fa-vue"></i>
                                    <span>Vue.js</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tech-category">
                            <h5>تطوير الخادم الخلفي</h5>
                            <div class="tech-items">
                                <div class="tech-item">
                                    <i class="fab fa-laravel"></i>
                                    <span>Laravel</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fab fa-node"></i>
                                    <span>Node.js</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fab fa-python"></i>
                                    <span>Python</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fas fa-database"></i>
                                    <span>MySQL</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fab fa-aws"></i>
                                    <span>AWS</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tech-category">
                            <h5>تطوير التطبيقات</h5>
                            <div class="tech-items">
                                <div class="tech-item">
                                    <i class="fab fa-react"></i>
                                    <span>React Native</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fab fa-flutter"></i>
                                    <span>Flutter</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fab fa-swift"></i>
                                    <span>Swift</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fab fa-android"></i>
                                    <span>Android</span>
                                </div>
                                <div class="tech-item">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>PWA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">عملية تطوير المشاريع</h2>
                    <p class="section-subtitle">منهجية واضحة ومنظمة لضمان تسليم مشاريع عالية الجودة</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="process-card">
                        <div class="process-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h5>الفكرة والتخطيط</h5>
                        <p>دراسة المتطلبات ووضع استراتيجية شاملة للمشروع</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="process-card">
                        <div class="process-icon">
                            <i class="fas fa-pencil-ruler"></i>
                        </div>
                        <h5>التصميم</h5>
                        <p>إنشاء تصاميم جذابة ومناسبة للمستخدم المستهدف</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="process-card">
                        <div class="process-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h5>التطوير</h5>
                        <p>برمجة المشروع باستخدام أفضل الممارسات والتقنيات</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="process-card">
                        <div class="process-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h5>النشر والدعم</h5>
                        <p>نشر المشروع وتقديم الدعم والصيانة المستمرة</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="mb-4">هل لديك فكرة مشروع؟</h2>
            <p class="lead mb-4">دعنا نحولها إلى واقع رقمي مذهل. تواصل معنا اليوم لمناقشة مشروعك</p>
            <div>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3">ابدأ مشروعك</a>
                <a href="{{ route('services.index') }}" class="btn btn-outline-light btn-lg">اطلع على خدماتنا</a>
            </div>
        </div>
    </section>
</div>
@endsection

@section('styles')
<style>
.portfolio-filters {
    margin-bottom: 2rem;
}

.filter-btn {
    background: white;
    border: 2px solid var(--light-color);
    color: var(--secondary-color);
    padding: 0.75rem 1.5rem;
    margin: 0 0.5rem 0.5rem 0;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: pointer;
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
    transform: translateY(-2px);
}

.portfolio-item-wrapper {
    transition: all 0.3s ease;
}

.portfolio-item-wrapper.hide {
    opacity: 0;
    transform: scale(0.8);
    pointer-events: none;
}

.portfolio-placeholder {
    background: var(--light-color);
    height: 250px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
}

.portfolio-title {
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.portfolio-category {
    font-size: 0.9rem;
    opacity: 0.9;
    margin-bottom: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.portfolio-description {
    font-size: 0.95rem;
    opacity: 0.95;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.portfolio-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
}

.empty-state {
    padding: 5rem 2rem;
}

.empty-icon {
    opacity: 0.6;
}

.tech-showcase {
    background: white;
    border-radius: 20px;
    padding: 3rem 2rem;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

.tech-category {
    margin-bottom: 3rem;
}

.tech-category:last-child {
    margin-bottom: 0;
}

.tech-category h5 {
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 1.5rem;
    text-align: center;
    position: relative;
}

.tech-category h5::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 2px;
    background: var(--primary-color);
}

.tech-items {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
}

.tech-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1.5rem 1rem;
    background: var(--light-color);
    border-radius: 15px;
    transition: all 0.3s ease;
    min-width: 120px;
    text-align: center;
}

.tech-item:hover {
    transform: translateY(-5px);
    background: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.tech-item i {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.tech-item span {
    font-weight: 600;
    color: var(--dark-color);
    font-size: 0.9rem;
}

.process-card {
    background: white;
    padding: 2.5rem 2rem;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.process-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.process-icon {
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
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
}

.process-card h5 {
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 1rem;
}

.process-card p {
    color: var(--secondary-color);
    line-height: 1.6;
}

@media (max-width: 768px) {
    .filter-btn {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
    
    .tech-showcase {
        padding: 2rem 1rem;
    }
    
    .tech-items {
        gap: 0.5rem;
    }
    
    .tech-item {
        min-width: 100px;
        padding: 1rem 0.5rem;
    }
    
    .process-card {
        padding: 2rem 1.5rem;
    }
    
    .process-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
}

/* Animation for portfolio filtering */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.portfolio-item-wrapper.show {
    animation: fadeInUp 0.6s ease;
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Portfolio filtering
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item-wrapper');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            button.classList.add('active');

            const filterValue = button.getAttribute('data-filter');

            portfolioItems.forEach(item => {
                if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                    item.classList.remove('hide');
                    item.classList.add('show');
                } else {
                    item.classList.add('hide');
                    item.classList.remove('show');
                }
            });
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>
@endsection
