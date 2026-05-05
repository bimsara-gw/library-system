<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Livewire Components
use App\Livewire\Book\Index as BookIndex;
use App\Livewire\Book\Create as BookCreate;
use App\Livewire\Book\Edit as BookEdit;
use App\Livewire\Book\Show as BookShow;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// AUTH GROUP
Route::middleware('auth')->group(function () {

    // 👤 Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('books')->group(function () {

        Route::get('/', BookIndex::class)->name('books.index');
        Route::get('/create', BookCreate::class)->name('books.create');
        Route::get('/edit/{id}', BookEdit::class)->name('books.edit');
        Route::get('/show/{id}', BookShow::class)->name('books.show');

    });

});

require __DIR__.'/auth.php';