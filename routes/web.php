<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RegistrationStep2Controller;
use App\Http\Livewire\UserPagination;
use App\Http\Controllers\EmailCheckController;
use App\Http\Controllers\SubmitCheckController;

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
    return redirect('/registration');
});
Route::resource('users', UsersController::class);
Route::resource('registration', RegistrationController::class);
Route::resource('registration2', RegistrationStep2Controller::class);
Route::view('/admin', [Controller::class, 'admin']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::post('/emailCheck', EmailCheckController::class);
Route::post('/submitCheck', SubmitCheckController::class);