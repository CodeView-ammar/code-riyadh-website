@extends('layouts.app')

@section('title', 'من نحن - كود الرياض')
@section('meta_description', 'تعرف على كود الرياض، شركة تطوير البرمجيات الرائدة في المملكة العربية السعودية')

@section('content')
<div style="margin-top: 76px;">
    <!-- Page Header -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold">من نحن</h1>
                    <p class="lead">نحن فريق من المطورين والمصممين المحترفين نسعى لتقديم أفضل الحلول التقنية</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-users fa-6x opacity-75"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <h2 class="mb-4">رؤيتنا</h2>
                    <p class="lead">أن نكون الشركة الرائدة في تطوير الحلول التقنية المبتكرة في المملكة العربية السعودية ومنطقة الشرق الأوسط.</p>
                    <p>نسعى لتمكين الشركات والأفراد من تحقيق أهدافهم الرقمية من خلال تقديم حلول تقنية عالية الجودة تواكب أحدث التطورات التكنولوجية.</p>
                </div>
                <div class="col-lg-6 mb-4">
                    <h2 class="mb-4">رسالتنا</h2>
                    <p class="lead">تطوير حلول تقنية مبتكرة وموثوقة تساعد عملائنا على النجاح في العصر الرقمي.</p>
                    <p>نحن ملتزمون بتقديم خدمات استثنائية تتميز بالجودة والابتكار والموثوقية، مع التركيز على فهم احتياجات عملائنا وتقديم حلول مخصصة تلبي توقعاتهم وتتجاوزها.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">قيمنا</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="text-center">
                        <i class="fas fa-gem fa-3x text-primary mb-3"></i>
                        <h5>الجودة</h5>
                        <p>نلتزم بأعلى معايير الجودة في كل مشروع ننجزه</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="text-center">
                        <i class="fas fa-lightbulb fa-3x text-primary mb-3"></i>
                        <h5>الابتكار</h5>
                        <p>نبحث دائماً عن الحلول المبتكرة والتقنيات الحديثة</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="text-center">
                        <i class="fas fa-handshake fa-3x text-primary mb-3"></i>
                        <h5>الثقة</h5>
                        <p>نبني علاقات طويلة الأمد مع عملائنا قائمة على الثقة</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="text-center">
                        <i class="fas fa-clock fa-3x text-primary mb-3"></i>
                        <h5>الالتزام</h5>
                        <p>نلتزم بالمواعيد المحددة ونسلم المشاريع في الوقت المناسب</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">لماذا تختار كود الرياض؟</h2>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="d-flex mb-3">
                        <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                        <div>
                            <h5>خبرة واسعة</h5>
                            <p>أكثر من 5 سنوات من الخبرة في تطوير الحلول التقنية المتنوعة</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                        <div>
                            <h5>فريق محترف</h5>
                            <p>فريق من أفضل المطورين والمصممين المختصين في التقنيات الحديثة</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                        <div>
                            <h5>دعم مستمر</h5>
                            <p>نقدم دعماً فنياً مستمراً لضمان استمرارية عمل مشاريعك</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="d-flex mb-3">
                        <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                        <div>
                            <h5>تقنيات حديثة</h5>
                            <p>نستخدم أحدث التقنيات والأدوات في تطوير المشاريع</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                        <div>
                            <h5>أسعار تنافسية</h5>
                            <p>نقدم خدماتنا بأسعار تنافسية تناسب جميع الميزانيات</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                        <div>
                            <h5>ضمان الجودة</h5>
                            <p>نضمن جودة العمل ونقدم ضماناً شاملاً على جميع مشاريعنا</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <h2 class="display-4 fw-bold">100+</h2>
                    <p class="lead">مشروع مكتمل</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h2 class="display-4 fw-bold">50+</h2>
                    <p class="lead">عميل راضٍ</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h2 class="display-4 fw-bold">5+</h2>
                    <p class="lead">سنوات خبرة</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h2 class="display-4 fw-bold">24/7</h2>
                    <p class="lead">دعم مستمر</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection