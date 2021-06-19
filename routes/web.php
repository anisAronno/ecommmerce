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







Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {

        Route::get('/login', [App\Http\Controllers\admin\LoginController::class, 'loginIndex'])->name('admin.login');
        Route::post('/onLogin', [App\Http\Controllers\admin\LoginController::class, 'onLogin'])->name('admin.onLogin');
    });

        Route::group(['middleware' => 'admin.auth'], function () {
        //Logout
        Route::get('/logout', [App\Http\Controllers\admin\LoginController::class, 'onLogout'])->name('admin.logout');

        // Admin Route
        Route::get('/home', [App\Http\Controllers\admin\HomeController::class, 'adminHome'])->name('admin.adminHome');
        Route::get('/adminPannel', [App\Http\Controllers\admin\AdminController::class, 'AdminIndex'])->name('admin.adminPannel');
        Route::get('/getAdminData', [App\Http\Controllers\admin\AdminController::class, 'adminData'])->name('admin.getAdminData');
        Route::post('/adminAdd', [App\Http\Controllers\admin\AdminController::class, 'adminAdd'])->name('admin.adminAdd');
        Route::post('/adminDelete', [App\Http\Controllers\admin\AdminController::class, 'adminDelete'])->name('admin.adminDelete');
        Route::post('/adminDetailEdit', [App\Http\Controllers\admin\AdminController::class, 'adminDetailEdit'])->name('admin.adminDetailEdit');
        Route::post('/adminDataUpdate', [App\Http\Controllers\admin\AdminController::class, 'adminDataUpdate'])->name('admin.adminDataUpdate');



        // Vendor Route
        Route::get('/vendorPannel', [App\Http\Controllers\admin\vendor\VendorController::class, 'vendorIndex'])->name('admin.vendorPannel');
        Route::get('/getVendorData', [App\Http\Controllers\admin\vendor\VendorController::class, 'vendorData'])->name('admin.getVendordata');
        Route::post('/vendorAdd', [App\Http\Controllers\admin\vendor\VendorController::class, 'vendorAdd'])->name('admin.vendorAdd');
        Route::post('/vendorDelete', [App\Http\Controllers\admin\vendor\VendorController::class, 'vendorDelete'])->name('admin.vendorDelete');
        Route::post('/vendorDetailEdit', [App\Http\Controllers\admin\vendor\VendorController::class, 'vendorDetailEdit'])->name('admin.vendorDetailEdit');
        Route::post('/vendorDataUpdate', [App\Http\Controllers\admin\vendor\VendorController::class, 'vendorDataUpdate'])->name('admin.vendorDataUpdate');


       // User Route
       Route::get('/userPannel', [App\Http\Controllers\admin\UserController::class, 'userIndex'])->name('admin.userPannel');
       Route::get('/getUserData', [App\Http\Controllers\admin\UserController::class, 'userData'])->name('admin.getUserdata');
       Route::post('/userAdd', [App\Http\Controllers\admin\UserController::class, 'userAdd'])->name('admin.userAdd');
       Route::post('/userDelete', [App\Http\Controllers\admin\UserController::class, 'userDelete'])->name('admin.userDelete');
       Route::post('/userDetailEdit', [App\Http\Controllers\admin\UserController::class, 'userDetailEdit'])->name('admin.userDetailEdit');
       Route::post('/userDataUpdate', [App\Http\Controllers\admin\UserController::class, 'userDataUpdate'])->name('admin.userDataUpdate');

        // Slider Section

        Route::get('/slider', [\App\Http\Controllers\admin\HomeSliderController::class,'SliderIndex'])->name('admin.slider');
        Route::post('/addslider', [\App\Http\Controllers\admin\HomeSliderController::class, 'SliderAdd'])->name('admin.addslider');
        Route::get('/getsliderdata', [\App\Http\Controllers\admin\HomeSliderController::class, 'SliderData'])->name('admin.getsliderdata');
        Route::post('/sliderdelete', [\App\Http\Controllers\admin\HomeSliderController::class, 'SliderDelete'])->name('admin.sliderdelete');
        Route::post('/sliderdetails', [\App\Http\Controllers\admin\HomeSliderController::class, 'SliderDetailEdit'])->name('admin.sliderdetails');
        Route::post('/sliderupdate', [\App\Http\Controllers\admin\HomeSliderController::class, 'SliderUpdate'])->name('admin.sliderupdate');

        // Brand  Section
        Route::resource('brand', \App\Http\Controllers\admin\products\ProductBrandController::class,[
            'except'=>['destroy','show','update']
        ]);
        Route::get('/brands', [\App\Http\Controllers\admin\products\ProductBrandController::class,'index'])->name('admin.brands');
        Route::get('/getBrandsData', [\App\Http\Controllers\admin\products\ProductBrandController::class,'getBrandData'])->name('admin.getBrandsData');
        Route::get('/getBrandsData', [\App\Http\Controllers\admin\products\ProductBrandController::class,'getBrandData'])->name('admin.getBrandsData');
        Route::post('/BrandDelete', [\App\Http\Controllers\admin\products\ProductBrandController::class,'destroy'])->name('admin.BrandDelete');
        Route::post('/getBrandEditData', [\App\Http\Controllers\admin\products\ProductBrandController::class,'show'])->name('admin.getBrandEditData');
        Route::post('/updateBrand', [\App\Http\Controllers\admin\products\ProductBrandController::class,'updateBrand'])->name('admin.updateBrand');

        // Category  Section
        Route::get('/categories', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'index'])->name('admin.categories');
        Route::get('/getCategoriesData', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'getCategoriesData'])->name('admin.getCategoriesData');
        Route::get('/getCategoriesParantData', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'getCategoriesParantData'])->name('admin.getCategoriesParantData');
        Route::post('/addCategory', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'store'])->name('admin.addCategory');
        Route::post('/deleteCategory', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'destroy'])->name('admin.deleteCategory');
        Route::post('/getEditCategoryData', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'edit'])->name('admin.getEditCategoryData');
        Route::post('/updateCategory', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'update'])->name('admin.updateCategory');

         //Product Section
         Route::get('/products', [\App\Http\Controllers\admin\products\ProductsController::class,'index'])->name('admin.products');
         Route::get('/getProductData', [\App\Http\Controllers\admin\products\ProductsController::class,'getProductData'])->name('admin.getProductData');
         Route::post('/productAdd', [\App\Http\Controllers\admin\products\ProductsController::class,'store'])->name('admin.productAdd');
         Route::post('/onUpload', [\App\Http\Controllers\admin\products\ProductsController::class,'onUpload'])->name('admin.onUpload');
         Route::post('/delete', [\App\Http\Controllers\admin\products\ProductsController::class,'destroy'])->name('admin.delete');
         Route::post('/getEditProductsData', [\App\Http\Controllers\admin\products\ProductsController::class,'edit'])->name('admin.getEditProductsData');
         Route::post('/productsUpdate', [\App\Http\Controllers\admin\products\ProductsController::class,'update'])->name('admin.productsUpdate');




         //contact Model
         Route::get('/contact', [\App\Http\Controllers\admin\ContactController::class,'MessageIndex'])->name('admin.contact');
         Route::get('/getContactData', [\App\Http\Controllers\admin\ContactController::class,'getContactData'])->name('admin.getContactData');
         Route::post('/deleteContactData', [\App\Http\Controllers\admin\ContactController::class,'contactDelete'])->name('admin.contactDelete');

        //Visitor Table
        Route::get('/visitor', [\App\Http\Controllers\admin\VisitorController::class,'VisitorIndex'])->name('admin.VisitorIndex');




        //admin panel Home Page Social Link management
        Route::get('/social', [\App\Http\Controllers\admin\SocialController::class,'SocialIndex'])->name('admin.social');
        Route::post('/facebook', [\App\Http\Controllers\admin\SocialController::class,'addFacebook'])->name('admin.facebook');
        Route::post('/twitter', [\App\Http\Controllers\admin\SocialController::class,'addTwitter'])->name('admin.twitter');
        Route::post('/youtube', [\App\Http\Controllers\admin\SocialController::class,'addYoutube'])->name('admin.youtube');
        Route::post('/instragram', [\App\Http\Controllers\admin\SocialController::class,'addInstragram'])->name('admin.instragram');
        Route::post('/linkin', [\App\Http\Controllers\admin\SocialController::class,'addLinkin'])->name('admin.linkin');
        Route::post('/google', [\App\Http\Controllers\admin\SocialController::class,'addGoogle'])->name('admin.google');


        //admin panel Home Page Others management with social URL
        Route::get('/others', [\App\Http\Controllers\admin\OthersSettingsController::class,'otherIndex'])->name('admin.others');
        Route::post('/address', [\App\Http\Controllers\admin\OthersSettingsController::class,'addAddress'])->name('admin.address');
        Route::post('/phone', [\App\Http\Controllers\admin\OthersSettingsController::class,'addPhone'])->name('admin.phone');
        Route::post('/email', [\App\Http\Controllers\admin\OthersSettingsController::class,'addEmail'])->name('admin.email');
        Route::post('/title', [\App\Http\Controllers\admin\OthersSettingsController::class,'addTitle'])->name('admin.title');
        Route::post('/subTitle', [\App\Http\Controllers\admin\OthersSettingsController::class,'addsubTitle'])->name('admin.subTitle');
        Route::post('/gmap', [\App\Http\Controllers\admin\OthersSettingsController::class,'addGmap'])->name('admin.gmap');
        Route::post('/logo', [\App\Http\Controllers\admin\OthersSettingsController::class,'logoAdd'])->name('admin.logo');
        Route::post('/Banner', [\App\Http\Controllers\admin\OthersSettingsController::class,'BannerAdd'])->name('admin.Banner');
        Route::post('/promoImageOne', [\App\Http\Controllers\admin\OthersSettingsController::class,'promoImageOne'])->name('admin.promoImageOne');
        Route::post('/promoImageTwo', [\App\Http\Controllers\admin\OthersSettingsController::class,'promoImageTwo'])->name('admin.promoImageTwo');
        Route::post('/promoImageThree', [\App\Http\Controllers\admin\OthersSettingsController::class,'promoImageThree'])->name('admin.promoImageThree');


        //admin panel order Settings
        Route::get('/order-settings', [App\Http\Controllers\admin\order\OrderSettingsController::class,'index'])->name('admin.orderSettings');
        Route::post('/addRocketNumber', [App\Http\Controllers\admin\order\OrderSettingsController::class,'addRocketNumber'])->name('admin.addRocketNumber');
        Route::post('/addBkashNumber', [App\Http\Controllers\admin\order\OrderSettingsController::class,'addBkashNumber'])->name('admin.addBkashNumber');
        Route::post('/addNagadNumber', [App\Http\Controllers\admin\order\OrderSettingsController::class,'addNagadNumber'])->name('admin.addNagadNumber');
        Route::post('/addDelivaryInCity', [App\Http\Controllers\admin\order\OrderSettingsController::class,'addDelivaryInCity'])->name('admin.addDelivaryInCity');
        Route::post('/addDelivaryOutCity', [App\Http\Controllers\admin\order\OrderSettingsController::class,'addDelivaryOutCity'])->name('admin.addDelivaryOutCity');
        Route::post('/CuponAdd', [App\Http\Controllers\admin\order\OrderSettingsController::class,'CuponAdd'])->name('admin.CuponAdd');
        Route::post('/CuponEdit', [App\Http\Controllers\admin\order\OrderSettingsController::class,'CuponEdit'])->name('admin.CuponEdit');
        Route::post('/CuponUpdate', [App\Http\Controllers\admin\order\OrderSettingsController::class,'CuponUpdate'])->name('admin.CuponUpdate');
        Route::post('/CuponDelete', [App\Http\Controllers\admin\order\OrderSettingsController::class,'CuponDelete'])->name('admin.CuponDelete');
        Route::get('/getCuponData', [App\Http\Controllers\admin\order\OrderSettingsController::class,'getCuponData'])->name('admin.getCuponData');



        //admin panel Orders
        Route::get('/ordeIndex', [App\Http\Controllers\admin\order\OrderController::class,'ordeIndex'])->name('admin.ordeIndex');
        Route::get('/getOrdersData', [App\Http\Controllers\admin\order\OrderController::class,'getOrdersData'])->name('admin.getOrdersData');
        Route::post('/ordersView', [App\Http\Controllers\admin\order\OrderController::class,'ordersView'])->name('admin.ordersView');
        Route::post('/ordersStatusUpdate', [App\Http\Controllers\admin\order\OrderController::class,'ordersStatusUpdate'])->name('admin.ordersStatusUpdate');
        Route::get('/ordersPrint/{id}', [App\Http\Controllers\admin\order\OrderController::class,'ordersPrint'])->name('admin.ordersPrint');


        //admin panel Review
        Route::get('/review', [App\Http\Controllers\admin\RatingReviewController::class, 'reviewIndex'])->name('admin.review');
        Route::get('/getReviewdata', [App\Http\Controllers\admin\RatingReviewController::class, 'getReviewdata'])->name('admin.getReviewdata');
        Route::post('/deleteReview', [\App\Http\Controllers\admin\RatingReviewController::class, 'deleteReview'])->name('admin.deleteReview');

        //admin panel  Page management

         Route::get('/pages', [\App\Http\Controllers\admin\PagesController::class, 'PageIndex'])->name('admin.pages');
         Route::get('/getpagesdata', [\App\Http\Controllers\admin\PagesController::class, 'PagesData'])->name('admin.getpagesdata');
         Route::post('/addpages', [\App\Http\Controllers\admin\PagesController::class, 'PagesAdd'])->name('admin.addpages');
         Route::post('/pagesdetails', [\App\Http\Controllers\admin\PagesController::class, 'PagesDetailEdit'])->name('admin.pagesdetails');
         Route::post('/pagesupdate', [\App\Http\Controllers\admin\PagesController::class, 'PagesUpdate'])->name('admin.pagesupdate');
         Route::post('/pagesdelete', [\App\Http\Controllers\admin\PagesController::class, 'PagesDelete'])->name('admin.pagesdelete');



         // About page


         Route::get('/homePage', [App\Http\Controllers\admin\AboutPageController::class,'homeAboutIndex'])->name('admin.homePage');
         Route::post('/addHAtitle', [App\Http\Controllers\admin\AboutPageController::class,'addTitle'])->name('admin.addHAtitle');
         Route::post('/addHADescription', [App\Http\Controllers\admin\AboutPageController::class,'addDescription'])->name('admin.addHADescription');
         Route::post('/addHAimage', [App\Http\Controllers\admin\AboutPageController::class,'imageAdd'])->name('admin.addHAimage');
         Route::post('/addHAimage2', [App\Http\Controllers\admin\AboutPageController::class,'imageAdd2'])->name('admin.addHAimage2');
         Route::post('/addHAimage3', [App\Http\Controllers\admin\AboutPageController::class,'imageAdd3'])->name('admin.addHAimage3');
         Route::post('/addResturantMenuimage', [App\Http\Controllers\admin\AboutPageController::class,'imageResturantMenuAdd'])->name('admin.addResturantMenuimage');
         Route::post('/addEXPimage', [App\Http\Controllers\admin\AboutPageController::class,'imageEXPAdd'])->name('admin.addEXPimage');



         Route::get('/getFSdata', [App\Http\Controllers\admin\AboutPageController::class,'getHomeFeaturedSpecialsData'])->name('admin.getFSdata');
         Route::post('/addFSdata', [App\Http\Controllers\admin\AboutPageController::class,'homeSFAdd'])->name('admin.addFSdata');
         Route::post('/homeFSdelete', [App\Http\Controllers\admin\AboutPageController::class,'HomeFSDelete'])->name('admin.homeFSdelete');
         Route::post('/HomeFSEdit', [App\Http\Controllers\admin\AboutPageController::class,'HomeFSEdit'])->name('admin.HomeFSEdit');
         Route::post('/HomeFSUpdate', [App\Http\Controllers\admin\AboutPageController::class,'HomeFSUpdate'])->name('admin.HomeFSUpdate');


         Route::get('/getEXPdata', [App\Http\Controllers\admin\AboutPageController::class,'getHomeExclusiveSpecialsData'])->name('admin.getEXPdata');
         Route::post('/homeEXPAdd', [App\Http\Controllers\admin\AboutPageController::class,'homeEXPAdd'])->name('admin.homeEXPAdd');
         Route::post('/HomeEXFDelete', [App\Http\Controllers\admin\AboutPageController::class,'HomeEXFDelete'])->name('admin.HomeEXFDelete');
         Route::post('/HomeEXPEdit', [App\Http\Controllers\admin\AboutPageController::class,'HomeEXPEdit'])->name('admin.HomeEXPEdit');
         Route::post('/HomeEXPUpdate', [App\Http\Controllers\admin\AboutPageController::class,'HomeEXPUpdate'])->name('admin.HomeEXPUpdate');



         Route::get('/getTestimonialData', [App\Http\Controllers\admin\AboutPageController::class,'getHomeTestimonialData'])->name('admin.getTestimonialData');
         Route::post('/TestimonialAdd', [App\Http\Controllers\admin\AboutPageController::class,'TestimonialAdd'])->name('admin.TestimonialAdd');
         Route::post('/TestimonialDelete', [App\Http\Controllers\admin\AboutPageController::class,'HomeTestimonialDelete'])->name('admin.TestimonialDelete');
         Route::post('/getTestimonialEditData', [App\Http\Controllers\admin\AboutPageController::class,'HomeTestimonialEdit'])->name('admin.getTestimonialEditData');
         Route::post('/TestimonilaUpdate', [App\Http\Controllers\admin\AboutPageController::class,'TestimonilaUpdate'])->name('admin.TestimonilaUpdate');


         //Blog

         Route::get('/blog', [App\Http\Controllers\admin\BlogController::class, 'index'])->name('admin.blog');
         Route::get('/blogData', [App\Http\Controllers\admin\BlogController::class, 'blogData'])->name('admin.blogData');
         Route::post('/blog-edit', [App\Http\Controllers\admin\BlogController::class, 'edit'])->name('admin.blog.edit');
         Route::post('/blog-update', [App\Http\Controllers\admin\BlogController::class, 'update'])->name('admin.blog.update');
         Route::post('/blog-delete', [App\Http\Controllers\admin\BlogController::class, 'delete'])->name('admin.blog.delete');

    });



});


