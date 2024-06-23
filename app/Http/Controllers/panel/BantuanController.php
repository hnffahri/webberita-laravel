<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\BantuanRequest;
use App\Http\Requests\panel\EditBantuanRequest;
use App\Models\Bantuan;
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

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bantuan = Bantuan::latest()->paginate(1);
        return view('panel.bantuan.index', compact('bantuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.bantuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BantuanRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('img')){
            $img_file = $request->file('img');
            $img_ekstensi = $img_file->extension();
            $img_nama = date('ymdhis') . "." . $img_ekstensi;
            $width = 800;
            ResizeImage($width, public_path('images/bantuan/'), $img_nama, $img_file);
            $data['img'] = $img_nama;
        }
        
        // $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['judul']);
        $data['views'] = 0;

        Bantuan::create($data);
        return redirect('panel/bantuan')->with('success', 'Data bantuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("panel/bantuan/show", [
            'bantuan' => Bantuan::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("panel/bantuan/edit", [
            'bantuan' => Bantuan::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditBantuanRequest $request, string $id)
    {
        $data = $request->validated();

        if($request->hasFile('img')){
            
            $img_file = $request->file('img');
            $img_ekstensi = $img_file->extension();
            $img_nama = date('ymdhis') . "." . $img_ekstensi;

            File::delete(public_path('images/bantuan/') . $request->oldimg);

            $width = 800;
            ResizeImage($width, public_path('images/bantuan/'), $img_nama, $img_file);

            $data['img'] = $img_nama;
        }

        $data['slug'] = Str::slug($data['judul']);

        Bantuan::where('id', $id)->update($data);
        return redirect('panel/bantuan')->with('success', 'Data bantuan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the content by ID
        $bantuan = Bantuan::find($id);

        // Check if the content exists
        if (!$bantuan) {
            return response()->json([
                'message' => 'Data bantuan tidak ditemukan'
            ]);
        }

        // Paths to the image and video files
        $imgPath = public_path('images/bantuan/' . $bantuan->img);

        // Delete the image file if it exists
        if (File::exists($imgPath)) {
            File::delete($imgPath);
        }

        // Delete the content from the database
        $bantuan->delete();

        return response()->json([
            'message' => 'Data bantuan berhasil dihapus'
        ]);
    }
}
