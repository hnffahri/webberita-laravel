<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Konten;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        Carbon::setLocale('id');
        $oneMonthAgo = Carbon::now()->subMonth();

        $terbaru = Konten::with('Kategori')->whereStatus(1)->latest()->first();

        if ($terbaru) {
            $terbaru2 = Konten::with('Kategori')->whereStatus(1)->where('id', '!=', $terbaru->id)->latest()->take(2)->get();
        } else {
            $terbaru2 = Konten::with('Kategori')->whereStatus(1)->latest()->take(2)->get();
        }

        $trending = Konten::with('Kategori')
        ->where('status', 1)
        ->where('created_at', '>=', $oneMonthAgo)
        ->orderBy('views', 'desc')
        ->take(6)
        ->latest()
        ->get();

        $vidio = Konten::with('Kategori')
        ->where('status', 1)
        // ->where('type', 'vidio')
        ->take(6)
        ->get();
        
        $kategoriM = Kategori::with(['KontenM' => function($query) {
            $query->where('status', 1)->latest();
        }])->get();

        return view('front/home/index', compact('terbaru', 'terbaru2', 'trending', 'vidio', 'kategoriM'));
    }
}
