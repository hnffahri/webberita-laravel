<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('front.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        
        if($request->hasFile('avatar')){
            $avatar_file = $request->file('avatar');
            $avatar_ekstensi = $avatar_file->extension();
            $avatar_nama = date('ymdhis') . "." . $avatar_ekstensi;
            $avatar_file->move(public_path('images/member/'), $avatar_nama);

            $id = Auth::user()->id;
            $oldavatar = User::where('id', $id)->first();
            File::delete(public_path('images/member') .'/'. $oldavatar->avatar);
            
            $request->user()->avatar = $avatar_nama;
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->notif = $request->has('notif') ? 2 : 1;

        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', 'Profile berhasil di ubah');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
