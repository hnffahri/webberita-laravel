<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\PasswordRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("panel/password/index");
    }

    public function update(PasswordRequest $request)
    {
        $data = $request->validated();
        
        $id = Auth::guard('admin')->user()->id;
        $user = Admin::findOrFail($id);

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Password lama tidak cocok']);
        }
        Admin::where('id', $id)->update([
            'password' => Hash::make($data['password_baru'])
        ]);
        return redirect()->back()->with('success', 'Password berhasil diubah');
    }
}
