<?php

use App\Http\Controllers\front\CariController;
use App\Http\Controllers\front\DashboardController as FrontDashboardController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\KategoriController as FrontKategoriController;
use App\Http\Controllers\panel\DashboardController;
use App\Http\Controllers\panel\FacebookPixelController;
use App\Http\Controllers\panel\GoogleAnalitycsController;
use App\Http\Controllers\panel\KategoriController;
use App\Http\Controllers\panel\KebijakanPrivasiController;
use App\Http\Controllers\panel\KontenController;
use App\Http\Controllers\panel\MasukController;
use App\Http\Controllers\panel\PasswordController;
use App\Http\Controllers\panel\PengaturanController;
use App\Http\Controllers\panel\PesanController;
use App\Http\Controllers\panel\SeoController;
use App\Http\Controllers\panel\SosmedController;
use App\Http\Controllers\panel\SyaratKetentuanController;
use App\Http\Controllers\panel\TentangController;
use App\Http\Controllers\panel\UserController;
use App\Http\Controllers\panel\ProfileController as PanelProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\panel\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Role
// Super Admin = 1
// Admin = 2

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'member',  'middleware' => ''], function(){

Route::prefix('panel')->group(function () {
    Route::middleware(['log.admin'])->group(function () {
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('login', [AuthController::class, 'adminpostlogin']);
    });
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
});


Route::middleware(['admin.auth'])->group(function () {
    Route::get('/panel', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/panel/konten', KontenController::class)->names('konten');
    Route::resource('/panel/kategori', KategoriController::class)->names('kategori')->only(['index', 'store', 'destroy']);
    Route::resource('/panel/user', UserController::class)->names('user');
    Route::get('/panel/pesan', [PesanController::class, 'index'])->name('pesan');
    Route::resource('/panel/statistik', DashboardController::class)->names('statistik');
    Route::resource('/panel/seo', SeoController::class)->names('seo')->only(['index', 'update']);
    Route::resource('/panel/google-analitycs', GoogleAnalitycsController::class)->names('google-analitycs')->only(['index', 'update']);
    Route::resource('/panel/facebook-pixel', FacebookPixelController::class)->names('facebook-pixel')->only(['index', 'update']);
    Route::resource('/panel/profile', PengaturanController::class)->names('profile')->only(['index', 'update']);
    Route::resource('/panel/syarat-ketentuan', SyaratKetentuanController::class)->names('syarat-ketentuan')->only(['index', 'update']);
    Route::resource('/panel/kebijakan-privasi', KebijakanPrivasiController::class)->names('kebijakan-privasi')->only(['index', 'update']);
    Route::resource('/panel/sosial-media', SosmedController::class)->names('sosial-media')->only(['index', 'update']);
    Route::resource('/panel/tentang', TentangController::class)->names('tentang')->only(['index', 'update']);
    Route::resource('/panel/profile', PanelProfileController::class)->names('profile')->only(['index', 'update']);
    Route::resource('/panel/password', PasswordController::class)->names('password')->only(['index', 'update']);
});

// Route::get('/panel/login', [MasukController::class, 'index'])->name('loginpanel');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [FrontDashboardController::class, 'index'])->name('dashboardmember');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

require __DIR__.'/auth.php';


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cari', [CariController::class, 'index'])->name('cari');
Route::get('/{slug}', [FrontKategoriController::class, 'index'])->name('listkategori');
Route::middleware(['web'])->group(function () {
    Route::get('/{slugKategori}/{slugKonten}', [FrontKategoriController::class, 'detail'])->name('konten-detail');
});