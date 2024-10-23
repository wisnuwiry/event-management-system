<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// TODO: adjust middleware admin
Route::middleware(['auth', 'verified'])->group(function () {
    // Redirect Default to Dashboard
    Route::redirect('/admin', '/admin/dashboard');

    // User Management
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    
    // Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // News
    Route::get('/admin/news', [NewsController::class, 'index'])->name('admin.news');

    // Events
    Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events');

    // Donations
    Route::get('/admin/donations', function () {
        return view('admin.donations.index');
    })->name('admin.donations');

    // Route::resource('admin/events', EventController::class);
    // Route::resource('admin/news', NewsController::class);

    // Route::get('admin/donations', [DonationController::class, 'index'])->name('admin.donations.index');
    // Route::patch('admin/donations/{donation}/verify', [DonationController::class, 'verify'])->name('admin.donations.verify');
    // Route::delete('admin/donations/{donation}', [DonationController::class, 'destroy'])->name('admin.donations.destroy');
    // Route::get('admin/donations/{donation}', [DonationController::class, 'show'])->name('admin.donations.show');
});

require __DIR__.'/auth.php';
