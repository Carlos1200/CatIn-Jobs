<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\JobsOffering;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;
use App\Http\Livewire\Create;
use App\Http\Livewire\Jobinfo;

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

Route::get('registerRole', function () {
    return view('auth.registerRole');
})->name('registerRole');
Route::post('registerRole', [ProfileController::class, 'registerRole'])->name('registerRole');
Route::post('registerProvider', [ProfileController::class, 'providerRegister'])->name('registerProvider');


Route::middleware(['auth:sanctum', 'verified'])->get('/home', [JobsOffering::class, 'getInfo'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/profile', [ProfileController::class, 'show'])->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->get('/cv/show', [EditorController::class, 'show'])->name('cv.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/publish/show', [JobsOffering::class, 'show'])->name('jobs.show');

Route::middleware(['auth:sanctum', 'verified'])->post('/publish/store', [JobsOffering::class, 'store'])->name('jobs.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/jobinfo/showDetails/{id}', [JobsOffering::class, 'showDetails'])->name('jobs.showDetails');

Route::middleware(['auth:sanctum', 'verified'])->get('/cv/api/info', [EditorController::class, 'getInfo'])->name('cv.api.info');

Route::middleware(['auth:sanctum', 'verified'])->post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');

Route::middleware(['auth:sanctum', 'verified'])->post('/cv/upload', [EditorController::class, 'uploadFile'])->name('cv.upload');

Route::middleware(['auth:sanctum', 'verified'])->post('/cv/download', [EditorController::class, 'downloadFile'])->name('cv.download');

Route::middleware(['auth:sanctum', 'verified'])->post('/cv/delete', [EditorController::class, 'deleteFile'])->name('cv.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::middleware(['auth:sanctum', 'verified'])->post('/profile/save', [JobsOffering::class, 'saveJob'])->name('profile.save');

Route::middleware(['auth:sanctum', 'verified'])->post('/profile/unsave', [JobsOffering::class, 'unsaveJob'])->name('profile.save.unsave');

Route::middleware(['auth:sanctum', 'verified'])->post('/jobinfo/upload', [Create::class, 'upload'])->name('jobinfo.upload');

Route::middleware(['auth:sanctum', 'verified'])->get('/jobs/show', [JobsOffering::class, 'showPublication'])->name('jobs.showPublication');

Route::middleware(['auth:sanctum', 'verified'])->post('/jobs/destroy/{id}', [JobsOffering::class, 'destroy'])->name('jobs.destroy');