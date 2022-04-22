<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontController;
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
   Route::get('client/addproduct', [ClientController::class, 'create'])->name('client.product');
   Route::post('client/addproducts', [ProductController::class, 'store'])->name('client.addproducts');

   Route::get('client/addcategory', [ProductController::class, 'create'])->name('client.Category');
   Route::post('client/addcategories', [ProductController::class, 'category'])->name('client.addcategories');

   Route::get('dashboard', [ProductController::class, 'index'])->name('client.dashboard');
   Route::get('displaycategory', [ProductController::class, 'display'])->name('client.displaycategory');


 Route::get('frontpage', [FrontController::class, 'index'])->name('client.frontstore');
    // Route::get('/register-role','Admin/DashboardController@registered');
    Route::get('/register-role', 'App\Http\Controllers\Admin\DashboardController@registered');

});

Route::group(['middleware'=>['auth','admin']], function(){
    
    Route::get('/Admindashboard', function () {
        return view('admin.dashboard');
   });
   Route::get('Admindashboard', [AdminController::class, 'index'])->name('admin.dashboard');
   Route::get('admin/register', [AdminController::class, 'create'])->name('admin.register');
   Route::get('admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.editadmin');
   Route::post('/updateadmin/{id}', [AdminController::class, 'update'])->name('admin.updateadmin');
   Route::post('admin/registeradmin', [AdminController::class, 'store'])->name('admin.adminregister');
   Route::get('admin/{id}/deleteadmin', [AdminController::class, 'destroy']);

   Route::get('admin/displayclient', [ClientController::class, 'index'])->name('admin.displayclient');
    // Route::get('/register-role','Admin/DashboardController@registered');
    Route::get('/register-role', 'App\Http\Controllers\Admin\DashboardController@registered');

});
