<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StudentController::class, 'index']);
Route::post('/', [StudentController::class, 'index']);
Route::post('/create', [StudentController::class, 'create']);

Route::get('/edit/{id}', [StudentController::class, 'edit']);
Route::post('/edit/{id}', [StudentController::class, 'edit']);

Route::get('/sort', [StudentController::class, 'sort']);

