<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    function index(){
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(7);
        return view('panel/dashboard/index',[
            'pesan' => Pesan::whereBetween('created_at', [$startDate, $endDate])->take(4)->get()
        ]);
    }
}
