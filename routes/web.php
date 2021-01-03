<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Middleware\ApiHits;

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

Route::prefix('api')->middleware([ApiHits::class])->group(function(){
	Route::get('news', [ApiController::class, 'index']);
	Route::get('tags', [ApiController::class, 'tags']);
	Route::get('stats', [ApiController::class, 'stat']);
});

Route::get('go/{id}', [ApiController::class, 'goto']);