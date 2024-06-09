<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
