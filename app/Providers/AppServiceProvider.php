<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // مشاركة الإعدادات مع جميع الـ Views
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            try {
                $settings = \App\Models\Setting::all()->keyBy('key');
                $view->with('settings', $settings);
            } catch (\Exception $e) {
                // في حالة عدم توفر جدول الإعدادات بعد
                $view->with('settings', collect());
            }
        });
    }
}
