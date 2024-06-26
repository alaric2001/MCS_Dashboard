<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MCSController;
use App\Http\Controllers\GangguanController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('tni.home');
// });





Route::middleware(['auth','user'])->group(function () {
    
    Route::get('/', [MCSController::class, 'home']);
    Route::get('/mcs-data', [MCSController::class, 'index']);
    Route::get('/gangguan', [GangguanController::class, 'index']);
    Route::post('/inputlaporan', [GangguanController::class, 'add']);
    Route::get('/delete_laporan/{id}', [GangguanController::class, 'destroy']);
    
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
