<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\SettingsController;

use App\Http\Controllers\RoleController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserDetailsController;

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
    return redirect('login');
});



Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/myapps', function () {
   try {
      echo '<br>init migrate...';
      Artisan::call('migrate');
      echo 'done migrate';

      echo '<br>done with app tables migrations';

    } catch (Exception $e) {
      Response::make($e->getMessage(), 500);
    }
});

#Settings

Route::get('manage-roles',[RoleController::class,'viewroles']);

Route::post('/roles_store', [RoleController::class, 'roles_store'])->name('roles.store');

Route::post('/user_update', [RoleController::class, 'user_update'])->name('user.update');

Route::get('/get-user/{id}', [RoleController::class, 'get_user'])->name('roles.destroy');

Route::get('/user_destroy/{id}', [RoleController::class, 'user_destroy'])->name('user.destroy');

Route::get('/roles_destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

Route::post('/permissions_store', [RoleController::class, 'permissions_store'])->name('permissions.store');

#Setting Routes Begins Here

Route::get('dropdown-settings',[SettingsController::class,'dropdownsettings']);

Route::post('store-dropdowns',[SettingsController::class,'storedropdowns']);

Route::get('delete-dropdown/{id}',[SettingsController::class,'drop_delete']);

Route::get('getdropdowns', [SettingsController::class, 'dropdownsindex'])->name('dropdowns.index');


Route::get('get-column/{id}',[SettingsController::class,'getcolumns']);

Route::get('create-req',[SettingsController::class,'req_create']);

Route::post('store-req',[SettingsController::class,'req_store']);

Route::get('get_req/{id}',[SettingsController::class,'get_req']);

Route::get('delete-req/{id}',[SettingsController::class,'req_delete']);

#Details Routes
Route::get('/employment', function () {
  return view('employment');
});

Route::get('/userDetails/{userId}', [UserDetailsController::class, 'getUserBasicDeitails']);

// Route::get('/createBasicDetails', [UserDetailsController::class, 'createBasicDetails']);
// Route::post('/', [UserDetailsController::class, 'storeBasicDetails']);


// Route::get('/createcontactDetails', [UserDetailsController::class, 'createcontactDetails']);
// Route::post('/', [UserDetailsController::class, 'storeContactDetails']);