<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Konten;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');
        $oneMonthAgo = Carbon::now()->subMonth();

        $terbaru = Konten::with('kategori')->whereStatus(1)->latest()->first();

        $terbaru2 = Konten::with('kategori')->whereStatus(1)
            ->when($terbaru, function($query) use ($terbaru) {
                return $query->where('id', '!=', $terbaru->id);
            })
            ->latest()
            ->take(2)
            ->get();

        $rekomendasi = Konten::with('kategori')
            ->where('status', 1)
            ->where('id', '!=', $terbaru->id)
            ->take(6)
            ->get();

        $trending = Konten::with('kategori')
            ->where('status', 1)
            ->where('created_at', '>=', $oneMonthAgo)
            ->whereNotIn('id', $rekomendasi->pluck('id'))
            ->orderBy('views', 'desc')
            ->latest()
            ->take(6)
            ->get();

        $trendingIds = $trending->pluck('id');
        $kategoriM = Kategori::with(['konten' => function($query) use ($trendingIds) {
            $query->where('status', 1)
                ->whereNotIn('id', $trendingIds)
                ->take(1)
                ->latest();
        }])->get();

        return view('front/home/index', compact('terbaru', 'terbaru2', 'trending', 'rekomendasi', 'kategoriM'));
    }
}
