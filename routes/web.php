<?php

use App\Http\Controllers\user\auth\LoginController;
use App\Http\Controllers\PorductsController;
use App\Http\Controllers\admin\auth\LoginController as AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthenticated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider wi thin a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/DashboardUser', function () {
    return view('layouts._app');
})->middleware(['is_user'])->name('login.user');

// ### user login

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'handleLogin'])->name('login');

// ## admin login 

Route::get('admin/login', [AdminLoginController::class, 'login'])->name('login.admin');

Route::post('admin/login', [AdminLoginController::class, 'handleLogin'])->name('login.admin');


// ###  product

Route::get('/product', [PorductsController::class, 'index'])->name('product.index');
Route::get('/Product/create', [PorductsController::class, 'create'])->name('product.create');
Route::post('/product/store', [PorductsController::class, 'store'])->name('product.store');
Route::get('/TableProduct/show', [PorductsController::class, 'show'])->name('product.show');

###  Edit product

Route::get('/product/{porducts}/edit', [PorductsController::class, 'edit'])->name('product.edit');
Route::put('/Product/{id}/update', [PorductsController::class, 'update'])->name('products.update');



Route::get('Product/{id}/delete', [PorductsController::class, 'destroy'])->name('Product.destroy');


// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//     Route::get('/login', [AdminAuthenticated::class, 'loginAdmin'])->name('adminLogin');
//     Route::post('/login', [AdminAuthenticated::class, 'LoginHandleAdmin'])->name('adminLoginPost');
 
//     Route::group(['middleware' => 'is_admin'], function () {
//         Route::get('/', function () {
//             return view('welcome');
//         })->name('adminDashboard');
 
//     });
// });



// Route::get('/homePage', function () {
//     return view('layouts._app');
// })->name('home.user');

// Route::get('/homePage', [LoginController::class, 'login'])->name('login');
// Route::get('/homePage', [LoginController::class, 'handleLogin'])->name('login.user');


require __DIR__.'/auth.php';
