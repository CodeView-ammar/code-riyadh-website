
@extends('layouts.app')

@section('title', 'من نحن - كود الرياض')
@section('meta_description', 'تعرف على شركة كود الرياض، رائدة في تطوير الحلول التقنية والرقمية في المملكة العربية السعودية منذ 2020.')

@section('content')
<div style="margin-top: 76px;">
    <!-- About Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold animate-fade-in">نحن كود الرياض</h1>
                    <p class="lead animate-fade-in">شركة رائدة في تطوير الحلول التقنية والرقمية، نساعد الشركات والمؤسسات على التحول الرقمي وتحقيق النجاح في العصر الحديث</p>
                    <div class="animate-fade-in">
                        <a href="#our-story" class="btn btn-primary btn-lg me-3">قصتنا</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">تواصل معنا</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="about-illustration">
                        <i class="fas fa-rocket fa-10x text-white opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section id="our-story" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">قصتنا</h2>
                    <div class="story-content">
                        <p class="lead text-center mb-5">بدأت رحلتنا في عام 2020 برؤية واضحة: تمكين الشركات السعودية من التفوق في العالم الرقمي</p>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="story-card">
                                    <h4><i class="fas fa-lightbulb text-primary me-3"></i>البداية</h4>
                                    <p>انطلقنا من الرياض بفريق صغير من المطورين المتحمسين، مؤمنين بقدرة التكنولوجيا على تغيير الأعمال وتطويرها. بدأنا بمشاريع صغيرة لشركات ناشئة وتطورنا تدريجياً.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="story-card">
                                    <h4><i class="fas fa-chart-line text-success me-3"></i>النمو</h4>
                                    <p>خلال السنوات القليلة الماضية، نمت الشركة لتصبح واحدة من أبرز شركات تطوير البرمجيات في المملكة، مع فريق من أكثر من 25 خبيراً في مختلف التخصصات التقنية.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">رؤيتنا ورسالتنا</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="vision-card text-center">
                        <div class="vision-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h4>رؤيتنا</h4>
                        <p>أن نكون الشريك التقني الأول للشركات في المملكة العربية السعودية، ونساهم في تحقيق رؤية المملكة 2030 من خلال الحلول التقنية المبتكرة والمتطورة التي تدعم التحول الرقمي.</p>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="mission-card text-center">
                        <div class="mission-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h4>رسالتنا</h4>
                        <p>نقدم حلولاً تقنية مبتكرة وعالية الجودة تساعد عملاءنا على تحقيق أهدافهم التجارية، من خلال فريق متخصص يجمع بين الخبرة التقنية والفهم العميق لاحتياجات السوق المحلي.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">قيمنا</h2>
                    <p class="section-subtitle">المبادئ التي نؤمن بها وتوجه عملنا يومياً</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="value-card text-center">
                        <div class="value-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h5>الجودة</h5>
                        <p>نلتزم بأعلى معايير الجودة في جميع مشاريعنا، من التصميم إلى التطوير والتسليم</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="value-card text-center">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h5>الابتكار</h5>
                        <p>نسعى دائماً لاستخدام أحدث التقنيات وإيجاد حلول مبتكرة لتحديات عملائنا</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="value-card text-center">
                        <div class="value-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h5>الشراكة</h5>
                        <p>نبني علاقات طويلة الأمد مع عملائنا، ونعتبر نجاحهم نجاحاً لنا</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="value-card text-center">
                        <div class="value-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5>الثقة</h5>
                        <p>نحافظ على أعلى مستويات الأمان والخصوصية في جميع مشاريعنا</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">فريقنا</h2>
                    <p class="section-subtitle">خبراء متخصصون في مختلف المجالات التقنية</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card text-center">
                        <div class="team-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h5>أحمد الحربي</h5>
                        <p class="team-role">المدير التنفيذي ومؤسس الشركة</p>
                        <p class="team-bio">خبرة تزيد عن 10 سنوات في تطوير البرمجيات وقيادة الفرق التقنية</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card text-center">
                        <div class="team-avatar">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <h5>سارة العتيبي</h5>
                        <p class="team-role">مديرة التطوير التقني</p>
                        <p class="team-bio">متخصصة في تطوير التطبيقات والأنظمة المتكاملة مع خبرة 8 سنوات</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card text-center">
                        <div class="team-avatar">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <h5>محمد السالم</h5>
                        <p class="team-role">مدير التصميم والتطوير الأمامي</p>
                        <p class="team-bio">خبير في تصميم واجهات المستخدم وتطوير التطبيقات التفاعلية</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fab fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card text-center">
                        <div class="team-avatar">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h5>فاطمة الزهراني</h5>
                        <p class="team-role">مختصة الأمن السيبراني</p>
                        <p class="team-bio">خبيرة في حماية الأنظمة والتطبيقات من التهديدات السيبرانية</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card text-center">
                        <div class="team-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h5>عبدالله القحطاني</h5>
                        <p class="team-role">محلل الأنظمة والبيانات</p>
                        <p class="team-bio">متخصص في تحليل البيانات وتطوير الحلول الذكية</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card text-center">
                        <div class="team-avatar">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <h5>نورا الدوسري</h5>
                        <p class="team-role">مديرة خدمة العملاء</p>
                        <p class="team-bio">متخصصة في إدارة العلاقات مع العملاء وضمان جودة الخدمة</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">إنجازاتنا</h2>
                    <p class="section-subtitle">أرقام تعكس نجاحنا وتفانينا في خدمة عملائنا</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="achievement-card">
                        <div class="achievement-number" data-count="150">0</div>
                        <div class="achievement-label">مشروع مكتمل</div>
                        <p class="achievement-desc">مشاريع متنوعة في مختلف القطاعات</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="achievement-card">
                        <div class="achievement-number" data-count="120">0</div>
                        <div class="achievement-label">عميل راضي</div>
                        <p class="achievement-desc">معدل رضا العملاء 98%</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="achievement-card">
                        <div class="achievement-number" data-count="5">0</div>
                        <div class="achievement-label">سنوات خبرة</div>
                        <p class="achievement-desc">في السوق السعودي</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="achievement-card">
                        <div class="achievement-number" data-count="25">0</div>
                        <div class="achievement-label">خبير تقني</div>
                        <p class="achievement-desc">في مختلف التخصصات</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Awards Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">الجوائز والشهادات</h2>
                    <p class="section-subtitle">اعتراف بجودة خدماتنا وتميزنا في السوق</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="award-card text-center">
                        <div class="award-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h5>جائزة أفضل شركة تقنية ناشئة 2022</h5>
                        <p>من معرض الرياض للتقنية والابتكار</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="award-card text-center">
                        <div class="award-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <h5>شهادة الأيزو ISO 9001:2015</h5>
                        <p>في إدارة الجودة للخدمات التقنية</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="award-card text-center">
                        <div class="award-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h5>عضوية غرفة التجارة الرقمية</h5>
                        <p>عضو معتمد في غرفة الرياض</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-lg-8 mx-auto">
                    <h2 class="mb-4">هل أنت مستعد للعمل معنا؟</h2>
                    <p class="lead mb-4">انضم إلى أكثر من 120 عميل راضي واكتشف كيف يمكننا مساعدتك في تحقيق أهدافك الرقمية</p>
                    <div>
                        <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3">تواصل معنا</a>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-light btn-lg">استكشف خدماتنا</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('styles')
