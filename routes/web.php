<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
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

Route::redirect('/', '/login', 301);

Auth::routes();

// admin
Route::middleware('auth')->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('users',UserController::class);
    Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
    Route::post('/profile',[ProfileController::class,'update'])->name('profile.update');
});
