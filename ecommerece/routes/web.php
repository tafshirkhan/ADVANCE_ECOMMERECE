<?php

use App\Models\User;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;


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


//BRANDS
Route::prefix('brand')->group(function(){
Route::get('/viewallbrands',[BrandController::class,'ViewAllBrands'])->name('all.brands');

Route::get('/addnewbrands',[BrandController::class,'AddBrands'])->name('add.newbrands');

Route::post('/brandstore',[BrandController::class,'StoreBrand'])->name('brand.store');

Route::get('/brandedit/{id}',[BrandController::class,'EditBrand'])->name('brand.edit');

//Route::post('/brandupdate/{id}',[BrandController::class,'BrandUpdate'])->name('brand.update');
//OR
Route::post('/brandupdate',[BrandController::class,'BrandUpdate'])->name('brand.update');

Route::get('/branddelete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');
});


//CATEGORY
Route::prefix('category')->group(function(){
Route::get('/viewallcategory',[CategoryController::class,'ViewAllCategory'])->name('all.category');

Route::get('/addnewcategory',[CategoryController::class,'AddCategory'])->name('add.newcategory');

Route::post('/categorystore',[CategoryController::class,'StoreCategory'])->name('category.store');

Route::get('/categoryedit/{id}',[CategoryController::class,'EditCategory'])->name('category.edit');

//Route::post('/brandupdate/{id}',[CategoryController::class,'BrandUpdate'])->name('brand.update');
//OR

Route::post('/categoryupdate',[CategoryController::class,'CategoryUpdate'])->name('category.update');

Route::get('/categorydelete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');


//SUB CATEGORY
Route::get('/viewall/subcategory',[SubCategoryController::class,'ViewAllSubCategory'])->name('all.subcategory');

Route::get('/addnew/subcategory',[SubCategoryController::class,'AddSubCategory'])->name('add.subcategory');

Route::post('/subcategorystore',[SubCategoryController::class,'StoreSubCategory'])->name('subcategory.store');

Route::get('/subcategoryedit/{id}',[SubCategoryController::class,'EditSubCategory'])->name('subcategory.edit');

Route::post('/subcategoryupdate',[SubCategoryController::class,'SubCategoryUpdate'])->name('subcategory.update');

Route::get('/subcategorydelete/{id}',[SubCategoryController::class,'SubCategoryDelete'])->name('subcategory.delete');

//SUB SUBCATEGORY
Route::get('/sub/viewall/sub_category',[SubCategoryController::class,'ViewAllSub_Category'])->name('all.sub_category');

Route::get('/addnew/sub/subcategory',[SubCategoryController::class,'AddSub_SubCategory'])->name('add.sub_category');

//this route is for ajax which is from add sub_subcategory file
Route::get('/subcategory/ajax/{category_id}',[SubCategoryController::class,'GetSubCategory']);

//this route is for ajax which is from add product file for getting the sub_subcategory field automatically

Route::get('/sub_subcategory/ajax/{subcategory_id}',[SubCategoryController::class,'GetSub_SubCategory']);


Route::post('/sub/subcategorystore',[SubCategoryController::class,'Sub_SubCategoryStore'])->name('sub_subcategory.store');

Route::get('/sub/subcategoryedit/{id}',[SubCategoryController::class,'EditSub_SubCategory'])->name('sub_subcategory.edit');

Route::post('/sub/subcategoryupdate',[SubCategoryController::class,'Sub_SubCategoryUpdate'])->name('sub_subcategory.update');

Route::get('/sub/subcategorydelete/{id}',[SubCategoryController::class,'Sub_SubCategoryDelete'])->name('sub_subcategory.delete');

//
});

//PRODUCT
Route::prefix('product')->group(function(){
 Route::get('/allproduct',[ProductController::class,'AllProducts'])->name('all.products');

 Route::get('/addproduct',[ProductController::class,'AddProducts'])->name('add.product');

 Route::post('/storeproduct',[ProductController::class,'StoreProduct'])->name('store.product');

 Route::get('/manageproduct',[ProductController::class,'ManageProducts'])->name('manage.product');

 Route::get('/editproduct/{id}',[ProductController::class,'EditProducts'])->name('product.edit');

 Route::post('/updateproduct',[ProductController::class, 'UpdateProduct'])->name('update.product');

 Route::post('/update/multiimage',[ProductController::class, 'UpdateProductMultiImage'])->name('productupdate.multiimage');

 Route::post('/update/thumbimage',[ProductController::class, 'UpdateProductThumbImage'])->name('productupdate.thumb');

 Route::get('/deleteproduct/multiimage/{id}',[ProductController::class,'DeleteProductMultiImage'])->name('deleteproduct.multiimage');

 Route::get('/inactive/{id}',[ProductController::class,'ProductInactive'])->name('product.inactive');

 Route::get('/active/{id}',[ProductController::class,'ProductActive'])->name('product.active');

 Route::get('/delete/{id}',[ProductController::class,'DeleteProducts'])->name('product.delete');

 //all.sliders
});



//SLIDERS
Route::prefix('slider')->group(function(){

 Route::get('/allsliders',[SliderController::class,'AllSliders'])->name('all.sliders');

 Route::get('/addslider',[SliderController::class,'AddSlider'])->name('add.slider');

 Route::post('/storeslider',[SliderController::class,'StoreSlider'])->name('slider.store');

 Route::get('/manageproduct',[ProductController::class,'ManageProducts'])->name('manage.product');

 Route::get('/editproduct/{id}',[ProductController::class,'EditProducts'])->name('product.edit');

 Route::post('/updateproduct',[ProductController::class, 'UpdateProduct'])->name('update.product');

 Route::post('/update/multiimage',[ProductController::class, 'UpdateProductMultiImage'])->name('productupdate.multiimage');

 Route::post('/update/thumbimage',[ProductController::class, 'UpdateProductThumbImage'])->name('productupdate.thumb');

 Route::get('/deleteproduct/multiimage/{id}',[ProductController::class,'DeleteProductMultiImage'])->name('deleteproduct.multiimage');

 Route::get('/inactive/{id}',[ProductController::class,'ProductInactive'])->name('product.inactive');

 Route::get('/active/{id}',[ProductController::class,'ProductActive'])->name('product.active');

 Route::get('/delete/{id}',[ProductController::class,'DeleteProducts'])->name('product.delete');

 //
});




































//admin guard
/*Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//user guard
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