<style>
.story-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.08);
    border-left: 4px solid var(--primary-color);
    height: 100%;
    transition: all 0.3s ease;
}

.story-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.vision-card, .mission-card {
    background: white;
    padding: 3rem 2rem;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    height: 100%;
    transition: all 0.3s ease;
}

.vision-card:hover, .mission-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.vision-icon, .mission-icon {
    width: 100px;
    height: 100px;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    color: white;
    font-size: 3rem;
}

.value-card {
    background: white;
    padding: 2.5rem 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.08);
    height: 100%;
    transition: all 0.3s ease;
}

.value-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.value-icon {
    width: 80px;
    height: 80px;
    background: var(--gradient-success);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: white;
    font-size: 2rem;
}

.team-card {
    background: white;
    padding: 2.5rem 2rem;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.team-avatar {
    width: 100px;
    height: 100px;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: white;
    font-size: 2.5rem;
}

.team-role {
    color: var(--primary-color);
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.team-bio {
    color: var(--secondary-color);
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
}

.team-social a {
    display: inline-block;
    width: 40px;
    height: 40px;
    background: var(--light-color);
    border-radius: 50%;
    text-align: center;
    line-height: 40px;
    margin: 0 5px;
    color: var(--secondary-color);
    transition: all 0.3s ease;
}

.team-social a:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-3px);
}

.achievement-card {
    padding: 2rem 1rem;
}

.achievement-number {
    font-size: 3.5rem;
    font-weight: 800;
    color: var(--primary-color);
    display: block;
    margin-bottom: 0.5rem;
}

.achievement-label {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 0.5rem;
}

.achievement-desc {
    color: var(--secondary-color);
    font-size: 0.9rem;
}

.award-card {
    background: white;
    padding: 2.5rem 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.08);
    height: 100%;
    transition: all 0.3s ease;
}

.award-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.award-icon {
    width: 80px;
    height: 80px;
    background: var(--gradient-secondary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: white;
    font-size: 2rem;
}

@media (max-width: 768px) {
    .vision-card, .mission-card {
        padding: 2rem 1.5rem;
    }
    
    .team-card {
        padding: 2rem 1.5rem;
    }
    
    .achievement-number {
        font-size: 2.5rem;
    }
}
</style>
@endsection

@section('scripts')
<script>
// Counter Animation for achievements
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

// Trigger animation when achievements section is in view
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

const achievementsSection = document.querySelector('.achievement-card').parentElement.parentElement;
if (achievementsSection) {
    observer.observe(achievementsSection);
}

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
