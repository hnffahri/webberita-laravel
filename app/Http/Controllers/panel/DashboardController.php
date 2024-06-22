<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Kategori;
use App\Models\Konten;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    function index(){
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(7);

        return view("panel/dashboard/index", [
            'artikelCount' => Konten::count(),
            'kategoriCount' => Kategori::count(),
            'pesanCount' => Pesan::count(), // Asumsi ada model Pesan
            'memberCount' => User::count(), // Asumsi ada model Member

            'konten' => Konten::with('Kategori')->latest()->get(),
            'kategori' => Kategori::latest()->get(),
            'admin' => Admin::latest()->get(),
            'pesan' => Pesan::whereBetween('created_at', [$startDate, $endDate])->take(4)->get()
        ]);
    }
}
