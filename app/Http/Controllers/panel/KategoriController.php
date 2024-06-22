<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\EditKategoriRequest;
use App\Http\Requests\panel\KategoriRequest;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("panel/kategori/index", [
            'kategori' => Kategori::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['nama']);

        kategori::create($data);
        return redirect('panel/kategori')->with('success', 'Data kategori berhasil ditambahkan');
    }


    public function edit(string $id)
    {
        return view("panel/kategori/edit", [
            'kategori' => Kategori::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(EditKategoriRequest $request, string $id)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['nama']);

        Kategori::where('id', $id)->update($data);
        return redirect('panel/kategori')->with('success', 'Data kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kategori::where('id', $id)->delete();
        return response()->json([
            'message' => 'Data kategori berhasil dihapus'
        ]);
    }
}
