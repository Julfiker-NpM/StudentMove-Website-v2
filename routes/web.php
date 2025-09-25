<?php

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
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/subscription', function () {
    return view('subscription');
})->name('subscription');

Route::get('/notifications', function () {
    return view('notifications');
})->name('notifications');

Route::get('/messages', [App\Http\Controllers\ContactController::class, 'index'])->name('messages');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

Route::get('/offers', function () {
    return view('offers');
})->name('offers');

Route::get('/next-bus-arrival', function () {
    return view('next-bus-arrival');
})->name('next-bus-arrival');

Route::get('/route-suggestion', function () {
    return view('route-suggestion');
})->name('route-suggestion');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';