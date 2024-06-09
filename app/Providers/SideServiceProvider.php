<?php

namespace App\Providers;

use App\Models\Kategori;
use App\Models\Konten;
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
