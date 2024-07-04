<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Konten;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class CariController extends Controller
{
    public function index(Request $request)
    {
        Date::setLocale('id');
        Carbon::setLocale('id');
        
        $oneMonthAgo = Carbon::now()->subMonth();

        $trending = Konten::with('Kategori')
        ->where('status', 1)
        ->where('created_at', '>=', $oneMonthAgo)
        ->orderBy('views', 'desc')
        ->take(6)
        ->latest()
        ->get();

        // ---------------------- //

        $query = $request->input('query');
        $cari = Konten::with('kategori')->where('judul', 'LIKE', "%$query%")
                // ->orWhere('ringkas', 'LIKE', "%$query%")
                ->paginate(5);

        return view('front/home/cari', compact('cari','query','trending'));
    }
}
