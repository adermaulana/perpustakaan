<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FISController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RaporController;

//Models
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TesMinatController;
use App\Http\Controllers\HalamanTesController;
use App\Http\Controllers\PernyataanController;
use App\Http\Controllers\UserPesertaController;

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
    return view('index',[
        'title' => 'Perpustakaan Sekolah XX',
        'active' => 'home',
    ]);
});


Route::get('/dashboard', function () {

    return view('dashboard.index',[
        'title' => 'Admin Perpustakaan Sekolah XX'
    ]);
})->middleware('auth');

//Login
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);
