<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoryController;
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
    // Libro::create(
    //     ['title' => "Coco", 'description' => "Hola mundo", "age" => 7]
    // );

    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'dashboard', 'namespace' => '', 'middleware' => 'auth'], function () {
    Route::resource('libro',LibroController::class);
    Route::resource('category', CategoryController::class);
});

//nameespace donde se ubica las clases
