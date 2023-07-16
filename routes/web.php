<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CFGController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\SecretMailboxController;

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

Route::get('/', [AuthenticationController::class, 'index'])->name('login');
Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/register', [AuthenticationController::class, 'registerPost'])->name('registerPost');
Route::post('/login', [AuthenticationController::class, 'loginPost'])->name('loginPost');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthenticationController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => 'secretMailbox'], function(){
    Route::get('/', [SecretMailboxController::class, 'index'])->name('sm.list');
    Route::get('/view', [SecretMailboxController::class, 'view'])->name('sm.view');
    Route::get('/create', [SecretMailboxController::class, 'create'])->name('sm.create');
    Route::post('/createPost', [SecretMailboxController::class, 'createPost'])->name('sm.createPost');
    Route::post('/replyPost', [SecretMailboxController::class, 'replyPost'])->name('sm.replyPost');
    Route::post('/updateStatusPost', [SecretMailboxController::class, 'updateStatusPost'])->name('sm.updateStatusPost');
});

Route::group(['prefix' => 'cfg'], function() {

});
