
@extends('layouts.app')

@section('title', 'تواصل معنا - كود الرياض')
@section('meta_description', 'تواصل مع فريق كود الرياض للحصول على استشارة مجانية أو لمناقشة مشروعك التقني القادم.')

@section('content')
<div style="margin-top: 76px;">
    <!-- Contact Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold animate-fade-in">تواصل معنا</h1>
                    <p class="lead animate-fade-in">نحن هنا لمساعدتك في تحويل أفكارك إلى واقع رقمي. احصل على استشارة مجانية أو ناقش مشروعك القادم مع خبرائنا</p>
                    <div class="animate-fade-in">
                        <a href="#contact-form" class="btn btn-primary btn-lg me-3">ابدأ مشروعك</a>
                        <a href="https://wa.me/966501234567" target="_blank" class="btn btn-outline-light btn-lg">
                            <i class="fab fa-whatsapp me-2"></i>واتساب مباشر
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="contact-illustration">
                        <i class="fas fa-comments fa-10x text-white opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">كيف تتواصل معنا</h2>
                    <p class="section-subtitle">طرق متعددة للوصول إلينا واختر الأنسب لك</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-method-card text-center">
                        <div class="contact-method-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h5>اتصل بنا</h5>
                        <p class="method-desc">تحدث مع فريقنا مباشرة</p>
                        <div class="contact-details">
                            <a href="tel:+966114567890" class="contact-link">+966 11 456 7890</a>
                            <small class="d-block text-muted">الأحد - الخميس: 9:00 ص - 6:00 م</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-method-card text-center">
                        <div class="contact-method-icon whatsapp">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <h5>واتساب</h5>
                        <p class="method-desc">راسلنا في أي وقت</p>
                        <div class="contact-details">
                            <a href="https://wa.me/966501234567" target="_blank" class="contact-link">+966 50 123 4567</a>
                            <small class="d-block text-muted">متاح 24/7</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-method-card text-center">
                        <div class="contact-method-icon email">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h5>البريد الإلكتروني</h5>
                        <p class="method-desc">أرسل لنا تفاصيل مشروعك</p>
                        <div class="contact-details">
                            <a href="mailto:info@coderiyadh.com" class="contact-link">info@coderiyadh.com</a>
                            <small class="d-block text-muted">نرد خلال 24 ساعة</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact-form" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="contact-form-container">
                        <div class="text-center mb-5">
                            <h2 class="section-title">احصل على استشارة مجانية</h2>
                            <p class="section-subtitle">أخبرنا عن مشروعك وسنتواصل معك خلال 24 ساعة</p>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                يرجى مراجعة البيانات المدخلة وتصحيح الأخطاء
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="name" class="form-label">الاسم الكامل *</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                                               value="{{ old('name') }}" required placeholder="أدخل اسمك الكامل">
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="email" class="form-label">البريد الإلكتروني *</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                                               value="{{ old('email') }}" required placeholder="example@email.com">
                                    </div>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="phone" class="form-label">رقم الهاتف *</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" 
                                               value="{{ old('phone') }}" required placeholder="05xxxxxxxx">
                                    </div>
                                    @error('phone')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="company" class="form-label">اسم الشركة</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        <input type="text" name="company" id="company" class="form-control @error('company') is-invalid @enderror" 
                                               value="{{ old('company') }}" placeholder="اسم شركتك (اختياري)">
                                    </div>
                                    @error('company')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="service" class="form-label">نوع الخدمة المطلوبة *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                                    <select name="service" id="service" class="form-select @error('service') is-invalid @enderror" required>
                                        <option value="">اختر نوع الخدمة</option>
                                        <option value="web-development" {{ old('service') == 'web-development' ? 'selected' : '' }}>تطوير المواقع الإلكترونية</option>
                                        <option value="mobile-apps" {{ old('service') == 'mobile-apps' ? 'selected' : '' }}>تطبيقات الجوال</option>
                                        <option value="integrated-systems" {{ old('service') == 'integrated-systems' ? 'selected' : '' }}>الأنظمة المتكاملة</option>
                                        <option value="ui-ux-design" {{ old('service') == 'ui-ux-design' ? 'selected' : '' }}>تصميم واجهات المستخدم</option>
                                        <option value="digital-marketing" {{ old('service') == 'digital-marketing' ? 'selected' : '' }}>التسويق الرقمي</option>
                                        <option value="consulting" {{ old('service') == 'consulting' ? 'selected' : '' }}>استشارة تقنية</option>
                                        <option value="maintenance" {{ old('service') == 'maintenance' ? 'selected' : '' }}>الصيانة والدعم</option>
                                        <option value="other" {{ old('service') == 'other' ? 'selected' : '' }}>خدمة أخرى</option>
                                    </select>
                                </div>
                                @error('service')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="budget" class="form-label">الميزانية المتوقعة</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    <select name="budget" id="budget" class="form-select @error('budget') is-invalid @enderror">
                                        <option value="">اختر الميزانية المتوقعة</option>
                                        <option value="less-than-10k" {{ old('budget') == 'less-than-10k' ? 'selected' : '' }}>أقل من 10,000 ريال</option>
                                        <option value="10k-25k" {{ old('budget') == '10k-25k' ? 'selected' : '' }}>10,000 - 25,000 ريال</option>
                                        <option value="25k-50k" {{ old('budget') == '25k-50k' ? 'selected' : '' }}>25,000 - 50,000 ريال</option>
                                        <option value="50k-100k" {{ old('budget') == '50k-100k' ? 'selected' : '' }}>50,000 - 100,000 ريال</option>
                                        <option value="more-than-100k" {{ old('budget') == 'more-than-100k' ? 'selected' : '' }}>أكثر من 100,000 ريال</option>
                                        <option value="not-decided" {{ old('budget') == 'not-decided' ? 'selected' : '' }}>لم أحدد بعد</option>
                                    </select>
                                </div>
                                @error('budget')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="timeline" class="form-label">الإطار الزمني المطلوب</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    <select name="timeline" id="timeline" class="form-select @error('timeline') is-invalid @enderror">
                                        <option value="">اختر الإطار الزمني</option>
                                        <option value="urgent" {{ old('timeline') == 'urgent' ? 'selected' : '' }}>عاجل (أقل من شهر)</option>
                                        <option value="1-3-months" {{ old('timeline') == '1-3-months' ? 'selected' : '' }}>1-3 أشهر</option>
                                        <option value="3-6-months" {{ old('timeline') == '3-6-months' ? 'selected' : '' }}>3-6 أشهر</option>
                                        <option value="6-12-months" {{ old('timeline') == '6-12-months' ? 'selected' : '' }}>6-12 شهر</option>
                                        <option value="flexible" {{ old('timeline') == 'flexible' ? 'selected' : '' }}>مرن</option>
                                    </select>
                                </div>
                                @error('timeline')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label">عنوان المشروع *</label>
                                <div class="input-group">
                                    <span class="input-group-text align-items-start pt-3"><i class="fas fa-comment-alt"></i></span>
                                    <input type="text" name="subject" id="subject" 
                                    class="form-control @error('subject') is-invalid @enderror" required placeholder="عنوان مختصر عن الموضوع ">
                                        @error('subject')
                                            <div class="text-danger small mt-1">{{ $subject }}</div>
                                        @enderror
                                </div>
                            
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label">وصف المشروع *</label>
                                <div class="input-group">
                                    <span class="input-group-text align-items-start pt-3"><i class="fas fa-comment-alt"></i></span>
                                    <textarea name="message" id="message" rows="6" class="form-control @error('message') is-invalid @enderror" 
                                              required placeholder="أخبرنا عن مشروعك، أهدافك، والميزات المطلوبة...">{{ old('message') }}</textarea>
                                </div>
                                
                                @error('message')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="newsletter" id="newsletter" value="1" {{ old('newsletter') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="newsletter">
                                        أرغب في الاشتراك في النشرة الإخبارية لتلقي آخر الأخبار والعروض
                                    </label>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    إرسال الطلب
                                </button>
                                <p class="text-muted small mt-3">سنتواصل معك خلال 24 ساعة من إرسال الطلب</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Office Location Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">موقعنا</h2>
                    <p class="section-subtitle">زر مكتبنا في قلب الرياض</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <div class="office-info">
                        <div class="office-card">
                            <h4><i class="fas fa-map-marker-alt text-primary me-3"></i>عنوان المكتب</h4>
                            <p class="mb-4">برج الرياض للأعمال، الطابق 15<br>
                            حي الملك فهد، الرياض 12271<br>
                            المملكة العربية السعودية</p>
                        </div>

                        <div class="office-card">
                            <h4><i class="fas fa-clock text-success me-3"></i>ساعات العمل</h4>
                            <div class="working-hours">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>الأحد - الخميس:</span>
                                    <span>9:00 ص - 6:00 م</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>الجمعة - السبت:</span>
                                    <span class="text-muted">مغلق</span>
                                </div>
                            </div>
                        </div>

                        <div class="office-card">
                            <h4><i class="fas fa-route text-info me-3"></i>كيفية الوصول</h4>
                            <ul class="directions-list">
                                <li>من طريق الملك فهد، اتجه شرقاً</li>
                                <li>ابحث عن برج الرياض للأعمال</li>
                                <li>مواقف السيارات متوفرة في الطوابق السفلية</li>
                                <li>استخدم المصعد للوصول إلى الطابق 15</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="map-container">
                        <div class="map-placeholder">
                            <i class="fas fa-map fa-5x text-muted mb-3"></i>
                            <h5>خريطة الموقع</h5>
                            <p class="text-muted">برج الرياض للأعمال - حي الملك فهد</p>
                            <a href="https://goo.gl/maps/example" target="_blank" class="btn btn-outline-primary">
                                <i class="fas fa-external-link-alt me-2"></i>
                                فتح في خرائط جوجل
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">الأسئلة الشائعة</h2>
                    <p class="section-subtitle">إجابات على أكثر الأسئلة شيوعاً</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    كم تستغرق عملية تطوير موقع إلكتروني؟
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    يعتمد الوقت على نوع وحجم المشروع. عادة، المواقع البسيطة تستغرق 2-4 أسابيع، بينما المواقع المعقدة والمتاجر الإلكترونية قد تستغرق 6-12 أسبوع. نحدد الإطار الزمني بدقة بعد دراسة متطلباتك.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    هل تقدمون خدمة الصيانة والدعم؟
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    نعم، نقدم خدمات صيانة ودعم شاملة تشمل التحديثات الأمنية، إضافة المحتوى، حل المشاكل التقنية، والدعم الفني المستمر. لدينا عدة باقات صيانة تناسب احتياجاتك وميزانيتك.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    ما هي تكلفة تطوير تطبيق جوال؟
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    تختلف التكلفة حسب نوع التطبيق والميزات المطلوبة. التطبيقات البسيطة تبدأ من 15,000 ريال، بينما التطبيقات المعقدة قد تكلف 50,000 ريال أو أكثر. نقدم عرض أسعار مفصل بعد دراسة متطلباتك.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    هل يمكنني رؤية أمثلة من أعمالكم السابقة؟
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    بالطبع! يمكنك زيارة صفحة <a href="{{ route('portfolio.index') }}" class="text-primary">أعمالنا</a> لرؤية مجموعة من مشاريعنا المكتملة. كما يمكننا ترتيب عرض مفصل لأعمال مشابهة لمشروعك عند التواصل معنا.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    كيف تتم عملية الدفع؟
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    نتبع نظام دفع مرحلي: 50% عند بداية المشروع، 30% عند إنجاز 70% من العمل، و20% عند التسليم النهائي. نقبل التحويلات البنكية، الشيكات، وبطاقات الائتمان.
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

@section('styles')
<style>
.contact-method-card {
    background: white;
    padding: 3rem 2rem;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    height: 100%;
    transition: all 0.3s ease;
    border-top: 4px solid var(--primary-color);
}

.contact-method-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.contact-method-icon {
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

.contact-method-icon.whatsapp {
    background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
}

.contact-method-icon.email {
    background: linear-gradient(135deg, #ea4335 0%, #fbbc05 100%);
}

.method-desc {
    color: var(--secondary-color);
    margin-bottom: 1.5rem;
}

.contact-link {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--primary-color);
    text-decoration: none;
}

.contact-link:hover {
    color: var(--dark-color);
}

.contact-form-container {
    background: white;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 15px 50px rgba(0,0,0,0.1);
}

.contact-form .form-label {
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 0.5rem;
}

.contact-form .input-group-text {
    background: var(--light-color);
    border: 1px solid #dee2e6;
    color: var(--primary-color);
}

.contact-form .form-control, .contact-form .form-select {
    border: 1px solid #dee2e6;
    padding: 12px 15px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.contact-form .form-control:focus, .contact-form .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
}

.office-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.08);
    margin-bottom: 2rem;
    border-right: 4px solid var(--primary-color);
}

.office-card h4 {
    margin-bottom: 1rem;
    color: var(--dark-color);
}

.working-hours {
    background: var(--light-color);
    padding: 1rem;
    border-radius: 10px;
}

.directions-list {
    list-style: none;
    padding: 0;
}

.directions-list li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-right: 1.5rem;
}

