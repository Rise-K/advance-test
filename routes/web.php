<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

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

Route::get('/content', [ContentController::class, 'index']);
Route::post('/content', [ContentController::class, 'post']);
Route::get('/content/confirm', [ContentController::class, 'confirm']);
Route::post('/content/confirm', [ContentController::class, 'send']);
Route::get('/content/thanks', [ContentController::class, 'thanks']);
Route::get('/content/admin', [ContentController::class, 'admin']);
Route::post('/content/admin', [ContentController::class, 'admin']);
Route::post('/content/delete/{id}', [ContentController::class, 'delete']);
