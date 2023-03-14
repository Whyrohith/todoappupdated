<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoProfileController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoGroupController;

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




Route::get('/dashboard', function () {
    return redirect('/profile/'.auth()->user()->id);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile/{user}' , [TodoProfileController::class, 'index'])->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/p/create/{user}' , [TodoController::class, 'create'])->name('todo.create');
Route::get('/p/{todo}/{user}' , [TodoController::class, 'show'])->name('todo.show');
Route::post('/p' , [TodoController::class, 'store'])->name('todo.create');
Route::get('/p/{todo}/{user}/edit' , [TodoController::class, 'edit'])->name('todo.edit');
Route::patch('/p/{todo}/{user}' , [TodoController::class, 'update'])->name('todo.update');
Route::patch('/{user}/p/complete/{todo}' , [TodoController::class, 'updatestatus'])->name('todo.updatestatus');
Route::get('/{user}/delete/{todo}' , [TodoController::class, 'delete'])->name('todo.delete');


Route::get('/todogroup/{todogroup}/{user}' , [TodoGroupController::class, 'index'])->name('group.show');
Route::get('/t/create' , [TodoGroupController::class, 'create'])->name('group.create');
Route::post('/t' , [TodoGroupController::class, 'store'])->name('group.create');
Route::get('/t/{todogroup}/edit' , [TodoGroupController::class, 'edit'])->name('group.edit');
Route::patch('/t/complete/{todo}' , [TodoGroupController::class, 'updatestatus'])->name('group.updatestatus');
Route::get('/t/{todogroup}' , [TodoGroupController::class, 'delete'])->name('group.delete');



// Route::get('/dashboard/create' , [TodoController::class, 'create']);
// Route::get('/dashboard/create' , [TodoController::class, 'create']);


// Route::get('/profile/{$user}', [Todocontroller::class, 'index']);

// Route::get('/profile/{$user}', function($user_id) {
//     return view('dashboard');
// })->middleware(['auth' , 'verified'])->name('profile.show');




require __DIR__.'/auth.php';
