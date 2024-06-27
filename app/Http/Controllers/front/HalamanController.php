<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use App\Models\Tentang;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function kebijakanprivasi()
    {
        return view('front/home/kebijakanprivasi',[
            'data' => Halaman::find(1)
        ]);
    }
    public function syaratketentuan()
    {
        return view('front/home/syaratketentuan',[
            'data' => Halaman::find(1)
        ]);
    }
    public function tentang()
    {
        return view('front/home/tentang',[
            'data' => Tentang::find(1)
        ]);
    }
}
