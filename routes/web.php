<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ClientController;

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

Route::group(['middleware'=>['auth','admin']], function(){
    
    Route::get('/dashboard', function () {
        return view('client.dashboard');
   });

    // Route::get('/register-role','Admin/DashboardController@registered');
    Route::get('/register-role', 'App\Http\Controllers\Admin\DashboardController@registered');

});

Route::group(['middleware'=>['auth','admin']], function(){
    
    Route::get('/Admindashboard', function () {
        return view('admin.dashboard');
   });
   Route::get('Admindashboard', [ClientController::class, 'index'])->name('admin.dashboard');
   Route::get('admin/register', [ClientController::class, 'create'])->name('admin.register');
   Route::post('admin/registeradmin', [ClientController::class, 'store'])->name('admin.adminregister');
    // Route::get('/register-role','Admin/DashboardController@registered');
    Route::get('/register-role', 'App\Http\Controllers\Admin\DashboardController@registered');

});
