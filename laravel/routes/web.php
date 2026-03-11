<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

// #Home
Route::get('/', function () { return view('welcome'); });

// #LanguageSwitch
Route::get('lang/{lang}', [LanguageController::class, 'switch'])->name('lang.switch');

// #AuthenticatedGroup
Route::middleware(['auth'])->group(function () {
    
    // ڈیش بورڈ کو صرف ایک بار ڈیفائن کریں
    Route::get('/dashboard', [ServiceController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Resource (یہ تمام سروس روٹس جیسے index, create, store خود بنا لے گا)
    Route::resource('services', ServiceController::class);
});

require __DIR__.'/auth.php';