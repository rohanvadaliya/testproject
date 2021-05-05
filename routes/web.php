<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'verifyUser'])->name('loginCheck');

Route::post('/checklogin',[LoginController::class,'check']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/logout',function(){
    session()->forget('record');
    return redirect('/login');
});

Route::post('/checkregister',[RegisterController::class,'checkregister']);

Route::view('/Register', function(){
    if(session()->has('record'))
    {
        return redirect('/Dashboard');
    }
    return view('Register');
});

















// Route::middleware([Access::class])->group(function(){        // try but not work

//      Route::get('/Dashboard',[LoginController::class,'Dashboard']);
// });
