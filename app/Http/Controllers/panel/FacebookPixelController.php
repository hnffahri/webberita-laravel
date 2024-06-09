<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\FbPixelRequest;
use App\Models\Plugin;

class FacebookPixelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel/plugin/facebookpixel',[
            'fbpixel' => Plugin::find(1)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FbPixelRequest $request)
    {
        $data = $request->validated();
        $id = 1;

        Plugin::where('id', $id)->update($data);
        return redirect('panel/facebook-pixel')->with('success', 'Link facebook pixel berhasil diubah');
    }
}
