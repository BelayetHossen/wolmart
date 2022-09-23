<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Frontend\VendoreController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Backend\AdminLoginController;
use App\Http\Controllers\Backend\CurrencyController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\ProductTagController;
use App\Http\Controllers\Frontend\VendorShopController;
use App\Http\Controllers\Backend\ProductReviewController;
use App\Http\Controllers\Frontend\ShoppingCartController;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ForgotPasswordController;

Route::group(['middleware' => 'admin'], function () {

    /*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

    Route::get('admin-dashboard', [DashboardController::class, 'adminDashboardView'])->name('admin.dashboard.view');


    /*
    |--------------------------------------------------------------------------
    | Role Routes
    |--------------------------------------------------------------------------
    */

    Route::get('admin-role', [RoleController::class, 'adminRoleView'])->name('admin.role.view');
    Route::get('all-roles', [RoleController::class, 'allAdminRoles']);
    Route::post('add-role', [RoleController::class, 'addRole']);
    Route::get('trash-restore-role/{id}', [RoleController::class, 'trashRestoreRole']);
    Route::get('delete-role/{id}', [RoleController::class, 'deleteRole']);
    Route::get('edit-role/{id}', [RoleController::class, 'editRole']);
    Route::post('update-role/{id}', [RoleController::class, 'updateRole']);
    Route::get('view-role/{id}', [RoleController::class, 'editRole']);
    Route::get('role-status/{id}', [RoleController::class, 'updateRoleStatus']);


    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    */

    Route::get('admin-user', [UserController::class, 'adminUserView'])->name('admin.user.view');
    Route::post('admin-user-add', [UserController::class, 'adminUserAdd']);
    Route::get('user-status/{id}', [UserController::class, 'adminUserStatus']);
    Route::get('user-edit/{id}', [UserController::class, 'edituser']);
    Route::post('user-update/', [UserController::class, 'updateUser']);
    Route::get('trashed-users', [UserController::class, 'trashedUsersLoad'])->name('trashed.users.view');
    Route::get('staff-users', [UserController::class, 'boxViewUsersLoad'])->name('staff.users.view');
    Route::get('user-trash-restore/{id}', [UserController::class, 'trashRestoreUser']);
    Route::get('user-delete/{username}', [UserController::class, 'deleteUser']);
    Route::get('user-view/{id}', [UserController::class, 'singleUser']);
    Route::get('user-settings', [UserController::class, 'userSettings'])->name('staff-user-setting');


    /*
    |--------------------------------------------------------------------------
    | Brand Routes
    |--------------------------------------------------------------------------
    */
    Route::get('brand', [BrandController::class, 'brandPageLoad'])->name('brand.page.load');
    Route::post('brand', [BrandController::class, 'AddBrand']);
    Route::get('all-brands', [BrandController::class, 'allAdminBrands']);
    Route::get('brand-status/{id}', [BrandController::class, 'updateBrandStatus']);
    Route::get('brand-edit/{id}', [BrandController::class, 'editBrand']);
    Route::post('brand-update/{id}', [BrandController::class, 'updateBrand']);
    Route::get('brand-trash-restore/{id}', [BrandController::class, 'trashRestoreBrand']);
    Route::get('brand-delete/{id}', [BrandController::class, 'deleteBrand']);



    /*
    |--------------------------------------------------------------------------
    | Tag Routes
    |--------------------------------------------------------------------------
    */
    Route::get('product-tag', [ProductTagController::class, 'index'])->name('tag.index');
    Route::get('product-tag-all', [ProductTagController::class, 'allTags'])->name('tag.all');
    Route::post('product-tag-store', [ProductTagController::class, 'store'])->name('tag.store');
    Route::get('product-tag-delete/{id}', [ProductTagController::class, 'tagDelete'])->name('tag.delete');



    /*
    |--------------------------------------------------------------------------
    | Main Category Routes
    |--------------------------------------------------------------------------
    */
    Route::get('product-category', [ProductCategoryController::class, 'index'])->name('product-category.index');
    Route::get('main-category-all', [ProductCategoryController::class, 'mainCategoriesAll'])->name('main.category.all');
    Route::post('product-categoryMain-store', [ProductCategoryController::class, 'store'])->name('product-category.store');
    Route::get('product-categoryMain-statusUpdate/{id}', [ProductCategoryController::class, 'mainCatStatusUpdate'])->name('product.category.mainCatStatusUpdate');
    Route::get('product-categoryMain-edit/{id}', [ProductCategoryController::class, 'mainCategoryEdit'])->name('product.category.mainCategoryEdit');
    Route::post('product-categoryMain-update', [ProductCategoryController::class, 'mainCategoryUpdate'])->name('product-category.update');
    Route::get('product-categoryMain-trashRestore/{id}', [ProductCategoryController::class, 'mainCategorytrashRestore'])->name('product.category.mainCategoryTrashRestore');
    Route::get('product-categoryMain-delete/{id}', [ProductCategoryController::class, 'mainCategoryDelete'])->name('product.category.mainCategoryDelete');


    /*
    |--------------------------------------------------------------------------
    | Second Category Routes
    |--------------------------------------------------------------------------
    */
    Route::get('product-categorySecond-all', [ProductCategoryController::class, 'allSecondCategories'])->name('product-category.allSecond');
    Route::post('product-categorySecond-store', [ProductCategoryController::class, 'storeSecond'])->name('product-category.storeSecond');
    Route::get('product-categorySecond-statusUpdate/{id}', [ProductCategoryController::class, 'secondCatStatusUpdate']);
    Route::get('product-categorySecond-edit/{id}', [ProductCategoryController::class, 'secondCategoryEdit']);
    Route::post('product-categorySecond-update', [ProductCategoryController::class, 'secondCategoryUpdate']);
    Route::get('product-categorySecond-trashRestore/{id}', [ProductCategoryController::class, 'secondCategorytrashRestore'])->name('product.category.secondCategoryTrashRestore');
    Route::get('product-categorySecond-delete/{id}', [ProductCategoryController::class, 'secondCategoryDelete'])->name('product.category.secondCategoryDelete');


    /*
    |--------------------------------------------------------------------------
    | Third Category Routes
    |--------------------------------------------------------------------------
    */
    Route::get('product-categorysecond-select/{id}', [ProductCategoryController::class, 'secondCategorySelect']);
    Route::get('product-categoryThird-select/{id}', [ProductCategoryController::class, 'thirdCategorySelect']);
    Route::post('product-categoryThird-store', [ProductCategoryController::class, 'storeThirdCategory']);
    Route::get('product-categoryThird-all', [ProductCategoryController::class, 'allThirdCategories']);
    Route::get('product-categoryThird-edit/{id}', [ProductCategoryController::class, 'thirdCategoryEdit']);

    Route::get('product-categorythird-statusUpdate/{id}', [ProductCategoryController::class, 'thirdCatStatusUpdate']);
    Route::get('product-categoryThird-trashRestore/{id}', [ProductCategoryController::class, 'thirdCategorytrashRestore']);
    Route::get('product-categoryThird-delete/{id}', [ProductCategoryController::class, 'thirdCategoryDelete']);



    /*
    |--------------------------------------------------------------------------
    | Product Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/trashed-products-index', [ProductController::class, 'trashedProductIndex'])->name('product.trashed.index');
    Route::get('/trashed-products', [
        ProductController::class, 'trashedProductAll'
    ]);
    Route::get('all-products', [ProductController::class, 'allProducts']);
    Route::get('/product/add', [ProductController::class, 'addProduct'])->name('add.product');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product-edit/{id}', [ProductController::class, 'productEditPage'])->name('product.edit.page');
    Route::put('/product-update/{id}', [ProductController::class, 'productUpdate'])->name('product.update');
    Route::get('/product-img-delete/{id}/{name}', [ProductController::class, 'productImgDelete']);
    Route::get('/product-trashRestore/{id}', [ProductController::class, 'trashRestore']);
    Route::get('/product/status/{id}', [ProductController::class, 'productStatus']);

    /*
    |--------------------------------------------------------------------------
    | Product Review Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/products/review', [ProductReviewController::class, 'index'])->name('product.review.index');
    Route::get('/products/review/all', [ProductReviewController::class, 'allReviews']);
    Route::get('/products/review/edit/{id}', [ProductReviewController::class, 'editReview']);

    /*
    |--------------------------------------------------------------------------
    | Post Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.post.index');
    Route::get('/admin/trashed', [PostController::class, 'trashedindex'])->name('trashed.post.index');
    Route::get('/admin/posts/all', [PostController::class, 'allPosts']);
    Route::get('/admin/posts/trashed', [PostController::class, 'trashedPosts']);
    Route::get('/post/create', [PostController::class, 'addPost'])->name('admin.post.create');
    Route::post('/post/create', [PostController::class, 'storePost']);
    Route::get('/post/edit/{id}', [PostController::class, 'editPost']);
    Route::post('/post/update', [PostController::class, 'updatePost']);
    Route::get('/post/trashRestore/{id}', [PostController::class, 'trashRestore']);
    Route::get('/post/delete/{id}', [PostController::class, 'postDelete']);
    /*
    |--------------------------------------------------------------------------
    | shipping merhod settings Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/shipping/settings', [ShippingController::class, 'shippingIndex'])->name('admin.shipping.index');
    Route::get('/admin/shipping/all', [ShippingController::class, 'shippingAll']);
    Route::post('/admin/shipping/create', [ShippingController::class, 'shippingCreate']);
    Route::get('/admin/shipping/status/{id}', [ShippingController::class, 'shippingStatus']);
    Route::get('/admin/shipping/edit/{id}', [ShippingController::class, 'shippingEdit']);
    Route::post('/admin/shipping/update', [ShippingController::class, 'shippingUpdate']);
    Route::get('/admin/shipping/delete/{id}', [ShippingController::class, 'shippingDelete']);

    /*
    |--------------------------------------------------------------------------
    | shipping settings Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/coupon', [CouponController::class, 'Index'])->name('admin.coupon.index');
    Route::get('/admin/coupon/all', [CouponController::class, 'allCoupons']);
    Route::post('/admin/coupon/create', [CouponController::class, 'create'])->name('admin.coupon.create');
    Route::get('/admin/coupon/edit/{id}', [CouponController::class, 'edit']);
    Route::post('/admin/coupon/update', [CouponController::class, 'update']);
    Route::get('/admin/coupon/status/{id}', [CouponController::class, 'statusChange']);
    Route::get('/admin/coupon/delete/{id}', [CouponController::class, 'delete']);

    /*
    |--------------------------------------------------------------------------
    | Currency Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/currency', [CurrencyController::class, 'Index'])->name('admin.currency.index');
    Route::get('/admin/currency/all', [CurrencyController::class, 'allCurrency']);
    Route::post('/admin/currency/add', [CurrencyController::class, 'currencyCreate']);
    Route::get('/admin/currency/edit/{id}', [CurrencyController::class, 'currencyEdit']);
    Route::post('/admin/currency/update', [CurrencyController::class, 'currencyUpdate']);
    Route::get('/admin/currency/delete/{id}', [CurrencyController::class, 'currencyDelete']);
    /*
    |--------------------------------------------------------------------------
    | payment settings Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/payment', [PaymentController::class, 'Index'])->name('admin.payment.index');
    Route::post('/admin/payment/add', [PaymentController::class, 'paymentCreate']);
    Route::get('/admin/payment/all', [PaymentController::class, 'paymentAll']);
    Route::get('/admin/payment/edit/{id}', [PaymentController::class, 'paymentEdit']);
    Route::post('/admin/payment/update', [PaymentController::class, 'paymentUpdate']);
    Route::get('/admin/payment/delete/{id}', [PaymentController::class, 'paymentDelete']);

});




/*
|--------------------------------------------------------------------------
| User authentication routes
|--------------------------------------------------------------------------
*/
Route::get('admin-login', [AdminLoginController::class, 'adminLoginPage'])->name('admin.login.view')->middleware('logedin.admin');
Route::get('admin', [AdminLoginController::class, 'adminLoginRedirect']);
Route::post('admin-login', [AdminLoginController::class, 'adminLoginSystem'])->name('admin.login.system');
Route::get('admin-logout', [AdminLoginController::class, 'adminLogout'])->name('admin.logout.system');





/*
|--------------------------------------------------------------------------
| frontend routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

Route::get('/category/{cat_slug}', [ShopController::class, 'categoryIndex']);
Route::get('/category/search/{cat_slug}', [ShopController::class, 'searchByCategory']);
Route::get('/brand/search/{brand_slug}', [ShopController::class, 'searchByBrand']);
Route::get('/brand/{brand_slug}', [ShopController::class, 'brandIndex']);
Route::get('/tag/search/{id}', [ShopController::class, 'searchByTag']);


Route::get('/agents', [VendorShopController::class, 'vendorAll'])->name('vendor.index');
Route::get('/agent/{username}', [VendorShopController::class, 'vendor'])->name('vendor.single');




/*
|--------------------------------------------------------------------------
| product routes
|--------------------------------------------------------------------------
*/
Route::get('/product/quickview/{slug}', [HomeController::class, 'productQuickview']);
Route::get('/item/{slug}', [HomeController::class, 'product'])->name('single.product');
Route::post('/product-review-store', [ShopController::class, 'productReviewStore']);



/*
|--------------------------------------------------------------------------
| customer routes
|--------------------------------------------------------------------------
*/
Route::get('/customer/register', [CustomerController::class, 'customerRegister'])->name('customer.register')->middleware('customerMiddleware');
Route::get('/customer/login', [CustomerController::class, 'customerLogin'])->name('customer.login')->middleware('customerMiddleware');
Route::post('/customer/login', [CustomerController::class, 'customerLoginSystem']);
Route::get('/customer/logout', [CustomerController::class, 'customerLogout'])->name('customer.logout');
Route::post('/customer/register', [CustomerController::class, 'store']);




Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard')->middleware('loggedin.customer');


/*
|--------------------------------------------------------------------------
| vendor routes
|--------------------------------------------------------------------------
*/
    Route::get('/vendor/login', [VendoreController::class, 'vendorLogin'])->name('vendor.login')->middleware('vendor');
    Route::get('/vendor/dashboard', [VendoreController::class, 'dashboard'])->name('vendor.dashboard')->middleware('loggedin.vendor');
    Route::get('/vendor/products/all', [VendoreController::class, 'allProducts'])->name('vendor.products.all')->middleware('loggedin.vendor');
    Route::get('/vendor/product/create', [VendoreController::class, 'addProduct'])->name('vendor.add.product')->middleware('loggedin.vendor');
    Route::get('/vendor/product/edit/{slug}', [VendoreController::class, 'editProduct'])->name('vendor.edit.product')->middleware('loggedin.vendor');
    Route::post('/vendor/product/update', [VendoreController::class, 'updateProduct'])->name('vendor.update.product')->middleware('loggedin.vendor');
    Route::get('/vendor/products', [VendoreController::class, 'vendorAllProducts'])->name('vendor.all.product')->middleware('loggedin.vendor');
    Route::get('/vendor/products/delete/{id}', [VendoreController::class, 'productDelete'])->middleware('loggedin.vendor');
    Route::post('/vendor/product/create', [VendoreController::class, 'productStore'])->middleware('loggedin.vendor');
    Route::get('/vendor/account', [VendoreController::class, 'account'])->name('vendor.account')->middleware('loggedin.vendor');
    Route::post('/vendor/account/update/{id}', [VendoreController::class, 'accountUpdate'])->middleware('loggedin.vendor');
    Route::get('/vendor/shop/settings', [VendoreController::class, 'shopSettings'])->name('vendor.settings')->middleware('loggedin.vendor');
    Route::post('/vendor/store/details/update', [VendorShopController::class, 'storeDetailsUpdate'])->middleware('loggedin.vendor');
    Route::post('/vendor/account/details/update', [VendorShopController::class, 'accountDetailsUpdate'])->middleware('loggedin.vendor');
    Route::get('/vendor/logobannershow', [VendoreController::class, 'logobannershow'])->middleware('loggedin.vendor');
    Route::post('/vendor/logo-banner', [VendoreController::class, 'logoBanner'])->name('vendor.logoBanner')->middleware('loggedin.vendor');



Route::get('/vendor/register', [VendoreController::class, 'vendorRegister'])->name('vendor.register');
Route::post('/vendor/register', [VendoreController::class, 'store']);
Route::post('/vendor/login', [VendoreController::class, 'vendorLoginSystem']);
Route::get('/vendor/logout', [VendoreController::class, 'vendorLogout'])->name('vendor.logout');


/*
|--------------------------------------------------------------------------
| Password reset routes
|--------------------------------------------------------------------------
*/
Route::get('/password/reset', [ForgotPasswordController::class, 'index'])->name('password.reset.index')->middleware('customerMiddleware');
Route::post('/password/reset', [ForgotPasswordController::class, 'getEmail']);
Route::get('/password/reset/{token}/{email}', [ForgotPasswordController::class, 'newPassword'])->middleware('customerMiddleware');
Route::post('/password/update', [ForgotPasswordController::class, 'updatePassword']);




/*
|--------------------------------------------------------------------------
| Blogs routes
|--------------------------------------------------------------------------
*/
Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'post']);
/*
|--------------------------------------------------------------------------
| shopping cart routes
|--------------------------------------------------------------------------
*/
Route::get('/product/cart', [ShoppingCartController::class, 'cartIndex'])->name('cart.index');
Route::get('/product/cart/all', [ShoppingCartController::class, 'allCart']);
Route::get('/product/cart/allAjax', [ShoppingCartController::class, 'allCartAjax']);
Route::get('/product/cart/allAjaxPage', [ShoppingCartController::class, 'allCartAjaxPage']);
Route::post('/product/cart/add', [ShoppingCartController::class, 'addToCart']);
Route::get('/product/cart/update/{rowId}/{qty}/{shi_price}', [ShoppingCartController::class, 'cartUpdate']);
Route::get('/product/cart/remove/{rowId}', [ShoppingCartController::class, 'cartRemove']);
Route::get('/product/cart/destroy', [ShoppingCartController::class, 'destroy'])->name('cart.destroy');
Route::post('/product/cart/shipping/price/update', [ShoppingCartController::class, 'shippingPriceUpdate']);
Route::post('/product/cart/coupon/price/update', [ShoppingCartController::class, 'couponPriceUpdate']);

/*
|--------------------------------------------------------------------------
| checkout routes
|--------------------------------------------------------------------------
*/
Route::get('/product/checkout', [CheckoutController::class, 'index'])->name('checkout.index');







//
