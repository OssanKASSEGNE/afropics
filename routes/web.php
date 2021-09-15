<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionUserController;
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

//Guest

//Auth User  => front-end
Route::middleware(['guest'])->group(
    function () {

        Route::view('/', 'home')->name('home'); // Landing page

        Route::get('/login', [SessionUserController::class, 'index'])
            ->name('goLogin');

        Route::post('/login', [SessionUserController::class, 'login'])
            ->name('login');

        Route::get('/register', [SessionUserController::class, 'create'])
            ->name('goRegister');

        Route::post('/register', [SessionUserController::class, 'store'])
        
            ->name('register');
});

//Auth User  => front-end
Route::middleware(['auth'])->group(
    function () {

        Route::view('/dashboard', 'dashboard')->middleware('auth') //Dashboard
            ->name('dashboard');

        Route::post('/logout', [SessionUserController::class, 'destroy'])
            ->name('logout');
});

Route::post('/logout', [SessionUserController::class, 'destroy'])
    ->name('logout');

//Auth Admin => back-end
Route::get('/bo/users', [UserController::class,'index'])
                                ->name('bo.users.index');
Route::get('/bo/users/create', [UserController::class,'create'])
                                ->name('bo.users.create');
Route::post('/bo/users', [UserController::class,'store'])
                                ->name('bo.users.store');
Route::put('/bo/users/{user}', [UserController::class,'update'])
                                ->name('bo.users.update');   
Route::get('/bo/users/{user}', [UserController::class,'show'])
                                ->name('bo.users.show');  
Route::get('/bo/users/{user}/edit', [UserController::class,'edit'])
                                ->name('bo.users.edit'); 
Route::delete('/bo/users/{user}', [UserController::class,'destroy'])
                                ->name('bo.users.destroy'); 

