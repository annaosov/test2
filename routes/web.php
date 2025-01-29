<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
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

/* Выдача списка товаров */
Route::get('/catalog', [ProductController::class, 'index']);

/* Выдача по id заказа товаров и их кол-ва, резервирование товара из заказа*/
Route::get(' /create-order/{order_id}', [OrderController::class, 'create']);

/* Выдача по id заказа товаров и их кол-ва, резервирование товара из заказа*/
Route::get(' /approve-order/{order_id}', [OrderController::class, 'approve']);

