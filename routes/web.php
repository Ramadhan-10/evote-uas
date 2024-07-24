<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PaslonController;
use App\Http\Controllers\VoteController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/vote/hasil', [VoteController::class, 'results'])->name('hasil');
Route::get('/results/pdf', [VoteController::class, 'resultsPdf'])->name('results.pdf');
Route::get('/all-results/pdf', [VoteController::class, 'allResultsPdf'])->name('all-results.pdf');

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('voter.home');
    Route::get('/vote', [VoteController::class, 'index'])->name('voter.vote');
    Route::post('/vote/pilih', [VoteController::class, 'store'])->name('voter.store');
    Route::get('/showpaslon/{paslon}', [VoteController::class, 'show'])->name('paslon.show');
});
  
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    //paslon
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/datapaslon', [PaslonController::class, 'index'])->name('admin.paslon.index');
    Route::get('/admin/tambahpaslon', [PaslonController::class, 'create'])->name('admin.paslon.create');
    Route::post('/admin/paslon', [PaslonController::class, 'store'])->name('paslons.store');
    Route::get('/admin/editpaslon/{paslon}/edit', [PaslonController::class, 'edit'])->name('admin.paslon.edit');
    Route::put('/admin/editpaslon/{paslon}', [PaslonController::class, 'update'])->name('paslons.update');
    Route::get('/admin/showpaslon/{paslon}', [PaslonController::class, 'show'])->name('admin.paslon.show');
    Route::delete('/admin/hapuspaslon/{paslon}', [PaslonController::class, 'destroy'])->name('paslons.destroy');
    //kategori
    Route::get('/admin/datakategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/admin/tambahkategori', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('kategoris.store');
    Route::get('/admin/editkategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/admin/editkategori/{kategori}', [KategoriController::class, 'update'])->name('kategoris.update');
    Route::delete('/admin/hapuskategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategoris.destroy');
});
  
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});


