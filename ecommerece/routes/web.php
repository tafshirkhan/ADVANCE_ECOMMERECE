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
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\MyCartPageController;
use App\Http\Controllers\Backend\CuponController;
use App\Http\Controllers\Backend\AreaOfShippingController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\CashonController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\Backend\OrderController;



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

Route::middleware(['auth:admin'])->group(function(){

//for admin guard
Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('Admin.admin_index');
    })->name('dashboard')->middleware('auth:admin');
});

//Admin routes;
Route::get('admin/logout',[AdminController::class,'destroy'])->name('admin.logout');

//Admin Profile
Route::get('admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');

Route::get('admin/editprofile',[AdminProfileController::class,'AdminEditProfile'])->name('admin.editprofile');

Route::post('admin/changesprofile',[AdminProfileController::class,'AdminChangesProfile'])->name('admin.changesprofile');

Route::get('admin/password',[AdminProfileController::class,'AdminPassword'])->name('admin.password');

Route::post('admin/changespassword',[AdminProfileController::class,'AdminChangesPassword'])->name('admin.changespassword');

});





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

 Route::get('/editslider/{id}',[SliderController::class,'EditSlider'])->name('slider.edit');

 Route::post('/updateslider',[SliderController::class, 'UpdateSlider'])->name('slider.update');

 Route::get('/deleteslider/{id}',[SliderController::class,'DeleteSlider'])->name('slider.delete');

 Route::get('/inactive/{id}',[SliderController::class,'SliderInactive'])->name('slider.inactive');

 Route::get('/active/{id}',[SliderController::class,'SliderActive'])->name('slider.active');

 Route::get('/delete/{id}',[ProductController::class,'DeleteProducts'])->name('product.delete');

 //
});

//Frontend Product Details Page 
Route::get('/product/details_info/{id}/{slug}',[IndexController::class,'ProductDetails_info']);

//Frontend Product Tag Page 
Route::get('/product/tag/{tags}',[IndexController::class,'ProductTagWise']);

//Sub category wise product:
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class,'SubCategoryWiseProduct']);

//Sub category wise product:
Route::get('/sub_subcategory/product/{sub_subcat_id}/{slug}', [IndexController::class,'Sub_SubCategoryWiseProduct']);

//Product modal view with ajax
Route::get('/product/view/modal/{id}', [IndexController::class,'ProductViewAjax']);

////////////

//Add to cart option
Route::post('/addcart/data/store/{id}', [CartController::class,'AddToCart']);

//Mini cart product option
Route::get('/product/mini/cart', [CartController::class,'AddToMiniCart']);

//For remove product from Mini cart
Route::get('/minicart/remove_product/{rowId}', [CartController::class,'RemoveFromMiniCart']);

//Add to WISH LIST
Route::post('/addto/wishlist/{product_id}', [CartController::class,'AddToWishlist']);


Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'User'],
function(){
    //Load Wishlist view page
    Route::get('/wishlist', [WishlistController::class,'WishlistView'])->name('wishlist');

    //Get all the Wishlist product
    Route::get('/get/wishlist_product', [WishlistController::class,'GetWishlistProduct']);

    //Remove product from the Wishlist
    Route::get('/wishlist/remove_product/{id}', [WishlistController::class,'RemoveWishlistProduct']); 
    //Stripe payment
    Route::post('/stripe/payment', [StripeController::class,'StripePaymentOrder'])->name('stripe.payment');
    //Order placed
    Route::get('/order/placed', [AllUserController::class,'PlacedOrders'])->name('order.placed'); 
    //view order details
    Route::get('/order_details/{order_id}', [AllUserController::class,'OrderDetails']); 

    //Cash payment
    Route::post('/cash/payment', [CashonController::class,'CashonPaymentOrder'])->name('cash.payment');
    
    //Download Invoice
    Route::get('/download_invoice/{order_id}',[AllUserController::class, 'DownloadInvoice']);
    
    //Return order
    Route::post('/return/order/{order_id}', [AllUserController::class,'ReturnOrder'])->name('return.order');

    //Return order list
    Route::get('/return/order/list', [AllUserController::class,'ReturnOrderList'])->name('returnorder.list');

    //Cancel order list
    Route::get('/cancel/order/list', [AllUserController::class,'CancelOrderList'])->name('cancelorder.list');

});


