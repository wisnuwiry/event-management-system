<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicEventController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Event
Route::get('/events', [PublicEventController::class, 'index'])->name('events');
Route::get('/events/{slug}', [PublicEventController::class, 'detail'])->name('events.detail');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Event
    Route::post('/events/register/{id}', [PublicEventController::class, 'register'])->name('events.register');
    Route::get('/profile/events', [ProfileController::class, 'edit'])->name('profile.events');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
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
    Route::get('/admin/news/new', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::delete('/admin/news/{id}/delete', [NewsController::class, 'destroy'])->name('admin.news.delete');
    Route::post('/admin/news/{id}/update', [NewsController::class, 'update'])->name('admin.news.update');

    // Events
    Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events');
    Route::get('/admin/events/new', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('/admin/events', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('/admin/events/{id}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::delete('/admin/events/{id}/delete', [EventController::class, 'destroy'])->name('admin.events.delete');
    Route::post('/admin/events/{id}/update', [EventController::class, 'update'])->name('admin.events.update');


    // Donations
    Route::get('/admin/donations', function () {
        return view('admin.donations.index');
    })->name('admin.donations');


    // Route::get('admin/donations', [DonationController::class, 'index'])->name('admin.donations.index');
    // Route::patch('admin/donations/{donation}/verify', [DonationController::class, 'verify'])->name('admin.donations.verify');
    // Route::delete('admin/donations/{donation}', [DonationController::class, 'destroy'])->name('admin.donations.destroy');
    // Route::get('admin/donations/{donation}', [DonationController::class, 'show'])->name('admin.donations.show');
});

require __DIR__.'/auth.php';
