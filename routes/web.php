<?php

use App\Http\Controllers\front\BantuanController as FrontBantuanController;
use App\Http\Controllers\front\CariController;
use App\Http\Controllers\front\CommentController;
use App\Http\Controllers\front\DashboardController as FrontDashboardController;
use App\Http\Controllers\front\HalamanController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\KategoriController as FrontKategoriController;
use App\Http\Controllers\front\KontakController;
use App\Http\Controllers\front\LikeController;
use App\Http\Controllers\front\LikedKontenController;
use App\Http\Controllers\front\PenulisController;
use App\Http\Controllers\front\TrendingController;
use App\Http\Controllers\panel\BantuanController;
use App\Http\Controllers\panel\DashboardController;
use App\Http\Controllers\panel\FacebookPixelController;
use App\Http\Controllers\panel\GoogleAnalyticsController;
use App\Http\Controllers\panel\KategoriController;
use App\Http\Controllers\panel\KebijakanPrivasiController;
use App\Http\Controllers\panel\KontenController;
use App\Http\Controllers\panel\PasswordController;
use App\Http\Controllers\panel\PesanController;
use App\Http\Controllers\panel\SeoController;
use App\Http\Controllers\panel\SosmedController;
use App\Http\Controllers\panel\SyaratKetentuanController;
use App\Http\Controllers\panel\TentangController;
use App\Http\Controllers\panel\MemberController;
use App\Http\Controllers\panel\ProfileController as PanelProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\panel\AdminController;
use App\Http\Controllers\panel\AuthController;
use App\Http\Controllers\panel\TimController;

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

Route::get('/provinces', [LocationController::class, 'getProvinces']);
Route::get('/cities/{province_id}', [LocationController::class, 'getCities']);


Route::middleware(['admin.auth'])->group(function () {
    Route::get('/panel', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/panel/konten', KontenController::class)->names('konten');
    Route::get('/konten/search', [KontenController::class, 'search'])->name('konten.search');
    Route::resource('/panel/kategori', KategoriController::class)->names('kategori');
    Route::resource('/panel/member', MemberController::class)->names('member');
    Route::resource('/panel/admin', AdminController::class)->names('admin');
    Route::get('/panel/pesan', [PesanController::class, 'index'])->name('pesan');
    Route::resource('/panel/seo', SeoController::class)->names('seo')->only(['index', 'update']);
    Route::resource('/panel/google-analytics', GoogleAnalyticsController::class)->names('google-analytics')->only(['index', 'update']);
    Route::resource('/panel/facebook-pixel', FacebookPixelController::class)->names('facebook-pixel')->only(['index', 'update']);
    Route::resource('/panel/syarat-ketentuan', SyaratKetentuanController::class)->names('syarat-ketentuan')->only(['index', 'update']);
    Route::resource('/panel/kebijakan-privasi', KebijakanPrivasiController::class)->names('kebijakan-privasi')->only(['index', 'update']);
    Route::resource('/panel/sosial-media', SosmedController::class)->names('sosial-media')->only(['index', 'update']);
    Route::resource('/panel/tentang', TentangController::class)->names('tentang')->only(['index', 'update']);
    Route::resource('/panel/profile', PanelProfileController::class)->names('profile')->only(['index', 'update']);
    Route::resource('/panel/password', PasswordController::class)->names('password')->only(['index', 'update']);
    Route::resource('/panel/bantuan', BantuanController::class)->names('bantuan');
    Route::resource('/panel/tim', TimController::class)->names('tim');
});

// Route::get('/panel/login', [MasukController::class, 'index'])->name('loginpanel');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth','verified')->group(function () {
    Route::get('/liked-konten', [LikedKontenController::class, 'likedKonten'])->name('likedKonten');

    Route::get('/dashboard', [FrontDashboardController::class, 'index'])->name('dashboardmember');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

require __DIR__.'/auth.php';

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/tentang', [HalamanController::class, 'tentang'])->name('fronttentang');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
Route::get('/kebijakan-privasi', [HalamanController::class, 'kebijakanprivasi'])->name('kebijakanprivasi');
Route::get('/syarat-ketentuan', [HalamanController::class, 'syaratketentuan'])->name('syaratketentuan');
Route::get('/bantuan', [FrontBantuanController::class, 'index'])->name('frontbantuan');
Route::get('/bantuan/{slug}', [FrontBantuanController::class, 'detail'])->name('detailbantuan');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cari', [CariController::class, 'index'])->name('cari');
Route::get('/trending', [TrendingController::class, 'index'])->name('trending');
Route::get('/penulis/{username}', [PenulisController::class, 'index'])->name('penulis');
Route::get('/{slug}', [FrontKategoriController::class, 'index'])->name('listkategori');
Route::middleware(['web'])->group(function () {
    Route::get('/{slugKategori}/{slugKonten}', [FrontKategoriController::class, 'detail'])->name('konten-detail');
});

Route::post('/konten/{id}/like', [LikeController::class, 'likeKonten'])->middleware('throttle:10,1')->name('konten.like');
Route::post('/konten/{id}/unlike', [LikeController::class, 'unlikeKonten'])->middleware('throttle:10,1')->name('konten.unlike');
// Middleware throttle:10,1 akan membatasi 10 permintaan per menit untuk setiap IP.

// Route::post('/konten/{id}/comment', [CommentController::class, 'store'])->name('comment.store');