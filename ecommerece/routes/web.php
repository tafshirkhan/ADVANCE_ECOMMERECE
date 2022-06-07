<?php

use App\Models\User;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
    Route::get('/login',[AdminController::class,'loginform']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');

});

//for admin guard
Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('Admin.admin_index');
    })->name('dashboard');
});

//Admin routes;
Route::get('admin/logout',[AdminController::class,'destroy'])->name('admin.logout');

//Admin Profile
Route::get('admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');

Route::get('admin/editprofile',[AdminProfileController::class,'AdminEditProfile'])->name('admin.editprofile');

Route::post('admin/changesprofile',[AdminProfileController::class,'AdminChangesProfile'])->name('admin.changesprofile');

Route::get('admin/password',[AdminProfileController::class,'AdminPassword'])->name('admin.password');

Route::post('admin/changespassword',[AdminProfileController::class,'AdminChangesPassword'])->name('admin.changespassword');







//User

//for user guard
Route::middleware([
    'auth:sanctum,user',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
         $data = Auth::user()->id;
         $user = User::find($data);
        return view('dashboard',compact('user'));
    })->name('dashboard');
});

//HOME ROUTE
Route::get('/',[IndexController::class,'ViewIndexPage']);

//USER logout
Route::get('user/logout',[IndexController::class,'UserLogout'])->name('user.logout');

Route::get('user/profile',[IndexController::class,'UserProfile'])->name('user.profile');

Route::post('user/updateprofile',[IndexController::class,'UserUpdateProfile'])->name('user.updateprofile');

Route::get('user/password',[IndexController::class,'UserPassword'])->name('user.password');

Route::post('user/updatepassword',[IndexController::class,'UserUpdatePassword'])->name('user.updatepassword');







































//admin guard
/*Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//user guard
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
