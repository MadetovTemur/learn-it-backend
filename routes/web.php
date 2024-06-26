<?php

use App\Http\Controllers\{ProfileController, SertificateController, 
        AdminController, SertificateDiscriptionsController,
        MainController};
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
    return redirect()->route('login');
    return view('welcome');
});

Route::get('/sertificate/{uuid}', [SertificateController::class, 'viewUser'])->name('sertificate');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [MainController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('sertificates', SertificateController::class);
    // Route::resource('discriptions', SertificateDiscriptionsController::class);
    Route::resource('admins', AdminController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
