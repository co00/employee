<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/profile', [App\Http\Controllers\ProfileContoller::class, 'index'])->name('edit');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/add', [UserController::class, 'add']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);
Route::post('/user/addsalary', [UserController::class, 'addsalary']);
Route::post('userstore', [UserController::class, 'store'])->name('user.store');
Route::post('user', [UserController::class, 'update'])->name('user.update');

Route::get('/user/showsalary/{id}', [UserController::class, 'showsalary']);



// Resource Route for article.
Route::resource('users', UserController::class);
// Route for get articles for yajra post request.
Route::get('users-datatable', [UserController::class, 'datatable'])->name('users-datatable');

Route::get('salary-datatable/{id}', [UserController::class, 'salary_datatable'])->name('salary-datatable');
