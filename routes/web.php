<?php

use App\Http\Controllers\MainPageController;
use App\Http\Controllers\VocaController;
use App\Http\Controllers\WordController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', [MainPageController::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/', [MainPageController::class, 'index']);


Route::middleware(['auth:sanctum', 'verified'])->
    prefix('vocabulary') -> group(function () {
        Route::get('/', [MainPageController::class, 'index_my']);
        Route::get('/{id}', [MainPageController::class, 'index_words']);
    });



// api 서버
Route::middleware(['auth:sanctum', 'verified'])->
    prefix('api') -> group(function () {
        Route::prefix('vocabulary') -> group(function () {
            Route::get('/', [VocaController::class, 'index_my']);
            Route::post('/' , [VocaController::class, 'store']);
            Route::patch('/{id}', [VocaController::class, 'update']);
            Route::delete('/{id}', [VocaController::class, 'destroy']);
        });

        Route::prefix('words') -> group(function () {
           Route::post('/{voca_id}',[WordController::class, 'store']);
           Route::get('/{voca_id}', [WordController::class,'index']);
           Route::delete('/{word_id}', [WordController::class,'destroy']);
        });
    });
