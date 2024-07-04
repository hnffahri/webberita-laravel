<?php

namespace App\Providers;

use App\Models\Kategori;
use App\Models\Konten;
use App\Models\Plugin;
use App\Models\Seo;
use App\Models\Sosmed;
use App\Models\Tentang;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SideServiceProvider extends ServiceProvider
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
        View::composer('front/layout/navbar', function ($view) {
            $kategori = Kategori::latest()->get();
            $view->with('kategorinav', $kategori);
        });
        
        View::composer(['front/layout/templatedashboard','front/layout/template','front/layout/footer'], function ($view) {
            $seo = Seo::find(1);
            $view->with('seo', $seo);
        });
        
        View::composer(['front/layout/navbar','front/layout/footer'], function ($view) {
            $tentang = Tentang::select(['logo'])->find(1);
            $view->with('tentang', $tentang);
        });
        
        View::composer(['front/layout/footer','front/home/detail','front/layout/navbar'], function ($view) {
            $sosmed = Sosmed::find(1);
            $view->with('sosmed', $sosmed);
        });
        
        View::composer(['front/layout/template'], function ($view) {
            $plugin = Plugin::find(1);
            $view->with('plugin', $plugin);
        });

        View::composer(['front/komponen/_modalcari','front/komponen/_offcanvascari'], function ($view) {
            Carbon::setLocale('id');
            $oneMonthAgo = Carbon::now()->subMonth();
            
            $trending = Konten::with('Kategori')
            ->where('status', 1)
            ->where('created_at', '>=', $oneMonthAgo)
            ->orderBy('views', 'desc')
            ->take(6)
            ->latest()
            ->get();
            
            $view->with('trendingcari', $trending);
        });
    }
}
