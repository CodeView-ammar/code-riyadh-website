<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Banner;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Client;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user if not exists
        User::firstOrCreate(
            ['email' => 'admin@coderiyadh.com'],
            [
                'name' => 'مدير كود الرياض',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Create banners (without images for now)
        Banner::create([
            'title' => 'مرحباً بك في كود الرياض',
            'description' => 'شريكك المثالي في تطوير المواقع والتطبيقات والأنظمة المتكاملة',
            'image' => '',
            'button_text' => 'ابدأ مشروعك',
            'button_link' => '/contact',
            'order' => 1,
            'is_active' => true,
        ]);

        Banner::create([
            'title' => 'حلول تقنية مبتكرة',
            'description' => 'نحول أفكارك إلى واقع رقمي يخدم عملك ويحقق أهدافك',
            'image' => '',
            'button_text' => 'اطلع على أعمالنا',
            'button_link' => '/portfolio',
            'order' => 2,
            'is_active' => true,
        ]);

        // Create services
        Service::create([
            'title' => 'تطوير المواقع الإلكترونية',
            'slug' => 'web-development',
            'short_description' => 'تصميم وتطوير مواقع إلكترونية احترافية ومتجاوبة',
            'description' => 'نقدم خدمات تطوير المواقع الإلكترونية المتكاملة باستخدام أحدث التقنيات والأدوات لضمان الحصول على موقع سريع وآمن وسهل الاستخدام.',
            'icon' => 'fas fa-globe',
            'price_from' => 5000.00,
            'features' => ['تصميم متجاوب', 'سرعة عالية', 'أمان متقدم', 'SEO محسّن'],
            'is_featured' => true,
            'order' => 1,
        ]);

        Service::create([
            'title' => 'تطبيقات الجوال',
            'slug' => 'mobile-apps',
            'short_description' => 'تطوير تطبيقات الجوال لأنظمة iOS و Android',
            'description' => 'نطور تطبيقات جوال مبتكرة وسهلة الاستخدام لتعزز تواصلك مع عملائك وتحسن تجربتهم.',
            'icon' => 'fas fa-mobile-alt',
            'price_from' => 15000.00,
            'features' => ['متوافق مع iOS و Android', 'واجهة مستخدم سهلة', 'أداء سريع'],
            'is_featured' => true,
            'order' => 2,
        ]);

        Service::create([
            'title' => 'الأنظمة المتكاملة',
            'slug' => 'integrated-systems',
            'short_description' => 'تطوير أنظمة إدارية وحلول أعمال متكاملة',
            'description' => 'نصمم ونطور أنظمة إدارية شاملة تساعدك في إدارة عملك بكفاءة عالية.',
            'icon' => 'fas fa-cogs',
            'price_from' => 25000.00,
            'features' => ['نظام إدارة شامل', 'تقارير تفصيلية', 'أمان عالي'],
            'is_featured' => true,
            'order' => 3,
        ]);

        // Create portfolio items (without images for now)
        Portfolio::create([
            'title' => 'موقع شركة التجارة العالمية',
            'slug' => 'global-trade-company',
            'description' => 'موقع إلكتروني متكامل لشركة تجارية مع نظام إدارة المحتوى',
            'featured_image' => '',
            'client_name' => 'شركة التجارة العالمية',
            'category' => 'مواقع إلكترونية',
            'technologies' => ['Laravel', 'Vue.js', 'MySQL'],
            'completion_date' => '2024-12-15',
            'is_featured' => true,
            'order' => 1,
        ]);

        Portfolio::create([
            'title' => 'تطبيق إدارة المطاعم',
            'slug' => 'restaurant-management-app',
            'description' => 'تطبيق جوال شامل لإدارة المطاعم وطلبات الطعام',
            'featured_image' => '',
            'client_name' => 'مطاعم الذوق الرفيع',
            'category' => 'تطبيقات جوال',
            'technologies' => ['Flutter', 'Firebase', 'Node.js'],
            'completion_date' => '2024-11-20',
            'is_featured' => true,
            'order' => 2,
        ]);

        Portfolio::create([
            'title' => 'نظام إدارة المستشفيات',
            'slug' => 'hospital-management-system',
            'description' => 'نظام متكامل لإدارة المستشفيات والمرضى والمواعيد',
            'featured_image' => '',
            'client_name' => 'مستشفى الرياض التخصصي',
            'category' => 'أنظمة إدارية',
            'technologies' => ['Laravel', 'React', 'PostgreSQL'],
            'completion_date' => '2024-10-30',
            'is_featured' => true,
            'order' => 3,
        ]);

        // Create clients (without logos for now)
        Client::create([
            'name' => 'شركة الاتصالات السعودية',
            'logo' => '',
            'testimonial' => 'فريق كود الرياض تميز في تطوير نظامنا الإداري الجديد بجودة عالية ودعم ممتاز',
            'client_position' => 'مدير تقنية المعلومات',
            'rating' => 5,
            'is_featured' => true,
            'order' => 1,
        ]);

        Client::create([
            'name' => 'مجموعة بن لادن',
            'logo' => '',
            'testimonial' => 'عمل احترافي ومتابعة مستمرة، ننصح بالتعامل مع كود الرياض',
            'client_position' => 'مدير المشاريع',
            'rating' => 5,
            'is_featured' => true,
            'order' => 2,
        ]);

        // Create blog posts (without images for now)
        BlogPost::create([
            'title' => 'أهمية التحول الرقمي للشركات السعودية',
            'slug' => 'digital-transformation-saudi-companies',
            'excerpt' => 'كيف يمكن للشركات السعودية الاستفادة من التحول الرقمي لتحسين أدائها وزيادة أرباحها',
            'content' => 'محتوى المقال الكامل عن التحول الرقمي وأهميته للشركات السعودية...',
            'featured_image' => '',
            'is_published' => true,
            'published_at' => now()->subDays(5),
        ]);

        BlogPost::create([
            'title' => 'أفضل الممارسات في تطوير تطبيقات الجوال',
            'slug' => 'mobile-app-development-best-practices',
            'excerpt' => 'دليل شامل لأفضل الممارسات في تطوير تطبيقات الجوال الناجحة',
            'content' => 'محتوى المقال عن أفضل الممارسات في تطوير التطبيقات...',
            'featured_image' => '',
            'is_published' => true,
            'published_at' => now()->subDays(3),
        ]);

        BlogPost::create([
            'title' => 'مستقبل الذكاء الاصطناعي في المملكة العربية السعودية',
            'slug' => 'ai-future-saudi-arabia',
            'excerpt' => 'نظرة على مستقبل الذكاء الاصطناعي وتطبيقاته في المملكة العربية السعودية',
            'content' => 'محتوى المقال عن مستقبل الذكاء الاصطناعي في السعودية...',
            'featured_image' => '',
            'is_published' => true,
            'published_at' => now()->subDays(1),
        ]);

        // إنشاء الإعدادات الأساسية
        $settings = [
            // إعدادات عامة
            ['key' => 'site_name', 'value' => 'كود الرياض', 'label' => 'اسم الموقع', 'type' => 'text', 'group' => 'general', 'order' => 1],
            ['key' => 'site_description', 'value' => 'شركة متخصصة في تطوير المواقع والتطبيقات والأنظمة الإدارية', 'label' => 'وصف الموقع', 'type' => 'textarea', 'group' => 'general', 'order' => 2],
            ['key' => 'site_logo', 'value' => '', 'label' => 'شعار الموقع', 'type' => 'image', 'group' => 'general', 'order' => 3],
            
            // إعدادات التواصل
            ['key' => 'contact_phone', 'value' => '+966501234567', 'label' => 'رقم الهاتف الرئيسي', 'type' => 'text', 'group' => 'contact', 'order' => 1],
            ['key' => 'contact_whatsapp', 'value' => '+966501234567', 'label' => 'رقم الواتساب', 'type' => 'text', 'group' => 'contact', 'order' => 2],
            ['key' => 'contact_email', 'value' => 'info@coderiyadh.com', 'label' => 'البريد الإلكتروني', 'type' => 'text', 'group' => 'contact', 'order' => 3],
            ['key' => 'contact_address', 'value' => 'الرياض، المملكة العربية السعودية', 'label' => 'العنوان', 'type' => 'text', 'group' => 'contact', 'order' => 4],
            ['key' => 'working_hours', 'value' => 'الأحد - الخميس: 8:00 ص - 6:00 م', 'label' => 'ساعات العمل', 'type' => 'text', 'group' => 'contact', 'order' => 5],
            
            // وسائل التواصل الاجتماعي
            ['key' => 'social_twitter', 'value' => 'https://twitter.com/coderiyadh', 'label' => 'تويتر', 'type' => 'text', 'group' => 'social', 'order' => 1],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/coderiyadh', 'label' => 'لينكد إن', 'type' => 'text', 'group' => 'social', 'order' => 2],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/coderiyadh', 'label' => 'إنستجرام', 'type' => 'text', 'group' => 'social', 'order' => 3],
            ['key' => 'social_github', 'value' => 'https://github.com/coderiyadh', 'label' => 'جيت هاب', 'type' => 'text', 'group' => 'social', 'order' => 4],
            
            // إعدادات SEO
            ['key' => 'seo_title', 'value' => 'كود الرياض - تطوير المواقع والتطبيقات', 'label' => 'عنوان SEO', 'type' => 'text', 'group' => 'seo', 'order' => 1],
            ['key' => 'seo_description', 'value' => 'شركة كود الرياض متخصصة في تطوير المواقع الإلكترونية وتطبيقات الجوال والأنظمة الإدارية المتكاملة', 'label' => 'وصف SEO', 'type' => 'textarea', 'group' => 'seo', 'order' => 2],
            ['key' => 'seo_keywords', 'value' => 'تطوير مواقع، تطبيقات جوال، أنظمة إدارية، الرياض، السعودية', 'label' => 'الكلمات المفتاحية', 'type' => 'textarea', 'group' => 'seo', 'order' => 3],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
