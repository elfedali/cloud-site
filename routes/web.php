<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [\App\Http\Controllers\HelloController::class, 'index'])->name('hello');

// term
Route::match(['get'], '/user/all', [\App\Http\Controllers\HelloController::class, 'index']);

Route::match(['get'], '/user/{id}', [\App\Http\Controllers\HelloController::class, 'show'])
    ->name('user.show')
    ->where('id', '[0-9]+');

Route::get('/user/{name?}', function ($name = 'abdessamad') {
    return response()->json([
        'name' => $name
    ]);
})
    ->name('user')
    ->where('name', '[a-zA-Z]+');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
