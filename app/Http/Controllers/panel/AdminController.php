<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\AdminRequest;
use App\Http\Requests\panel\EditAdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Admin::withCount('konten')->get();
        
        return view('panel.admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("panel/admin/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        
        // Buat username dari name
        $nameParts = explode(' ', $data['name']);
        $baseUsername = strtolower($nameParts[0]); // Menggunakan bagian pertama dari nama
        $username = $baseUsername;

        // Cek apakah username sudah ada dan buat yang unik
        $counter = 1;
        while (Admin::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        $data['role'] = 2;
        $data['username'] = $username;

        Admin::create($data);
        return redirect('panel/admin')->with('success', 'Akun admin berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("panel/admin/show",[
            'admin' => Admin::withCount('konten')->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("panel/admin/edit",[
            'admin' => Admin::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditAdminRequest $request, string $id)
    {
        $data = $request->validated();
        
        if ($request['form_type'] == 'form_password') {
            $admin = Admin::findOrFail($id);
            // Verifikasi password lama
            if (!Hash::check($request->password, $admin->password)) {
                return redirect()->back()->withErrors(['password' => 'Password lama tidak cocok']);
            }
            Admin::where('id', $id)->update([
                'password' => Hash::make($data['password_baru'])
            ]);
            return redirect()->back()->with('success', 'Password berhasil diubah');
        }else{
            Admin::where('id', $id)->update($data);
            return redirect()->back()->with('success', 'Data profile berhasil diubah');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the content by ID
        $admin = Admin::find($id);

        // Check if the content exists
        if (!$admin) {
            return response()->json([
                'message' => 'Data admin tidak ditemukan'
            ]);
        }

        // Paths to the image and video files
        $imgPath = public_path('images/admin/' . $admin->img);

        // Delete the image file if it exists
        if (File::exists($imgPath)) {
            File::delete($imgPath);
        }

        // Delete the content from the database
        $admin->delete();

        return response()->json([
            'message' => 'Akun admin berhasil dihapus'
        ]);
    }
}
