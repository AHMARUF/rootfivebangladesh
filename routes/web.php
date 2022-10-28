<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PcBuilderContorller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\OtherController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\Auth\ChangePasswordController;
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
    return view('fondent.index');
});
*/


/*---------------User routes here ---------------------------------*/

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('account/order', [HomeController::class, 'order']);
Route::get('account/order/view/{invoice_id}', [HomeController::class, 'order_view']);


Route::get('account/edit', [HomeController::class, 'eidt']);
Route::post('account/update', [HomeController::class, 'update_user']);


Route::get('account/password', [HomeController::class, 'password']);
Route::post('account/password/change', [HomeController::class, 'password_update']);


Route::get('account/address', [HomeController::class, 'address']);
Route::post('account/address/update', [HomeController::class, 'address_update']);


Route::get('account/wishlist', [HomeController::class, 'wishlist']);
Route::get('account/wishlist/{id}',[HomeController::class,'deleteTowishlist']);


Route::get('account/pc', [HomeController::class, 'pc']);
Route::get('account/save_pc', [HomeController::class, 'form']);
Route::post('pc_builder/pc_save/{id}', [HomeController::class, 'pc_save']);
Route::get('pc_builder/pc_view/{id}', [HomeController::class, 'pc_view']);
Route::get('pc_builder/pc_delete/{id}', [HomeController::class, 'pc_delete']);


Route::get('pc_builder/quote', [HomeController::class, 'quote']);




