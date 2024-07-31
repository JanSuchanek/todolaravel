<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CustomAuthController;


Route::middleware(['auth', 'auth.session'])->group(function () {
	Route::get('/', [TodoController::class, 'index']);
	Route::get('create', [TodoController::class, 'create']);
	Route::get('edit/{todo}', [TodoController::class, 'edit']);
	Route::post('update/{todo}', [TodoController::class, 'update']);
	Route::get('delete/{todo}', [TodoController::class, 'delete']);
	Route::post('store-data', [TodoController::class, 'store']);
	Route::get('details/{todo}', [TodoController::class, 'details']);
});


//Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');