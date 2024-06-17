<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\GoogleAnalyticsRequest;
use App\Models\Plugin;
use Illuminate\Http\Request;

class GoogleAnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel/plugin/googleanalytics',[
            'gganalytics' => Plugin::find(1)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GoogleAnalyticsRequest $request)
    {
        $data = $request->validated();
        $id = 1;

        Plugin::where('id', $id)->update($data);
        return redirect('panel/google-analytics')->with('success', 'Link google analytics berhasil diubah');
    }
}
