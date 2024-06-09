<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\SeoRequest;
use App\Models\Seo;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel/seo/index',[
            'seo' => Seo::find(1)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeoRequest $request)
    {
        $data = $request->validated();
        $id = 1;

        Seo::where('id', $id)->update($data);
        return redirect('panel/seo')->with('success', 'Data seo berhasil diubah');
    }
}
