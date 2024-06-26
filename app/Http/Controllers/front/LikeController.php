<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    
    public function likeKonten($id)
    {
        $konten = Konten::findOrFail($id);
        $userId = Auth::id();

        // Periksa apakah pengguna sudah memberikan like
        if (!$konten->likes->contains('user_id', $userId)) {
            $like = new Like();
            $like->user_id = $userId;
            $like->konten_id = $konten->id;
            $like->save();
        }

        $likes_count = $konten->likes()->count(); // Menghitung kembali jumlah likes

        return response()->json(['success' => true, 'likes_count' => $likes_count]);
    }

    public function unlikeKonten($id)
    {
        $konten = Konten::findOrFail($id);
        $userId = Auth::id();

        // Periksa apakah pengguna sudah memberikan like
        $like = Like::where('user_id', $userId)->where('konten_id', $konten->id)->first();
        if ($like) {
            $like->delete();
        }

        $likes_count = $konten->likes()->count(); // Menghitung kembali jumlah likes

        return response()->json(['success' => true, 'likes_count' => $likes_count]);
    }
}