// For Admin And Vendor
Route::get('/getBrandsData', [\App\Http\Controllers\admin\products\ProductBrandController::class,'getBrandData'])->name('admin.getBrandsData');
Route::get('/getCategoriesData', [\App\Http\Controllers\admin\products\ProductCategoriesController::class,'getCategoriesData'])->name('admin.getCategoriesData');
// For Vendor

Route::group(['prefix' => 'vendor'], function () {
    Route::group(['middleware' => 'vendor.guest'], function () {
        //Login
        Route::get('/login', [App\Http\Controllers\vendor\VendorAuthController::class, 'showLogin'])->name('vendor.login');
        Route::post('/onlogin', [App\Http\Controllers\vendor\VendorAuthController::class, 'onlogin'])->name('vendor.onlogin');
        Route::get('/registration', [App\Http\Controllers\vendor\VendorAuthController::class, 'registration'])->name('vendor.registration');
        Route::post('/addUser', [App\Http\Controllers\vendor\VendorAuthController::class, 'addVendor'])->name('vendor.addVendor');

        //reset password
        Route::get('/forgot', [App\Http\Controllers\vendor\VendorAuthController::class, 'forgot'])->name('vendor.forgot');
        Route::post('/forgotPassword', [App\Http\Controllers\vendor\VendorAuthController::class, 'forgotPassword'])->name('vendor.forgotPassword');
        Route::get('/recoverPassWord/{id}', [App\Http\Controllers\vendor\VendorAuthController::class, 'recoverPassWord'])->name('vendor.recoverPassWord');
        Route::post('/updatePassword', [App\Http\Controllers\vendor\VendorAuthController::class, 'updatePassword'])->name('vendor.updatePassword');


    });


    Route::group(['middleware' => 'vendor.auth',], function () {
        Route::post('/logout', [App\Http\Controllers\vendor\VendorAuthController::class, 'logout'])->name('vendor.logout');
        Route::get('/profile', [App\Http\Controllers\vendor\VendorAuthController::class, 'profile'])->name('vendor.profile');
        Route::get('/profileEdit/{id}', [App\Http\Controllers\vendor\VendorAuthController::class, 'profileEdit'])->name('vendor.profileEdit');
        Route::post('/upadeteProfile/{id}', [App\Http\Controllers\vendor\VendorAuthController::class, 'upadeteProfile'])->name('vendor.upadeteProfile');

        Route::view('dashboard', 'vendor.home')->name('vendor.home');

        //Product Section
        Route::get('/products', [\App\Http\Controllers\vendor\ProductController::class, 'index'])->name('vendor.products');
        Route::get('/getProductData', [\App\Http\Controllers\vendor\ProductController::class, 'getProductData'])->name('vendor.getProductData');
        Route::post('/productAdd', [\App\Http\Controllers\vendor\ProductController::class, 'store'])->name('vendor.productAdd');
        Route::post('/onUpload', [\App\Http\Controllers\vendor\ProductController::class, 'onUpload'])->name('vendor.onUpload');
        Route::post('/delete', [\App\Http\Controllers\vendor\ProductController::class, 'destroy'])->name('vendor.delete');
        Route::post('/getEditProductsData', [\App\Http\Controllers\vendor\ProductController::class, 'edit'])->name('vendor.getEditProductsData');
        Route::post('/productsUpdate', [\App\Http\Controllers\vendor\ProductController::class, 'update'])->name('vendor.productsUpdate');



        //vendor panel Orders
        Route::get('/ordeIndex', [App\Http\Controllers\vendor\order\OrderController::class,'ordeIndex'])->name('vendor.ordeIndex');
        Route::get('/getOrdersData', [App\Http\Controllers\vendor\order\OrderController::class,'getOrdersData'])->name('vendor.getOrdersData');
        Route::post('/ordersView', [App\Http\Controllers\vendor\order\OrderController::class,'ordersView'])->name('vendor.ordersView');
        Route::post('/ordersStatusUpdate', [App\Http\Controllers\vendor\order\OrderController::class,'ordersStatusUpdate'])->name('vendor.ordersStatusUpdate');
        Route::get('/ordersPrint/{id}', [App\Http\Controllers\vendor\order\OrderController::class,'ordersPrint'])->name('vendor.ordersPrint');

    });
});







