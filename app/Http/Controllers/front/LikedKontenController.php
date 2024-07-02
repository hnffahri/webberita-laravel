<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikedKontenController extends Controller
{
    public function likedKonten()
    {
        $user = Auth::user();
        $likedKonten = $user->likedKonten()->latest()->paginate(1);

        return view('front.likedkonten', compact('likedKonten'));
    }
}
