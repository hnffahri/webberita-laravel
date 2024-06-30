<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\TentangRequest;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel/tentang/index',[
            'data' => Tentang::find(1)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TentangRequest $request)
    {
        $data = $request->validated();
        $id = 1;

        if($request->hasFile('logo')){
            $logo_file = $request->file('logo');
            $logo_ekstensi = $logo_file->extension();
            $logo_nama = date('ymdhis') . "." . $logo_ekstensi;
            $logo_file->move(public_path('images/'), $logo_nama);
            $width = 400;
            ResizeImage($width, public_path('images/'), $logo_nama, $logo_file);
            // sudah ter upload dir
            
            File::delete(public_path('images/') . $request->oldlogo);
            
            $data['logo'] = $logo_nama;
        }
        
        if($request->hasFile('img')){
            $img_file = $request->file('img');
            $img_ekstensi = $img_file->extension();
            $img_nama = date('ymdhis') . "." . $img_ekstensi;
            $img_file->move(public_path('images/'), $img_nama);
            $width = 800;
            ResizeImage($width, public_path('images/'), $img_nama, $img_file);
            // sudah ter upload dir
            
            File::delete(public_path('images/') . $request->oldimg);
            
            $data['img'] = $img_nama;
        }
        
        if($request->hasFile('imgvisi')){
            $imgvisi_file = $request->file('imgvisi');
            $imgvisi_ekstensi = $imgvisi_file->extension();
            $imgvisi_nama = date('ymdhis') . "." . $imgvisi_ekstensi;
            $imgvisi_file->move(public_path('images/'), $imgvisi_nama);
            $width = 800;
            ResizeImage($width, public_path('images/'), $imgvisi_nama, $imgvisi_file);
            // sudah ter upload dir
            
            File::delete(public_path('images/') . $request->oldimgvisi);
            
            $data['imgvisi'] = $imgvisi_nama;
        }
        
        if($request->hasFile('imgmisi')){
            $imgmisi_file = $request->file('imgmisi');
            $imgmisi_ekstensi = $imgmisi_file->extension();
            $imgmisi_nama = date('ymdhis') . "." . $imgmisi_ekstensi;
            $imgmisi_file->move(public_path('images/'), $imgmisi_nama);
            $width = 400;
            ResizeImage($width, public_path('images/'), $imgmisi_nama, $imgmisi_file);
            // sudah ter upload dir
            
            File::delete(public_path('images/') . $request->oldimgmisi);
            
            $data['imgmisi'] = $imgmisi_nama;
        }

        Tentang::where('id', $id)->update($data);
        return redirect('panel/tentang')->with('success', 'Tentang kami berhasil diubah');
    }
}
