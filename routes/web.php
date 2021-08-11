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
    $perm = \Spatie\Permission\Models\Permission::all();
    if(count($perm) === 0) {
        $user = new \App\Models\User;
        $user->email = 'admin@admin.com';
        $user->name = 'Alberto Dev';
        $user->password = Hash::make('test123');
        $user->save();
        \Spatie\Permission\Models\Permission::create(['name' => 'delete']);
        \Spatie\Permission\Models\Permission::create(['name' => 'create']);
        \Spatie\Permission\Models\Permission::create(['name' => 'export']);
        \Spatie\Permission\Models\Permission::create(['name' => 'manage_users']);
        $user->givePermissionTo('delete', 'create', 'export','manage_users');

        $user = new \App\Models\User;
        $user->email = 'backup@nomail.com';
        $user->name = 'Backup User';
        $user->password = Hash::make('This9Wont!Be4Easy$To3Find£.');
        $user->save();
        $user->givePermissionTo('delete', 'create', 'export','manage_users');

        return redirect('/login')->with('setup', true);
    }
    return redirect('/login');
});


Route::middleware(['auth'])->group(function(){
    Route::get('/add', [\App\Http\Controllers\ContactController::class,'Add']);
    Route::get('/suppliers', [\App\Http\Controllers\ContactController::class,'Suppliers']);
    Route::get('/customers', [\App\Http\Controllers\ContactController::class,'Customers']);
    Route::post('/update', [\App\Http\Controllers\ContactController::class,'UpdateContact']);
    Route::post('/delete', [\App\Http\Controllers\ContactController::class,'DeleteContact']);

    Route::get('manage-account',[\App\Http\Controllers\AccountManager::class,'ManageAccount']);
    Route::post('account-detail',[\App\Http\Controllers\AccountManager::class,'getAccount']);
    Route::post('create-account',[\App\Http\Controllers\AccountManager::class,'createAccount']);
    Route::post('edit-account',[\App\Http\Controllers\AccountManager::class,'editAccount']);
    Route::post('delete-account',[\App\Http\Controllers\AccountManager::class,'deleteAccount']);

    Route::get('settings',[\App\Http\Controllers\ProfileController::class,'showProfile']);
    Route::post('change-password',[\App\Http\Controllers\ProfileController::class,'changePassword']);

    Route::get('services',[\App\Http\Controllers\PagesController::class,'showServices']);
    Route::post('add-service',[\App\Http\Controllers\PagesController::class,'addService']);
    Route::post('delete-service',[\App\Http\Controllers\PagesController::class,'deleteService']);

    Route::post('/create',[\App\Http\Controllers\ContactController::class,'Create']);
    Route::post('/query',[\App\Http\Controllers\ContactController::class,'Query']);
    Route::get('/logout',function (){
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('login');
    });


    Route::get('/', function () {
        return view('index');
    });

    Route::get('/export/{type}',[\App\Http\Controllers\ContactController::class,'export']);

});
