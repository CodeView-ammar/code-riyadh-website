<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // مشاركة الإعدادات مع جميع الـ Views
        View::composer('*', function ($view) {
            try {
                $settings = Setting::all()->keyBy('key');
                $view->with('settings', $settings);
            } catch (\Exception $e) {
                // في حالة عدم توفر جدول الإعدادات بعد
                $view->with('settings', collect());
            }
        });
    }
}
