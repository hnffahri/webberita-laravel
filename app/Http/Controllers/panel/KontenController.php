<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\EditKontenRequest;
use App\Http\Requests\panel\KontenRequest;
use App\Models\Konten;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

function ResizeImage($dst_width, $vdir_upload, $img_name ,$source_img){

    //direktori gambar
    $vfile_upload = $vdir_upload . $img_name;

    //Simpan gambar dalam ukuran sebenarnya
    move_uploaded_file($source_img, $vfile_upload);

    //identitas file asli
    $info = getimagesize($vfile_upload);
    if ($info['mime'] == 'image/jpeg') $im_src = imagecreatefromjpeg($vfile_upload);
    // elseif ($info['mime'] == 'image/jpg') $im_src = imagecreatefromjpg($vfile_upload);
    elseif ($info['mime'] == 'image/png') $im_src = imagecreatefrompng($vfile_upload);

    $src_width = imageSX($im_src);
    $src_height = imageSY($im_src);

    //Simpan dalam versi medium 320 pixel
    //set ukuran gambar hasil perubahan
    $dst_height = ($dst_width/$src_width)*$src_height;

    //proses perubahan ukuran
    $im = imagecreatetruecolor($dst_width,$dst_height);
    imagealphablending($im , false);
    imagesavealpha($im , true);
    imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
    
    //Simpan gambar
    imagealphablending($im , false);
    imagesavealpha($im , true);

    $info = getimagesize($vfile_upload);
    if ($info['mime'] == 'image/jpeg') imagejpeg($im,$vdir_upload . $img_name);
    // elseif ($info['mime'] == 'image/jpg') imagejpg($im,$vdir_upload . $img_name);
    elseif ($info['mime'] == 'image/png') imagepng($im,$vdir_upload . $img_name);
    // imagejpeg($im,$vdir_upload . "medium_" . $img_name);

    imagedestroy($im_src);
    imagedestroy($im);
}

class KontenController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("panel/konten/index", [
            'konten' => Konten::with('Kategori')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("panel/konten/create", [
            'kategori' => Kategori::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KontenRequest $request)
    {
        $data = $request->validated();

        if ($data['type'] == 2) {
            $vidio_file = $request->file('vidio');
            $vidio_ekstensi = $vidio_file->extension();
            $vidio_nama = date('ymdhis') . "." . $vidio_ekstensi;
            $vidio_file->move(public_path('vidio/konten'), $vidio_nama);
            $data['vidio'] = $vidio_nama;
        }
        
        if($request->hasFile('img')){
            $img_file = $request->file('img');
            $img_ekstensi = $img_file->extension();
            $img_nama = date('ymdhis') . "." . $img_ekstensi;
            $width = 800;
            $img_file->move(public_path('images/konten'), $img_nama);
            // ResizeImage($width, public_path('images/konten/'), $img_nama, $img_file);
            $data['img'] = $img_nama;
        }
        
        // $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['judul']);
        $data['views'] = 0;

        Konten::create($data);
        return redirect('panel/konten')->with('success', 'Data konten berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("panel/konten/show", [
            'konten' => Konten::with('Kategori')->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("panel/konten/edit", [
            'konten' => Konten::find($id),
            'kategori' => Kategori::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditKontenRequest $request, string $id)
    {
        $data = $request->validated();
        
        if ($data['type'] == 2) {
            if ($request->hasFile('vidio')){
                $vidio_file = $request->file('vidio');
                $vidio_ekstensi = $vidio_file->extension();
                $vidio_nama = date('ymdhis') . "." . $vidio_ekstensi;
                $vidio_file->move(public_path('vidio/konten'), $vidio_nama);
                
                File::delete(public_path('vidio/konten/') . $request->oldvidio);
                
                $data['vidio'] = $vidio_nama;
            }
        }

        if($request->hasFile('img')){
            
            $img_file = $request->file('img');
            $img_ekstensi = $img_file->extension();
            $img_nama = date('ymdhis') . "." . $img_ekstensi;

            File::delete(public_path('images/konten/') . $request->oldimg);

            $width = 800;
            ResizeImage($width, public_path('images/konten/'), $img_nama, $img_file);

            $data['img'] = $img_nama;
        }

        $data['slug'] = Str::slug($data['judul']);

        Konten::where('id', $id)->update($data);
        return redirect('panel/konten')->with('success', 'Data konten berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
