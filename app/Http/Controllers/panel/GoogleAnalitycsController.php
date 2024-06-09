<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\GoogleAnalitycsRequest;
use App\Models\Plugin;
use Illuminate\Http\Request;

class GoogleAnalitycsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel/plugin/googleanalitycs',[
            'gganalitycs' => Plugin::find(1)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GoogleAnalitycsRequest $request)
    {
        $data = $request->validated();
        $id = 1;

        Plugin::where('id', $id)->update($data);
        return redirect('panel/google-analitycs')->with('success', 'Link google analitycs berhasil diubah');
    }
}
