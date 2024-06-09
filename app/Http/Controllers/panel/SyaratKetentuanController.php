<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\SyaratKetentuanRequest;
use App\Models\Halaman;
use Illuminate\Http\Request;

class SyaratKetentuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel/halaman/syaratketentuan',[
            'data' => Halaman::find(1)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SyaratKetentuanRequest $request)
    {
        $data = $request->validated();
        $id = 1;

        Halaman::where('id', $id)->update($data);
        return redirect('panel/syarat-ketentuan')->with('success', 'Syarat ketentuan berhasil diubah');
    }
}