///////MY CART ALL ROUTES ///////
//My Cart
Route::get('/mycart', [MyCartPageController::class,'MyCartView'])->name('mycart');

//Get my cart product.
Route::get('/user/get/mycart_product', [MyCartPageController::class,'GetMyCartProduct']);
    
//Remove from my cart.
Route::get('/user/mycart/remove/{rowId}', [MyCartPageController::class,'RemoveMyCartProduct']);
    
//Increment my cart.
Route::get('/cart/increment/{rowId}', [MyCartPageController::class,'CartIncrement']);

//Decrement my cart.
Route::get('/cart/decrement/{rowId}', [MyCartPageController::class,'CartDecrement']);


//CUPONS
Route::prefix('cupon')->group(function(){

//Coupons view page
Route::get('/all/coupons',[CuponController::class,'ViewAllCupons'])->name('all.coupons');

//Add new Coupons 
Route::get('/add/coupons',[CuponController::class,'AddNewCupons'])->name('add.coupons');

//Store Coupon
Route::post('/store/coupon',[CuponController::class, 'StoreCoupon'])->name('store.coupon');

//Add new Coupons 
Route::get('/edit/coupons/{id}',[CuponController::class,'EditCoupons'])->name('edit.coupons');

//Update Coupon
Route::post('/update/coupon/{id}',[CuponController::class, 'UpdateCoupon'])->name('update.coupon');

//Delete Coupons 
Route::get('/delete/coupons/{id}',[CuponController::class,'DeleteCoupons'])->name('delete.coupons');
});


//Area of shipping
Route::prefix('shipping')->group(function(){

//////DIVISION////

//All division view page
Route::get('/all/division',[AreaOfShippingController::class,'ViewAllDivision'])->name('all.division');

//Add new division
Route::get('/add/division',[AreaOfShippingController::class,'AddNewDivision'])->name('add.division');

//Store Division
Route::post('/store/division',[AreaOfShippingController::class, 'StoreDivision'])->name('store.division');

//Edit division 
Route::get('/edit/division/{id}',[AreaOfShippingController::class,'EditDivision'])->name('edit.division');

//Update division
Route::post('/update/division/{id}',[AreaOfShippingController::class, 'UpdateDivision'])->name('update.division');

//Delete division
Route::get('/delete/division/{id}',[AreaOfShippingController::class,'DeleteDivision'])->name('delete.division');


//////DISTRICT////

//All division view page 
Route::get('/all/district',[AreaOfShippingController::class,'ViewAllDistrict'])->name('all.district');

//Add new district
Route::get('/add/district',[AreaOfShippingController::class,'AddNewDistrict'])->name('add.district');

//Store district
Route::post('/store/district',[AreaOfShippingController::class, 'StoreDistrict'])->name('store.district');

//Edit district
Route::get('/edit/district/{id}',[AreaOfShippingController::class,'EditDistrict'])->name('edit.district');

//Update district
Route::post('/update/district/{id}',[AreaOfShippingController::class, 'UpdateDistrict'])->name('update.district');

//Delete district
Route::get('/delete/district/{id}',[AreaOfShippingController::class,'DeleteDistrict'])->name('delete.district');

//////STATES////

//All states view page 
Route::get('/all/states',[AreaOfShippingController::class,'ViewAllStates'])->name('all.states');

//Add new state
Route::get('/add/state',[AreaOfShippingController::class,'AddNewState'])->name('add.state');

//Store district
Route::post('/store/state',[AreaOfShippingController::class, 'StoreState'])->name('store.state');

//Edit state
Route::get('/edit/state/{id}',[AreaOfShippingController::class,'EditState'])->name('edit.state');

//Update state
Route::post('/update/state/{id}',[AreaOfShippingController::class, 'UpdateState'])->name('update.state');

//Delete state
Route::get('/delete/state/{id}',[AreaOfShippingController::class,'DeleteState'])->name('delete.state');

//this route is for ajax which is from add addnewstate file for getting the district field automatically whileselect any division
Route::get('/division/district/ajax/{division_id}',[AreaOfShippingController::class,'GetAllDistrict']);

});

