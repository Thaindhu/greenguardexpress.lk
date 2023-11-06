<?php

use App\Http\Controllers\admin\AuthController as AdminAuthController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\SubCategoryController as SubCatController;
use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\user\PageController;
use App\Http\Controllers\user\ProductsController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\WishlistController;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\UserAuth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('user.home');
Route::get('/getStatusPickup',[OrderController::class,'getStatusPickup'])->name('getStatusPickup');

// auth
Route::get('/login', [AuthController::class, 'login'])->name('user.login');

Route::get('/forgot-password', [AuthController::class, 'forget'])->name('user.forget');
Route::post('/send/otp', [AuthController::class, 'send_otp'])->name('user.send.otp');
Route::post('/otp/validate', [AuthController::class, 'validate_otp'])->name('user.validate.otp');
Route::post('/reset/password', [AuthController::class, 'update_password'])->name('user.reset.passoword');

Route::post('/login', [AuthController::class, 'check'])->name('user.auth_check');
Route::get('/register', [AuthController::class, 'register'])->name('user.register');
Route::post('/user/account/verify', [AuthController::class, 'verify_user'])->name('user.account.verify');


Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::post('/auth/store', [AuthController::class, 'store'])->name('user.store');

// Other Pages
Route::get('/about-us', [PageController::class, 'about'])->name('pages.about');
Route::get('/categories', [PageController::class, 'categories'])->name('pages.categories');
Route::get('/contact-us', [PageController::class, 'contact'])->name('pages.contact');
Route::get('/return-policy', [PageController::class, 'return'])->name('pages.return');
Route::get('/terms-and-conditions', [PageController::class, 'terms'])->name('pages.terms');
Route::get('/faq', [PageController::class, 'faq'])->name('pages.faq');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('pages.privacy');
// // cart
// Route::get('/cart', [CartController::class, 'index'])->name('cart');

// // checkout
Route::get('/checkout/shipping', [CartController::class, 'shipping'])->name('user.cart.shipping');
Route::get('/checkout/complete/{id}', [OrderController::class, 'order_status'])->name('user.cart.order_status');
// Route::get('/checkout/payment', [CartController::class, 'payment'])->name('user.cart.payment');
Route::get('/checkout', [CartController::class, 'checkout'])->name('user.cart.checkout');
Route::post('/order/create', [OrderController::class, 'store'])->name('user.order.store');
Route::post('/order/verify', [OrderController::class, 'verify_otp'])->name('user.order.verify');
Route::get('/order/{order_id}/payment', [OrderController::class, 'payment_get'])->name('user.order.payment');
Route::post('/order/update/payment-method', [OrderController::class, 'update_payment_method'])->name('user.order.payment.update');
Route::get('/order/payment/mintpay/{id}/{invoice_id}/{delivery_amount}', [OrderController::class, 'proceedMintpay'])->name('user.order.payment.mintpay');
Route::get('/order/payment/koko/{id}/{invoice_id}/{delivery_amount}', [OrderController::class, 'proceedKoko'])->name('user.order.payment.koko');
Route::post('/order/payment/payhere', [OrderController::class, 'proceedPayhere'])->name('user.order.payment.payhere');

// Route::get('/order/verify/{order_id}', [OrderController::class, 'verify_order_view'])->name('user.order.verify_scrn');
Route::get('/order/{id}', [OrderController::class, 'view'])->name('user.order.view');

// Geust Order Cancelation
Route::get('/order/guest/cancel/otp/{id}', [OrderController::class, 'cancel_guest_order']);
Route::get('/order/guest/cancel/confirm/{id}/{otp}', [OrderController::class, 'cancel_guest_order_confrim']);



// // products
Route::get('/products/{cat}/{subcat}', [ProductsController::class, 'index'])->name('user.products.get');
Route::get('/hot-deals', [ProductsController::class, 'hot_deals'])->name('user.products.hot_deals');
Route::get('/product/view/{id}/{name}', [ProductsController::class, 'view'])->name('user.view.product');
// Route::get('/product/{id}/{name}', [ProductsController::class, 'index'])->name('view.product');

