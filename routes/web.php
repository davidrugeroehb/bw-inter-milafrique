<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NieuwsController;
use App\Http\Controllers\ContactController;

Route::get('/', [NieuwsController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/nieuws', [NieuwsController::class, 'admin'])->name('admin.nieuws.index');
    Route::get('/admin/nieuws/create', [NieuwsController::class, 'create'])->name('admin.nieuws.create');
    Route::post('/admin/nieuws', [NieuwsController::class, 'store'])->name('admin.nieuws.store');
    Route::get('/admin/nieuws/{nieuws}/edit', [NieuwsController::class, 'edit'])->name('admin.nieuws.edit');
    Route::put('/admin/nieuws/{nieuws}', [NieuwsController::class, 'update'])->name('admin.nieuws.update');
    Route::delete('/admin/nieuws/{nieuws}', [NieuwsController::class, 'destroy'])->name('admin.nieuws.destroy');
    Route::resource('admin/categories', \App\Http\Controllers\Admin\CategoryController::class)->names('admin.categories');
    Route::resource('admin/faqs', \App\Http\Controllers\Admin\FaqController::class)->names('admin.faqs');
});

Route::get('/faq', [\App\Http\Controllers\FaqController::class, 'index'])->name('faq');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/details', [ProfileController::class, 'editDetails'])->name('profile.edit.details');
    Route::post('/profile/details', [ProfileController::class, 'updateDetails'])->name('profile.update.details');

Route::get('/admin/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
Route::post('/admin/users/{user}/toggle-admin', [\App\Http\Controllers\Admin\UserController::class, 'toggleAdmin'])->name('admin.users.toggle-admin');
Route::delete('/admin/users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
});
Route::get('/speler/{user}', [ProfileController::class, 'show'])->name('profile.show');

require __DIR__.'/auth.php';
