<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Carbon\Carbon;
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
        
        // Buat username dari name
        $nameParts = explode(' ', $googleUser->getName());
        $baseUsername = strtolower($nameParts[0]); // Menggunakan bagian pertama dari nama
        $username = $baseUsername;

        // Cek apakah username sudah ada dan buat yang unik
        $counter = 1;
        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        $user = User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'username' => $username,
            'password' => Hash::make('password'), // Buat password acak, tidak akan digunakan
            'notif' => 2,
            'email_verified_at' => Carbon::now(),
        ]);
    }

    // Masukkan pengguna ke dalam sesi
    Auth::login($user);

    return redirect()->route('dashboardmember');


    
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
