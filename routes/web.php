<?php

use App\Http\Controllers\Formcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sessioncontroller;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\logcontroller;
use App\Http\Middleware\sessionmiddleware;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/logcheck/{num1}/{num2}', [logcontroller::class, 'index']);
Route::get('/form', [Formcontroller::class, 'index'])->name('form.get');
Route::post('/formhandle', [Formcontroller::class, 'show'])->name('form.post');

Route::get('/article/{id?}', [ArticleController::class, 'index']);
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/sessionput/{name}/{email}', [SessionController::class, 'sessionput'])->middleware(['throttle:5,1'])->name('sessionput');
;
Route::get("/sessionpull", [sessioncontroller::class, 'sessionpull'])->name('sessionpull');
Route::get("/sessionget", [sessioncontroller::class, 'sessionget'])->name('sessionget');
Route::get("/sessionforget", [sessioncontroller::class, 'sessionforget'])->name('sessionforget');
Route::get("/sessionflush", [sessioncontroller::class, 'sessionflush'])->name('sessionflush');
require __DIR__.'/auth.php';
