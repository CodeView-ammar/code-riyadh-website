@extends('layouts.app')

@section('title', 'خدماتنا - كود الرياض')
@section('meta_description', 'اكتشف خدماتنا المتنوعة في تطوير المواقع والتطبيقات والأنظمة المتكاملة والتسويق الرقمي.')

@section('content')
<div style="margin-top: 76px;">
    <!-- Services Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold animate-fade-in">خدماتنا المتميزة</h1>
                    <p class="lead animate-fade-in">نقدم مجموعة شاملة من الخدمات التقنية المتطورة لمساعدتك في تحقيق أهدافك الرقمية وتطوير أعمالك</p>
                    <div class="animate-fade-in">
                        <a href="#services-grid" class="btn btn-primary btn-lg me-3">استكشف خدماتنا</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">احصل على استشارة</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section id="services-grid" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">الخدمات التي نقدمها</h2>
                    <p class="section-subtitle">حلول تقنية متكاملة ومبتكرة تلبي جميع احتياجاتك الرقمية</p>
                </div>
            </div>
            
            @if($services->count())
            <div class="row">
                @foreach($services as $index => $service)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="card service-card h-100">
                        @if($service->featured_image)
                        <img src="{{ asset('storage/' . $service->featured_image) }}" class="card-img-top" alt="{{ $service->title }}" style="height: 200px; object-fit: cover;">
                        @endif
                        
                        <div class="card-body text-center d-flex flex-column">
                            @if($service->icon)
                            <div class="service-icon mb-3">
                                <i class="{{ $service->icon }}"></i>
                            </div>
                            @endif
                            
                            <h5 class="card-title">{{ $service->title }}</h5>
                            <p class="card-text flex-grow-1">{{ $service->short_description ?? Str::limit($service->description, 100) }}</p>
                            
                            <div class="mt-auto">
                                <a href="#" class="btn btn-primary service-details-btn mb-2" data-service="{{ $service->slug }}">اعرف المزيد</a>
                                <a href="#contact" class="btn btn-outline-primary consultation-btn">اطلب استشارة</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="row">
                <div class="col-12 text-center">
                    <div class="empty-state">
                        <i class="fas fa-cogs fa-5x text-muted mb-4"></i>
                        <h3>قريباً...</h3>
                        <p class="text-muted">نحن نعمل على إضافة خدمات جديدة. تواصل معنا للاستفسار عن خدماتنا.</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary">تواصل معنا</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-5 features-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">لماذا تختار كود الرياض؟</h2>
                    <p class="section-subtitle">مميزات تجعلنا الخيار الأمثل لمشاريعك التقنية</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center">
                        <div class="feature-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h5>جودة عالية</h5>
                        <p>نلتزم بأعلى معايير الجودة في جميع مشاريعنا</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h5>تسليم في الوقت</h5>
                        <p>نحترم المواعيد ونسلم المشاريع في الوقت المحدد</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-center">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h5>دعم مستمر</h5>
                        <p>نقدم دعماً فنياً مستمراً بعد تسليم المشروع</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-center">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h5>فريق محترف</h5>
                        <p>فريق من المختصين ذوي الخبرة والكفاءة</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-5 stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <span class="stat-number" data-count="150">0</span>
                        <div class="stat-label">مشروع مكتمل</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <span class="stat-number" data-count="120">0</span>
                        <div class="stat-label">عميل سعيد</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <span class="stat-number" data-count="5">0</span>
                        <div class="stat-label">سنوات خبرة</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <span class="stat-number" data-count="24">0</span>
                        <div class="stat-label">ساعة دعم</div>
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
                    <h2 class="section-title">كيف نعمل</h2>
                    <p class="section-subtitle">عملية منظمة ومدروسة لضمان نجاح مشروعك</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="process-step text-center">
                        <div class="process-number">1</div>
                        <h5>الاستشارة</h5>
                        <p>نستمع لأفكارك ونفهم متطلباتك</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="process-step text-center">
                        <div class="process-number">2</div>
                        <h5>التخطيط</h5>
                        <p>نضع خطة شاملة لتنفيذ المشروع</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="process-step text-center">
                        <div class="process-number">3</div>
                        <h5>التنفيذ</h5>
                        <p>نبدأ العمل وننفذ المشروع بدقة</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="process-step text-center">
                        <div class="process-number">4</div>
                        <h5>التسليم</h5>
                        <p>نسلم المشروع ونقدم الدعم اللازم</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <h2 class="mb-4">هل أنت مستعد لبدء مشروعك التالي؟</h2>
                    <p class="lead mb-4">تواصل معنا اليوم واكتشف كيف يمكننا مساعدتك في تحقيق أهدافك الرقمية</p>
                    <div class="contact-info">
                        <div class="mb-3">
                            <i class="fas fa-phone me-2"></i>
                            <span>+966501234567</span>
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-envelope me-2"></i>
                            <span>info@coderiyadh.com</span>
                        </div>
                        <div class="mb-3">
                            <i class="fab fa-whatsapp me-2"></i>
                            <a href="https://wa.me/+966501234567" class="text-light">راسلنا عبر الواتس</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-white p-4 rounded shadow">
                        <h5 class="text-dark mb-3">احصل على استشارة مجانية</h5>
                        <form id="consultationForm" action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="الاسم" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" name="phone" class="form-control" placeholder="رقم الهاتف" required>
                            </div>
                            <div class="mb-3">
                                <select name="service" class="form-control" required>
                                    <option value="">اختر نوع الخدمة</option>
                                    <option value="web-development">تطوير المواقع</option>
                                    <option value="mobile-apps">تطبيقات الجوال</option>
                                    <option value="integrated-systems">الأنظمة المتكاملة</option>
                                    <option value="consultation">استشارة عامة</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea name="message" class="form-control" rows="3" placeholder="وصف مختصر للمشروع" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">احصل على استشارة مجانية</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('styles')
