<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('private', \App\Http\Controllers\PrivatelistController::class);
    
    Route::resource('users', \App\Http\Controllers\UsersController::class);

    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
    
    Route::post('/autocomplete/fetch', [App\Http\Controllers\AutocompleteController::class, 'fetchGenre']);
    
    Route::get('public', [\App\Http\Controllers\PubliclistController::class, 'index'])->name('public');
    Route::get('public/{public}', [\App\Http\Controllers\PubliclistController::class, 'show'])->name('show');
});