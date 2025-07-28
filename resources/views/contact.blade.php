@extends('layouts.app')

@section('title', 'تواصل معنا - كود الرياض')
@section('meta_description', 'تواصل مع فريق كود الرياض للحصول على استشارة مجانية حول مشروعك التقني')

@section('content')
<div style="margin-top: 76px;">
    <!-- Page Header -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold">تواصل معنا</h1>
                    <p class="lead">نحن هنا لمساعدتك في تحويل أفكارك إلى واقع رقمي مميز</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-envelope fa-6x opacity-75"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <h2 class="mb-4">أرسل لنا رسالة</h2>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">الاسم</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">البريد الإلكتروني</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">رقم الهاتف</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="service" class="form-label">نوع الخدمة</label>
                                <select class="form-control @error('service') is-invalid @enderror" 
                                        id="service" name="service">
                                    <option value="">اختر نوع الخدمة</option>
                                    <option value="web" {{ old('service') == 'web' ? 'selected' : '' }}>تطوير موقع إلكتروني</option>
                                    <option value="mobile" {{ old('service') == 'mobile' ? 'selected' : '' }}>تطبيق جوال</option>
                                    <option value="system" {{ old('service') == 'system' ? 'selected' : '' }}>نظام إداري</option>
                                    <option value="other" {{ old('service') == 'other' ? 'selected' : '' }}>أخرى</option>
                                </select>
                                @error('service')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">موضوع الرسالة</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                   id="subject" name="subject" value="{{ old('subject') }}" required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">تفاصيل المشروع</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" 
                                      id="message" name="message" rows="5" required 
                                      placeholder="اكتب تفاصيل مشروعك هنا...">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">إرسال الرسالة</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <h2 class="mb-4">معلومات التواصل</h2>
                    <div class="contact-info">
                        <div class="d-flex mb-4">
                            <i class="fas fa-map-marker-alt fa-2x text-primary me-3"></i>
                            <div>
                                <h5>العنوان</h5>
                                <p class="text-muted">{{ $settings->get('contact_address')->value ?? 'الرياض، المملكة العربية السعودية' }}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <i class="fas fa-phone fa-2x text-primary me-3"></i>
                            <div>
                                <h5>الهاتف</h5>
                                <p class="text-muted">{{ $settings->get('contact_phone')->value ?? '+966501234567' }}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <i class="fas fa-envelope fa-2x text-primary me-3"></i>
                            <div>
                                <h5>البريد الإلكتروني</h5>
                                <p class="text-muted">{{ $settings->get('contact_email')->value ?? 'info@coderiyadh.com' }}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <i class="fas fa-clock fa-2x text-primary me-3"></i>
                            <div>
                                <h5>ساعات العمل</h5>
                                <p class="text-muted">{{ $settings->get('working_hours')->value ?? 'الأحد - الخميس: 8:00 ص - 6:00 م' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="mt-4">
                        <h5>تابعنا على</h5>
                        <div class="social-links mt-3">
                            @if($settings->get('social_twitter'))
                            <a href="{{ $settings->get('social_twitter')->value }}" class="btn btn-outline-info me-2 mb-2" target="_blank">
                                <i class="fab fa-twitter"></i> تويتر
                            </a>
                            @endif
                            @if($settings->get('social_linkedin'))
                            <a href="{{ $settings->get('social_linkedin')->value }}" class="btn btn-outline-primary me-2 mb-2" target="_blank">
                                <i class="fab fa-linkedin-in"></i> لينكد إن
                            </a>
                            @endif
                            @if($settings->get('social_instagram'))
                            <a href="{{ $settings->get('social_instagram')->value }}" class="btn btn-outline-danger me-2 mb-2" target="_blank">
                                <i class="fab fa-instagram"></i> إنستغرام
                            </a>
                            @endif
                            @if($settings->get('social_github'))
                            <a href="{{ $settings->get('social_github')->value }}" class="btn btn-outline-dark me-2 mb-2" target="_blank">
                                <i class="fab fa-github"></i> جيت هاب
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">موقعنا</h2>
            <div class="row">
                <div class="col-12">
                    <div class="map-container bg-secondary d-flex align-items-center justify-content-center" style="height: 400px;">
                        <div class="text-center text-white">
                            <i class="fas fa-map-marked-alt fa-4x mb-3"></i>
                            <h4>خريطة الموقع</h4>
                            <p>سيتم إضافة خريطة تفاعلية لموقع الشركة هنا</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">الأسئلة الشائعة</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                    كم يستغرق تطوير موقع إلكتروني؟
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    يختلف وقت التطوير حسب تعقيد المشروع، لكن عادة ما يستغرق تطوير موقع إلكتروني من 2-8 أسابيع حسب المتطلبات والمواصفات.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                    هل تقدمون دعماً فنياً بعد التسليم؟
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    نعم، نقدم دعماً فنياً مجانياً لمدة 3 أشهر بعد التسليم، ثم نقدم خطط دعم سنوية بأسعار تنافسية.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                    ما هي طرق الدفع المتاحة؟
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    نقبل الدفع عن طريق التحويل البنكي، بطاقات الائتمان، وأنظمة الدفع الإلكترونية مثل مدى وفيزا وماستركارد.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                    هل يمكنني طلب تعديلات على المشروع؟
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    نعم، نسمح بعدد محدود من التعديلات المجانية حسب نوع المشروع، والتعديلات الإضافية تُحسب بأسعار منفصلة.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection