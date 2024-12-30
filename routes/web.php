<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\userController;
use App\Http\Controllers\User\FlowerUserBookingController;

// product controller
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductBookingController;


use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\FlowerRegistrationController;
use App\Http\Controllers\User\FlowerAddressController;
use App\Http\Controllers\OtplessLoginController;
             
use Twilio\Rest\Client;


Route::fallback(function () {
    abort(404);
});
Route::get('/otplogin', [OtplessLoginController::class, 'otplogin'])->name('otplogin');
Route::post('/send-otp-user', [OtplessLoginController::class, 'sendOtp']);
Route::post('/verify-otp-user', [OtplessLoginController::class, 'verifyOtp']);

Route::controller(userController::class)->group(function() {
    Route::get('/userlogin', 'userlogin')->name('userlogin');
    Route::post('user/logout', 'userlogout')->name('userlogout');
});

Route::controller(ProductController::class)->group(function() {
    Route::get('/', 'showProduct')->name('userindex');
    Route::get('/product/{slug}', 'productdetails')->name('product.productdetails');
});

Route::group(['middleware' => ['auth:users']], function () {

    Route::controller(ProductController::class)->group(function() {
        Route::get('/checkout/{product_id}',  'show')->name('checkout');

    });
});

Route::group(['middleware' => ['auth:users']], function () {
    Route::controller(ProductBookingController::class)->group(function() {
        Route::post('/booking/product/subscription', 'processBooking')->name('booking.product.subscription');
        Route::get('/subscription-history', 'subscriptionhistory')->name('subscription.history');
        Route::get('/subscription-details/{order_id}',  'viewSubscriptionOrderDetails')->name('subscription.details');
        Route::get('/cutsomized-checkout/{product_id}',  'cutsomizedcheckout')->name('cutsomized-checkout');
        Route::post('/booking/customized-order', 'customizedstore')->name('booking.flower.customizedstore');
        Route::get('/requested-order-history', 'requestedorderhistory')->name('requested.order.history'); 
        Route::get('/requested-order/{id}/details', 'requestedOrderDetails')->name('requested.order.details');
        Route::post('/request-order/payment', 'RequestpaymentCallback')->name('request.order.payment.callback');
    });
});

Route::group(['middleware' => ['auth:users']], function () {
    Route::controller(FlowerUserBookingController::class)->group(function() {
        // customized order route

        Route::get('/user-flower-dashboard', 'userflowerdashboard')->name('userflowerdashboard');
       

    });
    Route::controller(FlowerAddressController::class)->group(function() {
      
        Route::get('/manage-user-address', 'mnguseraddress')->name('mnguseraddress');
        Route::get('/useraddress/set-default/{id}', 'usersetDefault')->name('usersetDefaultAddress');
        Route::get('/user-add-address', 'useraddaddress')->name('useraddaddress');
        Route::get('/get-apartments', 'getApartments')->name('get.apartments');
        Route::get('/useraddaddress', 'useraddfrontaddress')->name('useraddfrontaddress');
        Route::post('/saveuseraddress', 'saveuseraddress')->name('saveuseraddress');
        Route::post('/savefrontaddress', 'savefrontaddress')->name('savefrontaddress');
        Route::get('edituseraddress/{id}',  'edituseraddress')->name('edituseraddress');
        Route::post('updateuseraddress', 'updateuseraddress')->name('updateuseraddress');
        Route::get('removeaddress/{id}',  'removeAddress')->name('removeaddress');

    });
});
//user middleware routes

Route::group(['middleware' => ['auth:users']], function () {
        Route::controller(userController::class)->group(function() {
        Route::get('/user-dashboard', 'userdashboard')->name('userdashboard');
        Route::get('/manage-address', 'mngaddress')->name('mngaddress');
        Route::get('/address/set-default/{id}', 'setDefault')->name('setDefaultAddress');
        Route::get('/addaddress', 'addfrontaddress')->name('addfrontaddress');
        Route::get('/add-address', 'addaddress')->name('addaddress');
        Route::post('/saveaddress', 'saveaddress')->name('saveaddress');
        // Route::post('/savefrontaddress', 'savefrontaddress')->name('savefrontaddress');

        Route::get('editaddress/{id}',  'editAddress')->name('editAddress');
        Route::post('updateaddress', 'updateAddress')->name('updateaddress');
        Route::get('removeaddress/{id}',  'removeAddress')->name('removeaddress');

        Route::get('/booking-history', 'orderhistory')->name('booking.history');
        Route::get('/rate-pooja/{id}','ratePooja')->name('rate.pooja');
        // Route::post('submit-rating', 'submitRating')->name('submitRating');
        // Route::post('/submit-or-update-rating',  'submitOrUpdateRating')->name('submitOrUpdateRating');
        Route::post('/submitOrUpdateRating', 'submitOrUpdateRating')->name('submitOrUpdateRating');

        Route::get('/view-ordered-pooja-details/{id}', [UserController::class, 'viewdetails'])->name('viewdetails');

        // Route::get('/view-ordered-pooja-details', 'viewdetails')->name('viewdetails');
        Route::get('/userprofile', 'userprofile')->name('user.userprofile');
        Route::get('/coupons', 'coupons')->name('coupons');
        // Route::delete('/profile/photo', 'deletePhoto')->name('user.deletePhoto');
        Route::put('/profile',  'updateProfile')->name('user.updateProfile');

        Route::delete('/delete-user-photo', 'deletePhoto')->name('delete.user.photo');

    });
});
Route::group(['middleware' => ['auth:users']], function () {
    Route::get('/payment/{booking_id}', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
    Route::post('/payment/process/{booking_id}', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/booking-success/{booking}', [PaymentController::class,'bookingSuccess'])->name('booking.success');
    Route::get('/cancel-pooja/{id}', [PaymentController::class, 'showCancelForm'])->name('cancelForm');
    Route::post('/cancel-pooja/{booking_id}', [PaymentController::class, 'cancelBooking'])->name('cancelBooking');
    Route::post('/payment/pay-remaining/{booking_id}', [PaymentController::class, 'processRemainingPayment'])->name('payment.processRemainingPayment');
    Route::get('/pay-remaining-amount/{booking_id}', [PaymentController::class, 'payRemainingAmount'])->name('payRemainingAmount');
  
});