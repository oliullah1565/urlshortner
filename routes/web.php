<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\UrlController;
use App\Models\Urlinfos;
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
    $urls = Urlinfos::all(); 
    
  
    return view('welcome', compact('urls'));
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/urls', [UrlController::class, 'index'])->name('urls.index');
    Route::get('/urls/create', [UrlController::class, 'create'])->name('urls.create');
    Route::post('/urls', [UrlController::class, 'store'])->name('urls.store');

    Route::get('/urls/edit/{url}', [UrlController::class, 'edit'])->name('urls.edit');
    Route::put('/urls/update/{url}', [UrlController::class, 'update'])->name('urls.update');
    Route::delete('/urls/{id}', [UrlController::class, 'destroy'])->name('urls.destroy');

   
   
});



require __DIR__.'/auth.php';

Route::get('/{url}', [UrlController::class, 'golink'])->name('urls.golink');


