<?php

use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/dashboard', fn() => redirect()->route('admin.dashboard'))->name('dashboard');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

// Admin panel routes (Breeze auth protected)
Route::prefix('admin')->middleware(['auth', 'verified'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('skills', SkillController::class)->except(['show']);
    Route::resource('experiences', ExperienceController::class)->except(['show']);
    
    // Profile
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    
    // Messages
    Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
});

// Standard Breeze Profile (User Account)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
