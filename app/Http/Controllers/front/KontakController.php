<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\KontakRequest;
use App\Models\Pesan;
use App\Models\Tentang;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('front/home/kontak',[
            'data' => Tentang::find(1)
        ]);
    }
    public function store(KontakRequest $request)
    {
        $data = $request->validated();
        Pesan::create($data);
        return redirect('kontak')->with('success', 'Kirim pesan berhasil');
    }
}
