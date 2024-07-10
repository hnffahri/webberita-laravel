<?php

namespace App\Providers;

use App\Models\Kategori;
use App\Models\Konten;
use App\Models\Plugin;
use App\Models\Seo;
use App\Models\Sosmed;
use App\Models\Tentang;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
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
            
            Carbon::setLocale('id');
            $oneMonthAgo = Carbon::now()->subMonth();
            
            $trending = Cache::remember('trendingcari', 60*60, function () use ($oneMonthAgo) {
                return Konten::with('Kategori')
                    ->where('status', 1)
                    ->where('created_at', '>=', $oneMonthAgo)
                    ->orderBy('views', 'desc')
                    ->take(6)
                    ->latest()
                    ->get();
            });
        
            $view->with([
                'kategorinav' => $kategori,
                'trendingcari' => $trending
            ]);
        });
        
        
        View::composer(['front/layout/templatedashboard','front/layout/template','front/layout/footer'], function ($view) {
            $seo = Cache::remember('seo', 60*60, function () {
                return Seo::find(1);
            });
            $view->with('seo', $seo);
        });
        
        View::composer(['front/layout/navbar','front/layout/footer'], function ($view) {
            $tentang = Cache::remember('tentang', 60*60, function () {
                return Tentang::select(['logo'])->find(1);
            });
            $view->with('tentang', $tentang);
        });
        
        View::composer(['front/layout/footer','front/home/detail','front/layout/navbar'], function ($view) {
            $sosmed = Cache::remember('sosmed', 60*60, function () {
                return Sosmed::find(1);
            });
            $view->with('sosmed', $sosmed);
        });
        
        View::composer(['front/layout/template'], function ($view) {
            $plugin = Cache::remember('plugin', 60*60, function () {
                return Plugin::find(1);
            });
            $view->with('plugin', $plugin);
        });
        
    }
}