////FOR FRONTEND APPLY COUPON////
Route::post('/applycoupon',[CartController::class,'ApplyCoupon']);

//For calculating coupon amount
Route::get('/calculated/coupon/amount',[CartController::class,'CalculatingCouponAmount']);

//For removing applied coupon
Route::get('/remove/coupon',[CartController::class,'RemoveCoupon']);

//CHECKOUT OPTION ROUTE//
Route::get('/checkout',[CartController::class,'CreateCheckout'])->name('checkout');

//FOR GETTING ALL THE DISTRICT WHILE SELECTS ANY DIVISION
Route::get('/getalldistrict/ajax/{division_id}',[CheckoutController::class,'GetAllTheDistrict']);

//FOR GETTING ALL THE STATE WHILE SELECTS ANY DISTRICT
Route::get('/district/getallstate/ajax/{district_id}',[CheckoutController::class,'GetAllTheState']);

//STORE THE CHECKOUT INFORMATION
Route::post('/checkout/store',[CheckoutController::class,'StoreCheckoutInformation'])->name('checkoutstore');



//Admin manage all orders
Route::prefix('admin-orders')->group(function(){
    //All the pending orders
    Route::get('/pending/orders',[OrderController::class,'PendingOrders'])->name('pending.orders');
    
    //Pending order details
    Route::get('/pendingorder/details/{order_id}',[OrderController::class,'PendingOrderDetails'])->name('pendingorder.details');
    
    //Confirm orders
    Route::get('/confirm/orders',[OrderController::class,'ConfirmOrders'])->name('confirm.orders');
    
    //Process orders
    Route::get('/process/orders',[OrderController::class,'OrdersInProcess'])->name('process.orders');

    //Process orders
    Route::get('/picked/orders',[OrderController::class,'PickedOrders'])->name('picked.orders');

    //Shipped orders
    Route::get('/shipped/orders',[OrderController::class,'ShippedOrders'])->name('shipped.orders');

    //Deliverd orders
    Route::get('/deliverd/orders',[OrderController::class,'DeliverdOrders'])->name('deliverd.orders');

    //Cancel orders
    Route::get('/cancel/orders',[OrderController::class,'CancelOrders'])->name('cancel.orders');

    //Pending order To Confirm Orders
    Route::get('/pendingTo/confirmOrders/{order_id}',[OrderController::class,'PendingToConfirmOrders'])->name('pendingTo.confirmOrders');

    //Confirm Orders To Processing Orders
    Route::get('/confirmTo/processingOrders/{order_id}',[OrderController::class,'ConfirmOrdersToProcess'])->name('confirmTo.processingOrders');

    //Processing Orders to Picked order
    Route::get('/processingOrderTo/pickedOrders/{order_id}',[OrderController::class,'ProcessingOrderToPickedOrders'])->name('processingOrderTo.pickedOrders');

    //Picked order to Shipped order
    Route::get('/pickedOrdersTo/shippedOrders/{order_id}',[OrderController::class,'PickedOrdersToShippedOrders'])->name('pickedOrdersTo.shippedOrders');
   
    //Shipped order to Delivered order
    Route::get('/shippedOrdersTo/deliveredOrders/{order_id}',[OrderController::class,'ShippedOrdersToDeliveredOrders'])->name('shippedOrdersTo.deliveredOrders');

     //Cancel order
    Route::get('/pendingTo/cancelOrders/{order_id}',[OrderController::class,'PendingToCancelOrders'])->name('pendingTo.cancelOrders');

    //Download Admin Invoice
    Route::get('/invoice/download/{order_id}',[OrderController::class,'AdminInvoiceDownload'])->name('invoice.download');

});


//admin guard
/*Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//user guard
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
