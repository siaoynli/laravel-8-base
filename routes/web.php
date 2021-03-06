<?php
/*
 * @Author: 西瓜哥
 * @Github: https://github.com/siaoynli
 * @LastEditors: 西瓜哥
 * @Date: 2021-07-09 10:31:54
 * @LastEditTime: 2021-07-20 09:30:19
 * @Description:
 * @Copyright: (c) 2021 http://www.hangzhou.com.cn All rights reserved
 */



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

Route::get('/', function () {
    return  version();
});


Route::post('/user', [\App\Http\Controllers\UserController::class],"create");
Route::get('/user',  [\App\Http\Controllers\UserController::class],"index");
Route::get('/user/show',  [\App\Http\Controllers\UserController::class],"show");

Route::get("/search",\App\Http\Controllers\SearchController::class);