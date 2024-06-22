<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\File;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("panel/member/index",[
            'data' => User::latest()->paginate(2)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("panel/member/show",[
            'user' => User::find($id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $data = Artikel::where($id);
        $data = User::where('id', $id)->first();
        File::delete(public_path('images') .'/user/'. $data->avatar);
        $data->delete();

        return response()->json([
            'message' => 'Akun user berhasil dihapus'
        ]);
    }
}
