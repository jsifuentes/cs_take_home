<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
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

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect(route('products'));
    })->name('home');

    Route::get('/products', [ProductsController::class, 'list'])->name('products');
    Route::get('/inventory', [InventoryController::class, 'list'])->name('inventory');
});
