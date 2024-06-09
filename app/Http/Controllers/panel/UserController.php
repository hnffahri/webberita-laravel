<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\EditUserRequest;
use App\Http\Requests\panel\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("panel/user/index",[
            'data' => User::latest()->paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("panel/user/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['role'] = 2;

        User::create($data);
        return redirect('panel/user')->with('success', 'Akun user berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("panel/user/show",[
            'user' => User::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("panel/user/edit",[
            'user' => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditUserRequest $request, string $id)
    {
        $data = $request->validated();
        
        if ($request['form_type'] == 'form_password') {
            $user = User::findOrFail($id);
            // Verifikasi password lama
            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->withErrors(['password' => 'Password lama tidak cocok']);
            }
            User::where('id', $id)->update([
                'password' => Hash::make($data['password_baru'])
            ]);
            return redirect()->back()->with('success', 'Password berhasil diubah');
        }else{
            User::where('id', $id)->update($data);
            return redirect()->back()->with('success', 'Data profile berhasil diubah');
        }

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
