<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Pesan;

class PesanController extends Controller
{
    public function index()
    {
        return view('panel/pesan/index',[
            'data' => Pesan::latest()->paginate(6)
        ]);
    }
}
