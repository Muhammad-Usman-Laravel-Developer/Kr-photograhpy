<?php

use App\Http\Controllers\admin\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminBannerController;
use App\Http\Controllers\admin\AdminCompetitionController;
use App\Http\Controllers\admin\AdminTestimonialsController;
use App\Http\Controllers\admin\AdminServicesController;
use App\Http\Controllers\admin\AdminProductDetailsController;
use App\Http\Controllers\UIcontroller;

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
//     return redirect()->route('admin_login');
// });
// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [UIcontroller::class, 'index'])->name('index');
Route::get('/user-login', [UIcontroller::class, 'login'])->name('user_login');
Route::post('/user-login-post', [UIcontroller::class, 'login_post'])->name('user_login_post');
Route::get('/user-register', [UIcontroller::class, 'register'])->name('user_register');
Route::post('/user-register-post', [UIcontroller::class, 'register_post'])->name('user_register_post');
Route::get('/password-reset', [UIcontroller::class, 'password_reset'])->name('user_pass_reset');
Route::get('/user-myredeem', [UIcontroller::class, 'myredeem'])->name('user_myredeem');
Route::post('/competition', [UIcontroller::class, 'competition'])->name('competition');
Route::get('/user-logout', [UIcontroller::class, 'user_logout'])->name('user_logout');
Route::get('/iframe', [UIcontroller::class, 'iframe'])->name('iframe');
Route::get('/redeem-code', [UIcontroller::class, 'redeem_code'])->name('ui_redeem_code');
Route::post('/redeem-code-post', [UIcontroller::class, 'redeem_code_post'])->name('redeem_code_post');

Route::group(['middleware'=>['usermiddleware']], function(){
    Route::get('/stripe-form', [UIcontroller::class, 'stripe_form'])->name('stripe_form');
    Route::post('/stripe-events', [UIcontroller::class, 'stripe_events'])->name('stripe.post');
});
//stripe




/*---------------------------------------Admin-Routes---------------------------------------------- */
/**Auth Routes */
    Route::get('/admin-login', [AdminAuthController::class, 'login'])->name('admin_login');
    Route::post('/admin/login-data', [AdminAuthController::class, 'login_data'])->name('login_data_page');
    Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');

/**Admin Auth Middleware Starts */
Route::group(['middleware'=>['protectedPage']], function(){

    // AdminBannerController dashboard
    //AdminAuthController user
    //AdminCompetitionController competition
    //AdminTestimonialsController orders

    /**Dashboard Routes */
        Route::get('/admin/dashboard', [AdminBannerController::class, 'dashboard'])->name('admin_dashboard');

    /**Banner Routes */
        Route::get('/admin/banner-list', [AdminBannerController::class, 'banner'])->name('admin_banners');
        Route::get('/admin/banner-add', [AdminBannerController::class, 'banner_add'])->name('admin_banners_add');
        Route::get('/admin/banner-edit/{id?}', [AdminBannerController::class, 'banner_edit'])->name('admin_banners_edit');
        Route::get('/admin/banner-delete/{banner?}', [AdminBannerController::class, 'banner_delete'])->name('admin_banners_delete');
        Route::post('/admin/banner-add-edit/{banner?}', [AdminBannerController::class, 'banner_add_edit_data'])->name('admin_banners_add_edit');

    /**Profile Routes */
        Route::get('/admin/profile', [AdminAuthController::class, 'admin_profile'])->name('admin_profile');
        Route::post('/admin/profile-update/{user?}', [AdminAuthController::class, 'admin_profile_update'])->name('admin_profile_update');
        Route::post('/admin/profile-pass-update/{user?}', [AdminAuthController::class, 'admin_password_update'])->name('admin_password_update');

    /**User Routes*/
        Route::get('/admin/user-list', [AdminAuthController::class, 'user_list'])->name('admin_users');
        Route::get('/admin/user-add', [AdminAuthController::class, 'user_add'])->name('admin_users_add');
        Route::get('/admin/user-edit/{id?}', [AdminAuthController::class, 'user_edit'])->name('admin_users_edit');
        Route::get('/admin/user-delete/{user?}', [AdminAuthController::class, 'user_delete'])->name('admin_users_delete');
        Route::post('/admin/user-add-edit/{user?}', [AdminAuthController::class, 'user_add_edit_data'])->name('admin_users_add_edit');

    /**Competition Routes */
        Route::get('/admin/Competition-list', [AdminCompetitionController::class, 'Competition_list'])->name('admin_Competition');
        Route::get('/admin/Competition-add', [AdminCompetitionController::class, 'Competition_add'])->name('admin_Competition_add');
        Route::get('/admin/Competition-edit/{id?}', [AdminCompetitionController::class, 'Competition_edit'])->name('admin_Competition_edit');
        Route::get('/admin/Competition-delete/{Competition?}', [AdminCompetitionController::class, 'Competition_delete'])->name('admin_Competition_delete');
        Route::post('/admin/Competition-add-edit/{Competition?}', [AdminCompetitionController::class, 'Competition_add_edit_data'])->name('admin_Competition_add_edit');
    /**Testimonials Routes */
        Route::get('/admin/order', [AdminTestimonialsController::class, 'order'])->name('order');
        Route::get('/admin/testimonial-add', [AdminTestimonialsController::class, 'testimonial_add'])->name('admin_testimonials_add');
        Route::get('/admin/testimonial-edit/{id?}', [AdminTestimonialsController::class, 'testimonial_edit'])->name('admin_testimonials_edit');
        Route::get('/admin/testimonial-delete/{testimonial?}', [AdminTestimonialsController::class, 'testimonial_delete'])->name('admin_testimonials_delete');
        Route::post('/admin/testimonial-add-edit/{testimonial?}', [AdminTestimonialsController::class, 'testimonial_add_edit_data'])->name('admin_testimonials_add_edit');


});










