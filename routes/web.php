<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\Seller\SellerController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SellersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Seller\ProductsController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Auth\Seller\AuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CheckoutController;

/*Frontend Section*/

//user authontication
Route::get('user/auth', [IndexController::class, 'userAuth'])->name('user.auth');
Route::post('user/login', [IndexController::class, 'loginSubmit'])->name('login.submit');
Route::post('user/register', [IndexController::class, 'registerSubmit'])->name('register.submit');
Route::get('user/logout', [IndexController::class, 'userLogout'])->name('user.logout');




Route::get('/', [IndexController::class, 'home'])->name('userhome');

//about us
Route::get('/about-us', [IndexController::class, 'aboutUs'])->name('about.us');

//contact us
Route::get('contact-us',[IndexController::class,'contactUs'])->name('contact.us'); 
Route::post('contact-submit',[IndexController::class,'contactSubmit'])->name('contact.submit'); 

//product category
Route::get('product-category/{slug}/', [IndexController::class, 'productCategory'])->name('product.category');

//product detail
Route::get('product-detail/{slug}/', [IndexController::class, 'productDetail'])->name('product.detail');

//product review
Route::post('product-review/{slug}',[ProductReviewController::class,'ProductReview'])->name('product.review');


//cart section
Route::get('cart',[CartController::class,'cart'])->name('cart');
Route::post('cart/store',[CartController::class,'cartStore'])->name('cart.store');
Route::post('cart/delete',[CartController::class,'cartDelete'])->name('cart.delete');
Route::post('cart/update',[CartController::class,'cartUpdate'])->name('cart.update');

//coupon section 
Route::post('coupon/add',[CartController::class,'couponAdd'])->name('coupon.add');


//wishlist section
Route::get('wishlist',[WishlistController::class,'wishlist'])->name('wishlist');
Route::post('wishlist/store',[WishlistController::class,'wishlistStore'])->name('wishlist.store');
Route::post('wishlist/move-to-cart',[WishlistController::class,'moveToCart'])->name('wishlist.move.cart');
Route::post('wishlist/delete',[WishlistController::class,'wishlistDelete'])->name('wishlist.delete');

//checkout section
Route::get('checkout1',[CheckoutController::class,'checkout1'])->name('checkout1')->middleware('user');
Route::post('checkout-first',[CheckoutController::class,'checkout1Store'])->name('checkout1.store');
Route::post('checkout-two',[CheckoutController::class,'checkout2Store'])->name('checkout2.store');
Route::post('checkout-three',[CheckoutController::class,'checkout3Store'])->name('checkout3.store');
Route::post('checkout-four',[CheckoutController::class,'checkout4Store'])->name('checkout4.store');
Route::get('checkout-store',[CheckoutController::class,'checkoutStore'])->name('checkout.store');
Route::get('complete/{order}',[CheckoutController::class,'complete'])->name('complete');


//shop section
Route::get('shop',[IndexController::class,'shop'])->name('shop');
Route::post('shop-filter',[IndexController::class,'shopFilter'])->name('shop.filter');

//search product  && autosearch product
Route::get('autosearch',[IndexController::class,'autoSearch'])->name('autosearch');
Route::get('search',[IndexController::class,'search'])->name('search');







//End FrontendSection

/*User Dashboard*/ 
Route::group(['prefix'=>'user'],function (){
    Route::get('/user-dashboard', [IndexController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/user-order', [IndexController::class, 'userOrder'])->name('user.order');
    Route::get('/user-address', [IndexController::class, 'userAddress'])->name('user.address');
    Route::get('/user-account-details', [IndexController::class, 'userAccount'])->name('user.account');

    Route::post('/billing/address/{id}', [IndexController::class, 'billingAddress'])->name('billing.address');
    Route::post('/shipping/address/{id}', [IndexController::class, 'shippingAddress'])->name('shipping.address');

    Route::post('/update/account/{id}', [IndexController::class, 'updateAccount'])->name('update.account');
    


});






Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Login
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login.form');
    Route::post('/login',[LoginController::class,'login'])->name('admin.login');

});





/*Admin dashboard*/

Route::group(['prefix'=>'admin','middleware'=>['admin']],function(){
    Route::get('/',[AdminController::class,'admin'])->name('admin');

//About us section
Route::get('aboutus',[AboutusController::class,'index'])->name('about.index'); 
Route::put('aboutus-update',[AboutusController::class,'aboutUpdate'])->name('about.update');   

//contact us section



//Banner Section
Route::resource('/banner',BannerController::class);
Route::post('banner_status',[BannerController::class,'bannerStatus'])->name('banner.status');

//Categories Section
Route::resource('/category',CategoryController::class);
Route::post('category_status',[CategoryController::class,'categoryStatus'])->name('category.status');

Route::post('category/{id}/child',[CategoryController::class,'getChildByParentID']);

//Brand Section
Route::resource('/brand',BrandController::class);
Route::post('brand_status',[BrandController::class,'brandStatus'])->name('brand.status');

//Product Section
Route::resource('/product',ProductController::class);
Route::post('product_status',[ProductController::class,'productStatus'])->name('product.status');

//Product Attribute Section
Route::post('product-attribute/{id}',[ProductController::class,'addProductAttribute'])->name('product.attribute');
Route::delete('product-attribute-delete/{id}',[ProductController::class,'addProductAttributeDelete'])->name('product.attribute.destroy');


//User Section
Route::resource('/user',UserController::class);
Route::post('user_status',[UserController::class,'userStatus'])->name('user.status');


//Coupon Section
Route::resource('/coupon',CouponController::class);
Route::post('coupon_status',[CouponController::class,'couponStatus'])->name('coupon.status');

//Shipping Section
Route::resource('/shipping',ShippingController::class);
Route::post('shipping_status',[ShippingController::class,'shippingStatus'])->name('shipping.status');


//Order section
Route::resource('/order',OrderController::class);
Route::post('order-status',[OrderController::class,'orderStatus'])->name('order.status');

//Settings section
Route::get('/settings',[SettingsController::class,'settings'])->name('settings');
Route::put('settings',[SettingsController::class,'settingsUpdate'])->name('settings.update');

//Seller section
Route::resource('/seller',SellersController::class);
Route::post('seller-status',[SellersController::class,'sellerStatus'])->name('seller.status');
Route::post('seller-verified',[SellersController::class,'sellerVerified'])->name('seller.verified');

//Reports section 
Route::resource('/report',ReportController::class);




});





/*Seller section*/ 

//Seller Login
Route::group(['prefix'=>'seller'],function(){
    Route::get('/login',[AuthController::class,'showLoginForm'])->name('seller.login.form');
    Route::post('/login',[AuthController::class,'login'])->name('seller.login');

});


//Seller Dashboard
Route::group(['prefix'=>'seller','middleware'=>['seller']],function(){
    Route::get('/',[SellerController::class,'dashboard'])->name('seller');

//Product Section
Route::resource('/seller-product',ProductsController::class);
Route::post('seller_product_status',[ProductsController::class,'productStatus'])->name('seller.product.status');



});


//laravel file manager
 Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

