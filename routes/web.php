<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\MainPage;
use App\Livewire\NewsIndex;
use App\Livewire\TimetableShow;
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

Route::get('/', MainPage::class)->name('main');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/timetable', TimetableShow::class)->name('timetable.show');

Route::prefix('news')->group(function () {
    Route::get('/', NewsIndex::class)->name('news.index');
});

require_once __DIR__.'/auth.php';
