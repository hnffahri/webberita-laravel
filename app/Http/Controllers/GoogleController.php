<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

public function handleGoogleCallback()
{
    $googleUser = Socialite::driver('google')->user();
    $user = User::where('email', $googleUser->getEmail())->first();

    if (!$user) {
        // Jika belum ada akun dengan email ini, buat akun baru
        $user = User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => Hash::make('password'), // Buat password acak, tidak akan digunakan
        ]);
    }

    // Masukkan pengguna ke dalam sesi
    Auth::login($user);

    return redirect()->route('dashboard');


    
    // try {
    //     $googleUser = Socialite::driver('google')->user();

    //     $user = User::updateOrCreate([
    //         'email' => $googleUser->getEmail(),
    //     ], [
    //         'name' => $googleUser->getName(),
    //         'google_id' => $googleUser->getId(),
    //         'avatar' => '',
    //         'password' => Hash::make('password') // Anda dapat mengisi password dengan apa saja
    //     ]);

    //     Auth::login($user);

    //     return redirect()->intended('dashboard');
    // } catch (\Exception $e) {
    //     return redirect('/login')->withErrors('Failed to login with Google: ' . $e->getMessage());
    // }
}

}