Route::get('/', [App\Http\Controllers\client\HomeController::class, 'index'])->name('client.home');
Route::post('/search', [App\Http\Controllers\client\HomeController::class, 'search'])->name('client.search');


Route::get('/product/{slug}', [App\Http\Controllers\client\ProductController::class, 'showProductDetails'])->name('client.showProductDetails');
Route::get('/category/{slug}', [App\Http\Controllers\client\CategoryController::class, 'catagoryWiseProduct'])->name('client.category');

// Cart
Route::get('/cartDatas', [App\Http\Controllers::class, 'cartData'])->name('client.cartDatas');
Route::get('/cart', [App\Http\Controllers\client\CartController::class, 'showCart'])->name('client.showCart');
Route::get('/cartData', [App\Http\Controllers\client\CartController::class, 'cartData'])->name('client.cartData');
Route::post('/cart', [App\Http\Controllers\client\CartController::class, 'addToCart'])->name('client.addCart');
Route::post('/cartUpdate', [App\Http\Controllers\client\CartController::class, 'cartUpdate'])->name('client.cartUpdate');
Route::post('/cartRemove', [App\Http\Controllers\client\CartController::class, 'RemoveFromCart'])->name('client.cartRemove');
Route::post('/cupon', [App\Http\Controllers\client\CartController::class, 'cupon'])->name('client.cupon');
Route::get('/cartClear', [App\Http\Controllers\client\CartController::class, 'clearCart'])->name('client.ClearCart');
Route::get('/checkout', [App\Http\Controllers\client\CartController::class, 'checkout'])->name('client.checkout');

