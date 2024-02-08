<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
//show all users
Route::get('/users', [UserController::class, 'index'])->name('users.index');

//create new user
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users',[UserController::class,'store'])->name('users.store');

//show user detail
Route::get('/user/{user}',[UserController::class,'show'])->where(['user' => '[0-9]{1,5}'])->name('users.show');

//edit user
Route::get('edit/{user}',[UserController::class,'edit'])->name('users.edit');

//submit update after edit
Route::post('update',[UserController::class,'update'])->name('users.update');

// Delete User
Route::delete('delete/{user}',[UserController::class,'delete'])->name('users.delete');

Route::fallback(function() {
    return 'Hm, why did you land here somehow?';
});