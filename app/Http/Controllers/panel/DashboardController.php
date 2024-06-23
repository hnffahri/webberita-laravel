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
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function index(){
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(7);

        Carbon::setLocale('id');
        $oneMonthAgo = Carbon::now()->subMonth();

        // Mengambil data pengguna bulanan
        $year = date('Y');
        $data = DB::table('users')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as count'))
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('count', 'month')
            ->all();

        $monthlyUserData = array_fill(1, 12, 0);

        foreach ($data as $month => $count) {
            $monthlyUserData[$month] = $count;
        }

        return view("panel/dashboard/index", [
            'artikelCount' => Konten::count(),
            'kategoriCount' => Kategori::count(),
            'pesanCount' => Pesan::count(), // Asumsi ada model Pesan
            'memberCount' => User::count(), // Asumsi ada model Member

            'kontentrending' => Konten::with('Kategori')
            ->where('status', 1)
            ->where('created_at', '>=', $oneMonthAgo)
            ->orderBy('views', 'desc')
            ->take(6)
            ->latest()
            ->get(),

            'kategori' => Kategori::latest()->get(),
            'admin' => Admin::latest()->get(),
            'pesan' => Pesan::whereBetween('created_at', [$startDate, $endDate])->take(4)->get(),
            'monthlyUserData' => $monthlyUserData
        ]);
    }
}
