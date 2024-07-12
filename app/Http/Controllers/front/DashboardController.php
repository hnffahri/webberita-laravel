<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $likedKonten = $user->likedKonten()->orderBy('likes.created_at', 'desc')->with('kategori')->take(5)->get();

        return view('front/dashboard', compact('likedKonten'));
    }
}
