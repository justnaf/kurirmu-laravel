<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// USER DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard.user');
})->middleware(['auth', 'user'])->name('user');

// ADMIN DASHBOARD
Route::get('/admindash', function () {
    return view('dashboard.admin');
})->middleware(['auth', 'admin'])->name('admindash');

Route::prefix('user')->middleware(['auth','user'])->group(function(){
     Route::get('/dashboard', function () {return view('tes');});
});

Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
     Route::resource('pengguna', PenggunaController::class);
     Route::resource('data', DataController::class);
     Route::resource('entry', EntryController::class);
     Route::get('/dashboard', [DashController::class,'index'])->name('admindash');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