//shop page
Route::get('/blog', [App\Http\Controllers\client\BlogController::class, 'index'])->name('client.blog');
Route::post('/blog-create', [App\Http\Controllers\client\BlogController::class, 'store'])->name('client.blog.store');

Route::get('/shop', [App\Http\Controllers\client\ShopController::class, 'shopIndex'])->name('client.shop');
Route::post('/getsingleProductdata', [App\Http\Controllers\client\ShopController::class, 'getsingleProductdata'])->name('client.getsingleProductdata');

//Contact Page
Route::get('/contact', [App\Http\Controllers\client\ContactController::class, 'contactIndex'])->name('client.contact');
Route::post('/contactSend', [App\Http\Controllers\client\ContactController::class, 'contactSend'])->name('client.contactSend');

//About Page
Route::get('/about', [App\Http\Controllers\client\AboutPageController::class, 'aboutIndex'])->name('client.about');

//Login
Route::get('/login', [App\Http\Controllers\client\authController::class, 'showLogin'])->name('client.login');
Route::post('/onlogin', [App\Http\Controllers\client\authController::class, 'onlogin'])->name('client.onlogin');
Route::get('/registration', [App\Http\Controllers\client\authController::class, 'registration'])->name('client.registration');
Route::post('/addUser', [App\Http\Controllers\client\authController::class, 'addUser'])->name('client.addUser');
Route::get('/active/{token}', [App\Http\Controllers\client\authController::class, 'userActive'])->name('client.active');

