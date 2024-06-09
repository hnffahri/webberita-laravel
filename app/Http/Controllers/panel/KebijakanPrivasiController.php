<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\KebijakanPrivasiRequest;
use App\Models\Halaman;
use Illuminate\Http\Request;

class KebijakanPrivasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel/halaman/kebijakanprivasi',[
            'data' => Halaman::find(1)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KebijakanPrivasiRequest $request)
    {
        $data = $request->validated();
        $id = 1;

        Halaman::where('id', $id)->update($data);
        return redirect('panel/kebijakan-privasi')->with('success', 'Kebijakan privasi berhasil diubah');
    }
}
