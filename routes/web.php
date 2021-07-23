<?php

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


Route::get('test', function () {
    $user = new \App\Models\User;
    $user->email = 'admin@admin.com';
    $user->name = 'Alberto Dev';
    $user->password = Hash::make('test123');
    $user->save();
});


Route::middleware(['auth'])->group(function(){
    Route::get('/add', [\App\Http\Controllers\ContactController::class,'Add']);
    Route::get('/suppliers', [\App\Http\Controllers\ContactController::class,'Suppliers']);
    Route::get('/customers', [\App\Http\Controllers\ContactController::class,'Customers']);
    Route::post('/update', [\App\Http\Controllers\ContactController::class,'UpdateContact']);
    Route::post('/delete', [\App\Http\Controllers\ContactController::class,'DeleteContact']);

    Route::get('manage-account',[\App\Http\Controllers\AccountManager::class,'ManageAccount']);
    Route::post('account-detail',[\App\Http\Controllers\AccountManager::class,'getAccount']);

    Route::post('/create',[\App\Http\Controllers\ContactController::class,'Create']);
    Route::post('/query',[\App\Http\Controllers\ContactController::class,'Query']);
    Route::get('/logout',function (){
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('login');
    });
    Route::get('/', function () {
        return view('index');
    });
});
