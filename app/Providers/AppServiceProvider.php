<?php

namespace App\Providers;

use App\View\Components\AdminIncludes\AdminFooter;
use App\View\Components\AdminIncludes\AdminHeader;
use App\View\Components\AdminIncludes\AdminLeftBar;
use App\View\Components\AdminIncludes\AdminMobileHeader;
use App\View\Components\Layouts\AdminLayout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('admin-layout', AdminLayout::class);
        Blade::component('admin-header', AdminHeader::class);
        Blade::component('admin-mobile-header', AdminMobileHeader::class);
        Blade::component('admin-left-bar', AdminLeftBar::class);
        Blade::component('admin-footer', AdminFooter::class);
    }
}
