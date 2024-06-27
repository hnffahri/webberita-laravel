<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Bantuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class BantuanController extends Controller
{

    public function index(){
        Carbon::setLocale('id');
        $oneMonthAgo = Carbon::now()->subMonth();

        $bantuan = Bantuan::latest()->paginate(9);

        return view('front/bantuan/index', compact('bantuan'));
    }

    public function detail($slug){
        
        Date::setLocale('id');
        Carbon::setLocale('id');
        
        $oneMonthAgo = Carbon::now()->subMonth();

        $bantuan = Bantuan::where('slug', $slug)->firstOrFail();
        
        $sessionKey = 'viewed_bantuan_' . $bantuan->id;

        if (!session()->has($sessionKey)) {
            $bantuan->views += 1;
            $bantuan->save();

            session()->put($sessionKey, true);
        }

        $bantuanlainnya = Bantuan::where('id', '!=', $bantuan->id)->take(6)->latest()->get();
        return view('front/bantuan/detail', compact('bantuan','bantuanlainnya'));
    }
}
