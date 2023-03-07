<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoProfileController;
use App\Http\Controllers\TodoController;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});



Route::get('/profile/{user}' , [TodoProfileController::class, 'index'])->name('profile.show');
Route::get('/p/create' , [TodoController::class, 'create'])->name('todo.create');
Route::post('/p' , [TodoController::class, 'store'])->name('post');
// Route::get('/dashboard/create' , [TodoController::class, 'create']);
// Route::get('/dashboard/create' , [TodoController::class, 'create']);


// Route::get('/profile/{$user}', [Todocontroller::class, 'index']);

// Route::get('/profile/{$user}', function($user_id) {
//     return view('dashboard');
// })->middleware(['auth' , 'verified'])->name('profile.show');




require __DIR__.'/auth.php';