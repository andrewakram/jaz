<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/send_code', 'Api\User\UserController@sendCode');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//
Route::post('/forgetMyPassword', 'Api\User\UserController@forgetMyPassword');
Route::post('/checkMyCode', 'Api\User\UserController@checkMyCode');
Route::post('/renewMyPass', 'Api\User\UserController@renewMyPass');
Route::post('/logout', 'Api\User\UserController@logout');
Route::post('/updateLocation', 'Api\User\UserController@updateLocation');
Route::post('worker/changeOnlineStatus', 'Api\User\UserController@changeOnlineStatus');


Route::group(['prefix' => '/user'], function (){
    //Start apis authentication
    Route::post('/register', 'Api\User\AuthController@register');
    Route::post('/code_send', 'Api\User\AuthController@codeSend');
    Route::post('/code_check', 'Api\User\AuthController@codeCheck');
    Route::post('/login', 'Api\User\AuthController@login');
    Route::post('/forget_password', 'Api\User\AuthController@forgetPassword');
    //End apis authentication

    //Start apis categories
    Route::post('/category', 'Api\User\HomeController@category');
    Route::post('/sub_category', 'Api\User\HomeController@subCategory');
    Route::post('/third_category', 'Api\User\HomeController@thirdCategory');
    Route::post('/fourth_category', 'Api\User\HomeController@fourthCategory');
    //End apis categories

    //Start apis orders
    Route::post('/order', 'Api\User\OrderController@create');
    Route::post('/active_requests', 'Api\User\OrderController@activeRequests');
    Route::post('/companies_active_requests', 'Api\User\OrderController@companiesActiveRequests');
    Route::post('/company_details', 'Api\User\OrderController@companyDetails');
    Route::post('/message', 'Api\User\OrderController@message');
    Route::post('/get_message', 'Api\User\OrderController@getMessage');
    Route::post('/order_status', 'Api\User\OrderController@orderStatus');
    Route::post('/accept_third_cat', 'Api\User\OrderController@acceptThirdCat');
    Route::post('/payment_status', 'Api\User\OrderController@paymentStatus');
    Route::post('/order_history', 'Api\User\OrderController@orderHistory');
    Route::post('/order_detail', 'Api\User\OrderController@orderDetail');
    Route::post('/rate', 'Api\User\OrderController@rate');
    Route::post('/cancel_order', 'Api\User\OrderController@cancelOrder');
    Route::post('/show_worker_third_cat', 'Api\User\OrderController@showWorkerThirdCat');
    //End apis orders

    //Start apis user
    Route::post('/notification', 'Api\User\UserController@notification');
    Route::post('/chat_list', 'Api\User\UserController@chatList');
    Route::post('/update', 'Api\User\UserController@updateUser');
    Route::post('/update_password', 'Api\User\UserController@updatePassword');
    Route::get('/all_companies', 'Api\User\OrderController@allCompanies');
    //End apis user

    //Start apis app
    Route::post('/complain_suggestions', 'Api\App\AppController@complainSuggest');
    Route::get('/about_us', 'Api\App\AppController@aboutUs');
    Route::get('/term_condition', 'Api\App\AppController@termCondition');
    //End apis app
});

Route::group(['prefix' => '/worker'], function (){
    Route::post('/register', 'Api\Worker\AuthController@register');
    Route::post('/code_send', 'Api\Worker\AuthController@codeSend');
    Route::post('/code_check', 'Api\Worker\AuthController@codeCheck');
    Route::post('/login', 'Api\Worker\AuthController@login');
    Route::post('/forget_password', 'Api\Worker\AuthController@forgetPassword');
    Route::get('/cities', 'Api\Worker\AuthController@cities');

    //Start apis orders
    Route::post('/home_worker', 'Api\Worker\OrderController@homeWorker');
    Route::post('/show_worker_third_cat', 'Api\Worker\OrderController@showWorkerThirdCat');
    Route::post('/check_third_cat', 'Api\Worker\OrderController@checkThirdCat');
    Route::post('/third_cat', 'Api\Worker\OrderController@getThirdCat');
    Route::post('/choose_worker_third_cat', 'Api\Worker\OrderController@chooseWorkerThirdCat');
    Route::post('/accept_order', 'Api\Worker\OrderController@acceptOrder');
    Route::post('/send_cost', 'Api\Worker\OrderController@sendCost');
    Route::post('/order_details', 'Api\Worker\OrderController@orderDetails');
    Route::post('/change_status', 'Api\Worker\OrderController@changeStatus');
    Route::post('/cancel_order', 'Api\Worker\OrderController@workerCancelOrder');
    //End apis orders

    //Start apis user
    Route::post('/get_notification', 'Api\Worker\WorkerController@getNotification');
    Route::post('/chat_list', 'Api\Worker\WorkerController@getChatList');
    Route::post('/update', 'Api\Worker\WorkerController@updateWorker');
    Route::post('/update_password', 'Api\Worker\WorkerController@updatePassword');
    Route::post('/get_worker_third_cat', 'Api\Worker\WorkerController@getWorkerThirdCat');
    Route::post('/add_worker_third_cat', 'Api\Worker\WorkerController@addWorkerThirdCat');
    Route::post('/edit_worker_third_cat', 'Api\Worker\WorkerController@editWorkerThirdCat');
    Route::post('/delete_worker_third_cat', 'Api\Worker\WorkerController@deleteWorkerThirdCat');
    Route::post('/order_history', 'Api\Worker\WorkerController@orderHistory');
    Route::post('/show_orders_fee', 'Api\Worker\WorkerController@showOrdersFee');
    Route::post('/credit', 'Api\Worker\WorkerController@credit');
    //End apis orders
    
    Route::post('/services', 'Api\Worker\WorkerController@services');

});

