<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Konten;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class KategoriController extends Controller
{

    public function index($slugKategori){
        Carbon::setLocale('id');
        $oneMonthAgo = Carbon::now()->subMonth();

        $kategori = Kategori::whereSlug($slugKategori)->firstOrFail();
        $konten = Konten::where('kategori_id', $kategori->id)->latest()->paginate(4);
        
        $trending = Konten::with('Kategori')
        ->where('kategori_id', $kategori->id)
        ->where('status', 1)
        ->where('created_at', '>=', $oneMonthAgo)
        ->orderBy('views', 'desc')
        ->take(6)
        ->latest()
        ->get();

        return view('front/home/kategori', compact('konten', 'kategori', 'trending'));
    }

    public function detail($slugKategori, $slugKonten){
        
        Date::setLocale('id');
        Carbon::setLocale('id');
        
        $oneMonthAgo = Carbon::now()->subMonth();

        $konten = Konten::with('kategori')->where('slug', $slugKonten)->firstOrFail();
        
        // Buat kunci sesi unik untuk setiap konten berdasarkan ID konten
        $sessionKey = 'viewed_konten_' . $konten->id;

        // Periksa apakah kunci sesi ini sudah ada
        if (!session()->has($sessionKey)) {
            // Jika belum ada, tambahkan jumlah views dan simpan kunci sesi
            $konten->views += 1;
            $konten->save();

            // Simpan informasi bahwa konten ini sudah dilihat dalam sesi
            session()->put($sessionKey, true);
        }

        $konten->formatted_date = Carbon::parse($konten->created_at)->translatedFormat('l, d F Y H:i');

        $kategori = $konten->kategori;
        
        $trending = Konten::with('Kategori')
        ->where('kategori_id', $kategori->id)
        ->where('status', 1)
        ->where('id', '!=', $konten->id)
        ->where('created_at', '>=', $oneMonthAgo)
        ->orderBy('views', 'desc')
        ->take(6)
        ->latest()
        ->get();

        return view('front/home/detail', compact('konten', 'kategori', 'trending'));
    }

}
