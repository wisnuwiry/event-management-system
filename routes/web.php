<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderSettingController;
use App\Http\Controllers\Admin\PartnerSettingController;
use App\Http\Controllers\Admin\JournalSettingController;
use App\Http\Controllers\Admin\BankSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicEventController;
use App\Http\Controllers\PublicDonationController;
use App\Http\Controllers\PublicNewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Event
Route::get('/events', [PublicEventController::class, 'index'])->name('events');
Route::get('/events/{slug}', [PublicEventController::class, 'detail'])->name('events.detail');

// News
Route::get('/news', [PublicNewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [PublicNewsController::class, 'detail'])->name('news.detail');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Event
    Route::post('/events/register/{id}', [PublicEventController::class, 'register'])->name('events.register');
    Route::get('/profile/events', [PublicEventController::class, 'myEvents'])->name('profile.events');

    // Donation
    Route::get('/donation', [PublicDonationController::class, 'create'])->name('donation');
    Route::post('/donation', [PublicDonationController::class, 'store'])->name('donation.store');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    // Redirect Default to Dashboard
    Route::redirect('/admin', '/admin/dashboard');

    // User Management
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin.users.detail');
    
    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

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
    Route::get('/admin/events/{id}', [EventController::class, 'detail'])->name('admin.events.detail');

    // Donations
    Route::get('admin/donations', [DonationController::class, 'index'])->name('admin.donations');
    Route::patch('admin/donations/{donation}/verify', [DonationController::class, 'verify'])->name('admin.donations.verify');
    Route::patch('admin/donations/{donation}/reject', [DonationController::class, 'reject'])->name('admin.donations.reject');
    // Route::delete('admin/donations/{donation}', [DonationController::class, 'destroy'])->name('admin.donations.destroy');
    Route::get('admin/donations/{id}', [DonationController::class, 'show'])->name('admin.donations.detail');

    // Settings
    Route::get('admin/settings', [SettingController::class, 'index'])->name('admin.settings');

    // Slider
    Route::get('admin/settings/slider', [SliderSettingController::class, 'index'])->name('admin.settings.slider');
    Route::post('admin/settings/slider', [SliderSettingController::class, 'store'])->name('admin.settings.slider.store');
    Route::delete('admin/settings/slider/{slider}', [SliderSettingController::class, 'destroy'])->name('admin.settings.slider.delete');

    // Partner
    Route::get('admin/settings/partner', [PartnerSettingController::class, 'index'])->name('admin.settings.partner.index');
    Route::get('admin/settings/partner/create', [PartnerSettingController::class, 'create'])->name('admin.settings.partner.create');
    Route::post('admin/settings/partner', [PartnerSettingController::class, 'store'])->name('admin.settings.partner.store');
    Route::delete('admin/settings/partner/{partner}', [PartnerSettingController::class, 'destroy'])->name('admin.settings.partner.delete');
    Route::get('admin/settings/partner/{partner}/edit', [PartnerSettingController::class, 'edit'])->name('admin.settings.partner.edit');
    Route::post('admin/settings/partner/{partner}/update', [PartnerSettingController::class, 'update'])->name('admin.settings.partner.update');

    // Journal
    Route::get('admin/settings/journal', [JournalSettingController::class, 'index'])->name('admin.settings.journal.index');
    Route::get('admin/settings/journal/create', [JournalSettingController::class, 'create'])->name('admin.settings.journal.create');
    Route::post('admin/settings/journal', [JournalSettingController::class, 'store'])->name('admin.settings.journal.store');
    Route::delete('admin/settings/journal/{journal}', [JournalSettingController::class, 'destroy'])->name('admin.settings.journal.delete');
    Route::get('admin/settings/journal/{journal}/edit', [JournalSettingController::class, 'edit'])->name('admin.settings.journal.edit');
    Route::post('admin/settings/journal/{journal}/update', [JournalSettingController::class, 'update'])->name('admin.settings.journal.update');

    // Bank
    Route::get('admin/settings/bank', [BankSettingController::class, 'index'])->name('admin.settings.bank.index');
    Route::get('admin/settings/bank/create', [BankSettingController::class, 'create'])->name('admin.settings.bank.create');
    Route::post('admin/settings/bank', [BankSettingController::class, 'store'])->name('admin.settings.bank.store');
    Route::delete('admin/settings/bank/{bank}', [BankSettingController::class, 'destroy'])->name('admin.settings.bank.delete');
    Route::get('admin/settings/bank/{bank}/edit', [BankSettingController::class, 'edit'])->name('admin.settings.bank.edit');
    Route::post('admin/settings/bank/{bank}/update', [BankSettingController::class, 'update'])->name('admin.settings.bank.update');
});

require __DIR__.'/auth.php';
