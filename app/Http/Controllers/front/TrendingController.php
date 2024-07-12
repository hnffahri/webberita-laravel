<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Konten;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    public function index(){
        Carbon::setLocale('id');
        $oneMonthAgo = Carbon::now()->subMonth();
    
        $trending = Konten::with('kategori')
            ->where('status', 1)
            ->where('created_at', '>=', $oneMonthAgo)
            ->orderBy('views', 'desc')
            ->latest()
            ->paginate(9);
    
        // Ensure that all related categories are loaded to avoid duplicate queries
        $trending->loadMissing('kategori');

        return view('front/home/trending', compact('trending'));
    }
}