.directions-list li:before {
    content: "\f105";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    color: var(--primary-color);
    position: absolute;
    right: 0;
    top: 0.5rem;
}

.directions-list li:last-child {
    border-bottom: none;
}

.map-container {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

.map-placeholder {
    padding: 4rem 2rem;
    text-align: center;
    background: var(--light-color);
}

.accordion-item {
    border: none;
    margin-bottom: 1rem;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.accordion-button {
    background: white;
    border: none;
    padding: 1.5rem 2rem;
    font-weight: 600;
    color: var(--dark-color);
    font-size: 1.1rem;
}

.accordion-button:not(.collapsed) {
    background: var(--primary-color);
    color: white;
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: none;
    border: none;
}

.accordion-body {
    padding: 1.5rem 2rem;
    background: white;
    color: var(--secondary-color);
    line-height: 1.7;
}

@media (max-width: 768px) {
    .contact-form-container {
        padding: 2rem 1.5rem;
    }
    
    .contact-method-card {
        padding: 2rem 1.5rem;
    }
    
    .office-card {
        padding: 1.5rem;
    }
}
</style>
@endsection

@section('scripts')
<script>
// Form validation and enhancement
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.contact-form');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    // Phone number formatting
    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        if (value.startsWith('966')) {
            value = value.substring(3);
        }
        if (value.startsWith('05')) {
            this.value = value;
        } else if (value.startsWith('5')) {
            this.value = '0' + value;
        }
    });

    // Form submission handling
    form.addEventListener('submit', function(e) {
        // Show loading state
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>جارٍ الإرسال...';
        submitBtn.disabled = true;
        
        // Re-enable button after 3 seconds (in case of errors)
        setTimeout(() => {
            if (submitBtn.disabled) {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        }, 3000);
    });

    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            if (alert.classList.contains('show')) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
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

    // Copy contact info to clipboard
    document.querySelectorAll('.contact-link').forEach(link => {
        link.addEventListener('click', function(e) {
            if (this.href.startsWith('tel:') || this.href.startsWith('mailto:')) {
                return; // Let default behavior handle phone and email links
            }
            
            e.preventDefault();
            const text = this.textContent.trim();
            navigator.clipboard.writeText(text).then(() => {
                // Show success message
                const originalText = this.textContent;
                this.textContent = 'تم النسخ!';
                this.style.color = '#10b981';
                
                setTimeout(() => {
                    this.textContent = originalText;
                    this.style.color = '';
                }, 2000);
            });
        });
    });
});
</script>
@endsection