<style>
.empty-state {
    padding: 4rem 2rem;
}

.process-step {
    padding: 2rem 1rem;
}

.process-number {
    width: 80px;
    height: 80px;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: white;
    font-size: 1.5rem;
    font-weight: 700;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
}

.process-step h5 {
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--dark-color);
}

.process-step p {
    color: var(--secondary-color);
}

[data-aos] {
    pointer-events: none;
}

[data-aos].aos-animate {
    pointer-events: auto;
}
.service-details-btn,.consultation-btn {
    pointer-events: auto; /* تأكد من أن هذه الخاصية موجودة */
}
/* Counter animation */
@keyframes countUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.stat-number {
    animation: countUp 0.8s ease-out;
}

/* Modal Styles */
.modal-content {
    border-radius: 20px;
    border: none;
    overflow: hidden;
}

.modal-header {
    background: var(--gradient-primary);
    color: white;
    border-bottom: none;
    padding: 2rem 2rem 1rem;
}

.modal-title {
    font-size: 1.5rem;
    font-weight: 700;
}

.modal-body {
    padding: 2rem;
}

.btn-close {
    background: none;
    border: none;
    color: white;
    opacity: 0.8;
    font-size: 1.2rem;
}

.btn-close:hover {
    opacity: 1;
}

.service-feature {
    background: var(--light-color);
    padding: 1.5rem;
    border-radius: 15px;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
    border: 1px solid rgba(102, 126, 234, 0.1);
}

.service-feature:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-color: var(--primary-color);
}

.service-feature h6 {
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.service-feature p {
    color: var(--secondary-color);
    margin-bottom: 0;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .process-number {
        width: 60px;
        height: 60px;
        font-size: 1.2rem;
    }
    
    .feature-icon {
        width: 80px;
        height: 80px;
        font-size: 2rem;
    }
}
</style>
@endsection

@section('scripts')
<script>
// Counter Animation
function animateCounters() {
    const counters = document.querySelectorAll('[data-count]');
    const speed = 200;

    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const count = parseInt(counter.innerText);
        const inc = target / speed;
        
        if (count < target) {
            counter.innerText = Math.ceil(count + inc);
            setTimeout(() => animateCounters(), 1);
        } else {
            counter.innerText = target;
        }
    });
}

// Trigger animation when stats section is in view
const observerOptions = {
    threshold: 0.5,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounters();
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

const statsSection = document.querySelector('.stats-section');
if (statsSection) {
    observer.observe(statsSection);
}

// Service details functionality
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.service-details-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get service information from the card
            const serviceCard = this.closest('.service-card');
            const serviceTitle = serviceCard.querySelector('.card-title').textContent;
            const serviceDescription = serviceCard.querySelector('.card-text').textContent;
            const serviceSlug = this.getAttribute('data-service');
            
            // Get additional service features based on service type
            let additionalContent = '';
            
            if (serviceSlug === 'web-development' || serviceTitle.includes('تطوير المواقع')) {
                additionalContent = `
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <div class="service-feature">
                                <h6><i class="fas fa-mobile-alt me-2"></i>تصميم متجاوب</h6>
                                <p>مواقع تعمل بشكل مثالي على جميع الأجهزة</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="service-feature">
                                <h6><i class="fas fa-rocket me-2"></i>أداء سريع</h6>
                                <p>تحسين سرعة التحميل والأداء</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="service-feature">
                                <h6><i class="fas fa-shield-alt me-2"></i>الأمان</h6>
                                <p>حماية متقدمة ضد التهديدات</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="service-feature">
                                <h6><i class="fas fa-search me-2"></i>محسن للبحث</h6>
                                <p>تحسين SEO لمحركات البحث</p>
                            </div>
                        </div>
                    </div>
                `;
            } else if (serviceSlug === 'mobile-apps' || serviceTitle.includes('تطبيقات الجوال')) {
                additionalContent = `
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <div class="service-feature">
                                <h6><i class="fab fa-android me-2"></i>Android</h6>
                                <p>تطبيقات أصلية لنظام أندرويد</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="service-feature">
                                <h6><i class="fab fa-apple me-2"></i>iOS</h6>
                                <p>تطبيقات أصلية لنظام iOS</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="service-feature">
                                <h6><i class="fas fa-sync me-2"></i>تطبيقات هجينة</h6>
                                <p>تطبيقات تعمل على المنصتين</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="service-feature">
                                <h6><i class="fas fa-cloud me-2"></i>التكامل السحابي</h6>
                                <p>ربط التطبيق بالخدمات السحابية</p>
                            </div>
                        </div>
                    </div>
                `;
            } else if (serviceSlug === 'integrated-systems' || serviceTitle.includes('الأنظمة المتكاملة')) {
                additionalContent = `
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <div class="service-feature">
                                <h6><i class="fas fa-chart-bar me-2"></i>أنظمة إدارة</h6>
                                <p>أنظمة شاملة لإدارة الموارد والعمليات</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="service-feature">
                                <h6><i class="fas fa-shopping-cart me-2"></i>أنظمة التجارة</h6>
                                <p>منصات تجارة إلكترونية متطورة</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="service-feature">
                                <h6><i class="fas fa-database me-2"></i>إدارة البيانات</h6>
                                <p>أنظمة قواعد بيانات آمنة ومحسنة</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="service-feature">
                                <h6><i class="fas fa-link me-2"></i>التكامل</h6>
                                <p>ربط الأنظمة مع الخدمات الخارجية</p>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                additionalContent = `
                    <div class="text-center mb-4">
                        <i class="fas fa-cogs fa-4x text-primary mb-3"></i>
                        <p class="text-muted">خدمة مخصصة تلبي احتياجاتك الخاصة</p>
                    </div>
                `;
            }
            
            // Create and show modal
            const modalHtml = `
                <div class="modal fade" id="serviceModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">${serviceTitle}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p class="lead mb-4">${serviceDescription}</p>
                                ${additionalContent}
                                <div class="text-center mt-4">
                                    <a href="#contact" class="btn btn-primary btn-lg consultation-modal-btn" data-bs-dismiss="modal">اطلب استشارة مجانية</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // Remove existing modal if any
            const existingModal = document.getElementById('serviceModal');
            if (existingModal) {
                existingModal.remove();
            }
            
            // Add modal to body
            document.body.insertAdjacentHTML('beforeend', modalHtml);
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('serviceModal'));
            console.log("Modal created:", modal);
            modal.show();
            
            // Add click handler for consultation button in modal
            document.querySelector('.consultation-modal-btn').addEventListener('click', function() {
                const contactSection = document.getElementById('contact');
                if (contactSection) {
                    setTimeout(() => {
                        contactSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 300);
                }
            });
        });
    });

    // Consultation button functionality
      console.log("DOM fully loaded and parsed");
    document.querySelectorAll('.consultation-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log("Button clicked"); 
            // Scroll to contact section
            const contactSection = document.getElementById('contact');
            if (contactSection) {
                contactSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
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
</script>
@endsection
