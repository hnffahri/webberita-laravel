<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\SosmedRequest;
use App\Models\Sosmed;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel/sosmed/index',[
            'sosmed' => Sosmed::find(1)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SosmedRequest $request)
    {
        $data = $request->validated();
        $id = 1;

        Sosmed::where('id', $id)->update($data);
        return redirect('panel/sosial-media')->with('success', 'Data sosmed berhasil diubah');
    }
}