//reset password
Route::get('/forgot', [App\Http\Controllers\client\authController::class, 'forgot'])->name('client.forgot');
Route::post('/forgotPassword', [App\Http\Controllers\client\authController::class, 'forgotPassword'])->name('client.forgotPassword');
Route::get('/recoverPassWord/{id}', [App\Http\Controllers\client\authController::class, 'recoverPassWord'])->name('client.recoverPassWord');
Route::post('/updatePassword', [App\Http\Controllers\client\authController::class, 'updatePassword'])->name('client.updatePassword');

//Rating
Route::post('/getproductreating', [\App\Http\Controllers\client\ReatingReviewController::class, 'getallreview'])->name('getproductreating');

// logout & Profile & Order
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [App\Http\Controllers\client\authController::class, 'logout'])->name('client.logout');
    Route::get('/profile', [App\Http\Controllers\client\authController::class, 'profile'])->name('client.profile');
    
    Route::get('/password-reset/{id}', [App\Http\Controllers\client\authController::class, 'passwordResetView'])->name('client.passwordReset');
    Route::post('/passwordUpdate/{id}', [App\Http\Controllers\client\authController::class, 'resetPassword'])->name('client.passwordUpdate');
    
    Route::get('/profileEdit/{id}', [App\Http\Controllers\client\authController::class, 'profileEdit'])->name('client.profileEdit');
    Route::post('/upadeteProfile/{id}', [App\Http\Controllers\client\authController::class, 'upadeteProfile'])->name('client.upadeteProfile');
    Route::post('/processOrder', [App\Http\Controllers\client\CartController::class, 'order'])->name('client.processOrder');
    Route::get('/orderDetails/{id}', [App\Http\Controllers\client\CartController::class, 'orderDetails'])->name('client.orderDetails');
    //Rating
    Route::post('/reating', [\App\Http\Controllers\client\ReatingReviewController::class, 'store'])->name('clint.reatingReview');
    Route::post('/favorite/{post}/add', [\App\Http\Controllers\client\FavouriteController::class, 'index'])->name('client.favorite');
    Route::get('/favourite/show', [\App\Http\Controllers\client\FavouriteController::class, 'show'])->name('client.favoriteShow');
});





Route::group(['prefix' => '/auth'], function() {
    Route::get('/login/{service}', [App\Http\Controllers\client\authController::class, 'redirect'])->name('client.SSOLogin');
    Route::get('/login/{service}/callback', [App\Http\Controllers\client\authController::class, 'callback']);
});








//Clear Cache facade value:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize:clear');
    return '<h1>optimize cleared</h1>';
});




//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});



//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear Config cache:
Route::get('/storage', function() {
    $exitCode = Artisan::call('storage:link');
    return '<h1>Storage Link Created</h1>';
});

//Clear Config cache:
Route::get('/seed-anis', function() {
    $exitCode = Artisan::call('db:seed');
    return '<h1>migrate  Created</h1>';
});

//Clear Config cache:
Route::get('/migrate-anis', function() {
    $exitCode = Artisan::call('migrate');
    return '<h1>migrate  Created</h1>';
});
