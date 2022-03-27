<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;

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


Route::get('auth/{provider}', [ProviderController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [ProviderController::class, 'handleProviderCallback']);

Route::get('registerRole', function(){
    return view('auth.registerRole');
})->name('registerRole');
Route::post('registerRole', [ProfileController::class, 'registerRole'])->name('registerRole');
Route::post('registerProvider', [ProfileController::class, 'providerRegister'])->name('registerProvider');


Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('dashboard');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/profile', [ProfileController::class,'show'])->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->get('/cv/show',function(){
    return view('editor');
})->name('cv.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/cv/api/info',[EditorController::class,'getInfo'])->name('cv.api.info');

Route::middleware(['auth:sanctum', 'verified'])->get('/profile/edit',[ProfileController::class,'edit'])->name('profile.edit');

Route::middleware(['auth:sanctum', 'verified'])->post('/profile/edit',[ProfileController::class,'update'])->name('profile.update');