// cart
Route::get('/cart', [CartController::class, 'index'])->name('user.cart.index');
Route::post('/cart/add', [CartController::class, 'addtocart'])->name('user.cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('user.cart.remove');
Route::get('/cart/update/{index}/{type}', [CartController::class, 'updatecart'])->name('user.cart.update');

// User routes
Route::middleware([UserAuth::class])->group(function () {
    // My Account
    Route::get('/my-account', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/my-account/update', [ProfileController::class, 'update'])->name('user.update.profile');
    Route::post('/my-account/update/password', [ProfileController::class, 'update_password'])->name('user.update.pass');
    Route::get('/my-account/wishlist', [ProfileController::class, 'wishlist'])->name('user.wishlist');

    // wishlits
    Route::get('/wishlist/add/{id}', [WishlistController::class, 'create'])->name('user.wishlist.add');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('user.wishlist.index');
    Route::get('/orders', [OrderController::class, 'history'])->name('user.order.all');
    Route::get('/orders/canceled/by/customer/{id}', [OrderController::class, 'cancel_order'])->name('user.order.cancel');
    
    // Route::get('/wishlist', [WishlistController::class, 'index'])->name('user.cart.index');
});


// Admin routes
Route::get('/admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
Route::post('/admin/auth/user', [AdminAuthController::class, 'check'])->name('admin.auth');

Route::prefix('admin')->middleware(AdminAuth::class)->group(function () {
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Products Category routes
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('proCategory.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('proCategory.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('proCategory.store');
        Route::get('/{id}/edit', [CategoryController::class, 'show'])->name('proCategory.show');
        Route::put('/{id}/update', [CategoryController::class, 'update'])->name('proCategory.update');
        Route::delete('/{id}', [CategoryController::class, 'delete'])->name('proCategory.delete');
        Route::get('/order', [CategoryController::class, 'category_order'])->name('proCategory.order.view');
        Route::post('/order/set', [CategoryController::class, 'category_order_set'])->name('proCategory.order.set');
    });
    // End Products Category routes

    // Customer routes
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('cust.index');
        Route::get('/{id}/edit', [CustomerController::class, 'show'])->name('cust.show');
        Route::put('/{id}/update', [CustomerController::class, 'update'])->name('cust.update');
    });
    // End Customer routes

    // Products Sub Category routes
    Route::prefix('sub-categories')->group(function () {
        Route::get('/', [SubCatController::class, 'index'])->name('subcat.index');
        Route::get('/create', [SubCatController::class, 'create'])->name('subcat.create');
        Route::post('/store', [SubCatController::class, 'store'])->name('subcat.store');
        Route::get('/{id}/edit', [SubCatController::class, 'show'])->name('subcat.edit');
        Route::put('/{id}/update', [SubCatController::class, 'update'])->name('subcat.update');
        Route::delete('/{id}', [SubCatController::class, 'delete'])->name('subcat.delete');
    });
    // End Products Category routes

    // Products Sub Category routes
    Route::prefix('brands')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('brand.index');
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/{id}/edit', [BrandController::class, 'show'])->name('brand.edit');
        Route::put('/{id}/update', [BrandController::class, 'update'])->name('brand.update');
        Route::delete('/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    });
    // End Products Category routes

    // Products routes
    Route::prefix('products')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('product.index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('product.create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('product.store');
        Route::get('/{id}/edit', [AdminProductController::class, 'edit'])->name('product.edit');
        Route::put('/{id}/update', [AdminProductController::class, 'update'])->name('product.update');
        Route::delete('/{id}', [AdminProductController::class, 'delete'])->name('product.delete');
    });
    // End Products routes

    // Main Banner routes
    Route::prefix('main-banners')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('main_banner.index');
        Route::get('/create', [BannerController::class, 'create'])->name('main_banner.create');
        // Route::post('/store', [BannerController::class, 'store'])->name('main_banner.store');
        Route::get('/edit', [BannerController::class, 'edit'])->name('main_banner.edit');
        Route::post('/update', [BannerController::class, 'update'])->name('main_banner.update');
        Route::delete('/{id}', [BannerController::class, 'delete'])->name('main_banner.delete');
    });
    // End Main Banner routes

    // Main Banner routes
    Route::prefix('sub-banners')->group(function () {
        Route::get('/', [BannerController::class, 'index_sub'])->name('sub_banner.index');
        Route::get('/edit', [BannerController::class, 'edit_sub'])->name('sub_banner.edit');
        Route::post('/update', [BannerController::class, 'update'])->name('sub_banner.update');
    });
    // End Main Banner routes

    // Orders
    Route::prefix('orders')->group(function () {
        Route::get('/{type}', [AdminOrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/view/{inv_number}', [AdminOrderController::class, 'view'])->name('admin.orders.view');
        Route::get('/print/{inv_number}', [AdminOrderController::class, 'print'])->name('admin.orders.print');
        Route::post('/ajax/change-status', [AdminOrderController::class, 'update_status'])->name('admin.orders.update');
        // Route::post('/update', [AdminOrderController::class, 'update'])->name('admin.orders.index');
    });
    // Orders

    // Settings
    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('admin.settings.index');
        Route::post('/update', [SettingsController::class, 'update'])->name('admin.settings.update');
    });
    // Settings

});



Route::get('generatepdf', [AdminOrderController::class, 'generatePDF']);
