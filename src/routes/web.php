<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// 一覧
Route::get('/products', [ProductController::class, 'index']);

// 詳細
Route::get('/products/detail/{product}', [ProductController::class, 'show']);

// 登録
Route::get('/products/register', [ProductController::class, 'create']);
Route::post('/products/register', [ProductController::class, 'store']);

// 編集
Route::get('/products/{product}/edit', [ProductController::class, 'edit']);

// 更新
Route::put('/products/{product}/update', [ProductController::class, 'update']);

// 削除
Route::delete('/products/{product}/delete', [ProductController::class, 'destroy']);