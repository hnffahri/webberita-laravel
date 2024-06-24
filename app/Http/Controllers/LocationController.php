<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;

class LocationController extends Controller
{
    public function getProvinces()
    {
        $provinces = Province::select('code', 'name')->get();
        return response()->json($provinces);
    }

    public function getCities($province_code)
    {
        $cities = City::where('province_code', $province_code)->select('code', 'name')->get();
        return response()->json($cities);
    }
}