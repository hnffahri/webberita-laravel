<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\EditTimRequest;
use App\Http\Requests\panel\TimRequest;
use App\Models\Tim;
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

class TimController extends Controller
{
    public function index()
    {
        return view("panel/tim/index", [
            'data' => Tim::latest()->paginate(6)
        ]);
    }

    public function create()
    {
        return view("panel/tim/create");
    }
    
    public function store(TimRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('avatar')){
            $avatar_file = $request->file('avatar');
            $avatar_ekstensi = $avatar_file->extension();
            $avatar_nama = date('ymdhis') . "." . $avatar_ekstensi;
            $width = 400;
            ResizeImage($width, public_path('images/tim/'), $avatar_nama, $avatar_file);
            $data['avatar'] = $avatar_nama;
        }
        
        Tim::create($data);
        return redirect('panel/tim')->with('success', 'Data tim berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("panel/tim/show", [
            'tim' => Tim::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("panel/tim/edit", [
            'tim' => Tim::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditTimRequest $request, string $id)
    {
        $data = $request->validated();

        if($request->hasFile('avatar')){
            
            $avatar_file = $request->file('avatar');
            $avatar_ekstensi = $avatar_file->extension();
            $avatar_nama = date('ymdhis') . "." . $avatar_ekstensi;

            File::delete(public_path('images/tim/') . $request->oldavatar);

            $width = 400;
            ResizeImage($width, public_path('images/tim/'), $avatar_nama, $avatar_file);

            $data['avatar'] = $avatar_nama;
        }

        Tim::where('id', $id)->update($data);
        return redirect('panel/tim')->with('success', 'Data tim berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the content by ID
        $tim = Tim::find($id);

        // Check if the content exists
        if (!$tim) {
            return response()->json([
                'message' => 'Data tim tidak ditemukan'
            ]);
        }

        // Paths to the image and video files
        $avatarPath = public_path('images/tim/' . $tim->avatar);

        // Delete the image file if it exists
        if (File::exists($avatarPath)) {
            File::delete($avatarPath);
        }

        // Delete the content from the database
        $tim->delete();

        return response()->json([
            'message' => 'Data tim berhasil dihapus'
        ]);
    }
}
