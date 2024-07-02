<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Konten;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function index(string $username){
        Carbon::setLocale('id');
        $oneMonthAgo = Carbon::now()->subMonth();
        $penulis = Admin::whereUsername($username)->withCount('konten')->firstOrFail();
        $konten = Konten::where('admin_id', $penulis->id)->latest()->paginate(4);

        return view('front/home/penulis', compact('penulis', 'konten'));
    }
}