// SSLCOMMERZ Start
Route::get('checkout', [HomeController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


/*---------------PC Builder routes here ---------------------------------*/
Route::get('pc_builder', [PcBuilderContorller::class, 'index'])->name('pc_builder');
Route::get('pc_builder/choose/component_id={id}', [PcBuilderContorller::class, 'choose']);
Route::get('pc_builder/choose/{id}/{PC_builder}', [PcBuilderContorller::class, 'add_choose']);
Route::get('pc_builder/flash/{id}', [PcBuilderContorller::class, 'flash']);

Route::get('pc_builder/print_pc', [PcBuilderContorller::class, 'print_pc']);


Route::get('pc_builder/base64_to_image', [PcBuilderContorller::class, 'base64_to_image']);



/*---------------Page routes here ---------------------------------*/

//search
Route::get('/search',[PageController::class,'search_h']);
Route::get('search={id}',[PageController::class,'search_pc']);




Route::get('/', [PageController::class, 'index']);
Route::get('accessories/products/{name}', [PageController::class, 'cat_view']);
//product datiles
Route::get('product/deatils/{slug}', [PageController::class, 'product_detiles']);

Route::get('products/{category}/{subcategory}', [PageController::class, 'Sub_view']);

Route::get('products/{category}/{Subcategory}/{Brand}', [PageController::class, 'brand_view']);


Route::get('about-us', [PageController::class, 'about_us']);
Route::get('terms-and-conditions', [PageController::class, 'terms_and_conditions']);
Route::get('privacy-policy', [PageController::class, 'privacy_policy']);



Route::get('contact-us', [PageController::class, 'contact_us']);
Route::post('contact/user', [PageController::class, 'contactuser'])->name('contactuser');


/* add-to-cars  Route  here..............*/
Route::post('add-to-cart',[CartController::class,'add_to_card']);
Route::get('cart',[CartController::class,'cart'])->name('cart');
Route::post('/delete-to-cart/{rowId}',[CartController::class,'delete_to_card']);
Route::post('/update-cart',[CartController::class,'update_cart']);

Route::get('common/cart/info',[CategoryController::class,'alldata']);


Route::get('pc_builder/add_to_cart', [CartController::class, 'add_to_cart_pc']);


Route::get('/addtocard/{id}',[CartController::class,'addtocard']);

Route::get('add/wishlist/{id}/{iid}',[CartController::class,'addTowishlist']);
Route::get('delete/wishlist/{id}',[CartController::class,'deleteTowishlist']);

/*admin login system*/

Route::get('backend',[LoginController::class,'showLoginForm'])->name('admin.login');
Route::post('backend',[LoginController::class,'Login']);

/*OTP check*/
Route::get('admin/otp', [AdminController::class,'otp_check']);
Route::post('validate/otp', [AdminController::class,'validate_otp']);
Route::get('admin/verify', [AdminController::class,'otp_page']);

Route::get('admin/home', [AdminController::class,'index']);
Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');

/*ChangePassword*/
Route::get('/password-change', [ChangePasswordController::class,'index'])->name('password.change');
Route::post('Update-password', [ChangePasswordController::class,'changePassword'])->name('password.Update');

/* All Users*/
Route::get('all/users',[AdminController::class,'users'])->name('all.users');
Route::get('delete/users/{id}',[AdminController::class,'destroy_u']);


/* All print*/
Route::get('/prnpriview/{order}',[PrintController::class,'prnpriview']);

/* All order*/
Route::get('all/order',[AdminController::class,'orders'])->name('all.order');
Route::post('view/order',[AdminController::class,'view_o']);
Route::get('/order/completed/{order}',[AdminController::class,'completed']);
Route::get('delete/order/{id}',[AdminController::class,'destroy_o']);

/*Banner route here*/
Route::get('Banner',[BannerController::class,'index'])->name('Banner');
Route::post('store/banner',[BannerController::class,'store']);
Route::get('all/data/banner',[BannerController::class,'alldata']);
Route::post('eidt/banner',[BannerController::class,'eidt']);
Route::post('upadate/banner',[BannerController::class,'update']);
Route::get('delete/banner/{id}',[BannerController::class,'destroy']);

Route::get('active/banner/{id}',[BannerController::class,'active']);
Route::get('unactive/banner/{id}',[BannerController::class,'unactive']);


/*category route here*/
Route::get('category',[CategoryController::class,'index'])->name('category');
Route::post('store/data/cat',[CategoryController::class,'store']);
Route::get('all/data/cat',[CategoryController::class,'alldata']);
Route::post('eidt/category',[CategoryController::class,'eidt']);
Route::post('upadate/category',[CategoryController::class,'update']);
Route::get('delete/category/{id}',[CategoryController::class,'destroy']);

Route::get('active/category/{id}',[CategoryController::class,'active']);
Route::get('unactive/category/{id}',[CategoryController::class,'unactive']);


/*Sub-category route here*/

Route::get('Sub/category',[SubcategoryController::class,'index'])->name('Sub/category');
Route::post('store/Sub/category',[SubcategoryController::class,'store']);
Route::get('all/Sub/category',[SubcategoryController::class,'alldata']);
Route::post('eidt/Sub/category',[SubcategoryController::class,'eidt']);
Route::post('upadate/Sub/category',[SubcategoryController::class,'update']);
Route::get('delete/Sub/category/{id}',[SubcategoryController::class,'destroy']);

Route::get('active/Sub/category/{id}',[SubcategoryController::class,'active']);
Route::get('unactive/Sub/category/{id}',[SubcategoryController::class,'unactive']);



/*Brand route here*/
Route::get('/brand',[BrandController::class,'index'])->name('brand');
Route::post('store/brand',[BrandController::class,'store']);
Route::get('all/brand',[BrandController::class,'alldata']);
Route::post('eidt/brand',[BrandController::class,'eidt']);
Route::post('upadate/brand',[BrandController::class,'update']);
Route::get('delete/brand/{id}',[BrandController::class,'destroy']);

Route::get('active/brand/{id}',[BrandController::class,'active']);
Route::get('unactive/brand/{id}',[BrandController::class,'unactive']);



/*Product route here*/
Route::get('product',[ProductController::class,'index'])->name('product');
Route::get('product/page',[ProductController::class,'create'])->name('product.add');
Route::post('store/product',[ProductController::class,'store']);
Route::get('all/product',[ProductController::class,'alldata']);
Route::post('view/product',[ProductController::class,'view']);
Route::post('eidt/product',[ProductController::class,'eidt']);
Route::post('upadate/product',[ProductController::class,'update']);
Route::get('delete/product/{id}',[ProductController::class,'destroy']);

Route::get('active/product/{id}',[ProductController::class,'active']);
Route::get('unactive/product/{id}',[ProductController::class,'unactive']);

//Select 
Route::post('subcat', [ProductController::class,'subCat'])->name('subcat');
Route::post('brand/select', [ProductController::class,'brand_select'])->name('brand/select');



/*message*/
Route::get('message/all', [OtherController::class,'message_all'])->name('message');
Route::get('delete/message/{id}', [OtherController::class,'message_de']);

/*   about   */
Route::get('about/page', [OtherController::class,'about_page'])->name('about_page');
Route::post('about_store', [OtherController::class,'about_store']);


/*   Privacy_Policy   */
Route::get('Privacy_Policy/page', [OtherController::class,'Privacy_Policy'])->name('Privacy_Policy');
Route::post('privacy_store', [OtherController::class,'privacy_store']);


/*   Terms_And_Conditions   */
Route::get('Terms_And_Conditions/page', [OtherController::class,'Terms_And_Conditions'])->name('Terms_And_Conditions');
Route::post('terms_store', [OtherController::class,'terms_store']);

