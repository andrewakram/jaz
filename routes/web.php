<?php

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
use \App\Http\Middleware\IsAdmin;

Route::get('/base', function () {
    return view('welcome');
});


/*Route::get('/1', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "good";
});*/


Route::group(['prefix' => '/admin'], function (){
    Route::get('/login', 'Admin\AuthController@login_view');
    Route::post('/login', 'Admin\AuthController@login')->name('login');
    Route::get('/logout', 'Admin\AuthController@logout')->name('logout');
    Route::get('/get_sub_cats/', 'Admin\WorkerController@getSubCat');

        Route::group(['middleware' => 'auth:admin'], function (){

                Route::get('/dashboard', 'Admin\HomeController@dashboard')->name('dashboard');

            Route::group(['middleware' => ['permission:View user']], function () {
                Route::get('/users/type/{type}', 'Admin\UserController@index')->name('users_view');
                Route::group(['middleware' => ['permission:Add user']], function () {
                    Route::resource('/users', 'Admin\UserController');
                });
                Route::group(['middleware' => ['permission:Active user']], function () {
                    Route::post('/users/change_status', 'Admin\UserController@changeStatus')->name('userChangeStatus');
                });
                Route::get('/user/search', 'Admin\UserController@search');
                Route::get('/searchCost', 'Admin\OrderController@search2');
            });

            Route::group(['middleware' => ['permission:View company worker|View app worker']], function () {
                Route::group(['middleware' => ['permission:Add company worker']], function () {
                    Route::resource('/workers_company', 'Admin\WorkerController');
                });
                Route::group(['middleware' => ['permission:Active company worker']], function () {
                    Route::post('/active_contract', 'Admin\WorkerController@activeContract')->name('worker_active_contract');
                });
                Route::group(['middleware' => ['permission:Edit company worker']], function () {
                    Route::post('/workers_company/update', 'Admin\WorkerController@update')->name('updateWorker');
                });
                Route::group(['middleware' => ['permission:View app worker']], function () {
                    Route::get('/workers/{type}', 'Admin\WorkerController@workers')->name('workers');
                });
                Route::group(['middleware' => ['permission:Active app worker|Suspend app worker']], function () {
                    Route::post('/change_status', 'Admin\WorkerController@changeStatus')->name('worker_change_status');
                });
                Route::get('/worker/search', 'Admin\WorkerController@search');
                Route::get('/worker/admin_contract_pdf', 'Admin\WorkerController@showAdminContractPdf');
                Route::post('/worker/upload_admin_contract_pdf', 'Admin\WorkerController@uploadAdminContractPdf')->name('uploadAdminContractPdf');
                Route::post('/worker/edit_admin_contract_pdf', 'Admin\WorkerController@editAdminContractPdf')->name('editAdminContractPdf');
            });

            Route::group(['middleware' => ['permission:View admins']], function () {
                Route::resource('admins', 'Admin\AdminController');
            });

            Route::group(['middleware' => ['permission:View categories']], function () {
                Route::resource('/categories', 'Admin\CategoryController');
                Route::post('/categories/mainCat', 'Admin\CategoryController@storeMainCat')->name('storeMainCat');
                Route::group(['middleware' => ['permission:View sub category']], function () {
                    Route::get('/sub_cats/{id}', 'Admin\CategoryController@showSubCat')->name('sub_cats');
                });
                Route::group(['middleware' => ['permission:View third category']], function () {
                    Route::get('/third_cats/{id}', 'Admin\CategoryController@showThirdCat')->name('third_cats');
                });
                Route::group(['middleware' => ['permission:View third category']], function () {
                    Route::get('/fourth_cats/{id}', 'Admin\CategoryController@showFourthCat')->name('fourth_cats');
                });
                Route::group(['middleware' => ['permission:Add third category']], function () {
                    Route::post('/categories/store', 'Admin\CategoryController@storeThird')->name('storeThird');
                });
                Route::group(['middleware' => ['permission:Edit third category']], function () {
                    Route::post('/categories/edit', 'Admin\CategoryController@editCat')->name('editCat');
                    Route::post('/mainCategories/edit', 'Admin\CategoryController@editMainCat')->name('editMainCat');
                    Route::get('/categories/editStatus/{id}', 'Admin\CategoryController@editCatStatus')->name('editCatStatus');
                });
            });

            /*///////////////////*/

            Route::resource('/cities', 'Admin\CityController');
            Route::post('/cities/edit', 'Admin\CityController@edit_city')->name('editCity');
            Route::get('/cities/editStatus/{id}', 'Admin\CityController@editCityStatus')->name('editCityStatus');

            Route::resource('/sliders', 'Admin\SliderController');
            Route::post('/sliders/edit', 'Admin\SliderController@edit_slid')->name('editSlid');
            Route::get('/sliders/deleteSlid/{id}', 'Admin\SliderController@deleteSlid')->name('deleteSlid');

            Route::resource('/parteners', 'Admin\PartenerController');
            Route::post('/parteners/edit', 'Admin\PartenerController@edit_partener')->name('editpartener');
            Route::get('/parteners/deletePartener/{id}', 'Admin\PartenerController@deletepartener')->name('deletepartener');

            Route::resource('/visions', 'Admin\VisionController');
            Route::post('/visions/edit', 'Admin\VisionController@edit_vision')->name('editVision');

            Route::resource('/benfits', 'Admin\BenfitController');
            Route::post('/benfits/edit', 'Admin\BenfitController@edit_benfit')->name('editBenfit');

            Route::resource('/newsletters', 'Admin\NewsletterController');
            Route::post('/newsletters/edit', 'Admin\NewsletterController@edit_newsletter')->name('editNewsletter');
            Route::get('/newsletters/deleteNewsletter/{id}', 'Admin\NewsletterController@deletenewsletter')->name('deleteNewsletter');

            Route::resource('/contactus', 'Admin\ContactusController');
            Route::get('/contactus/deleteContact/{id}', 'Admin\ContactusController@deleteContact')->name('deleteContactUs');

            Route::resource('/teams', 'Admin\TeamController');
            Route::post('/teams/edit', 'Admin\TeamController@edit_team')->name('editTeam');
            Route::get('/teams/deleteTeam/{id}', 'Admin\TeamController@deleteteam')->name('deleteTeam');

            Route::resource('/services', 'Admin\ServiceController');
            Route::post('/services/edit', 'Admin\ServiceController@edit_service')->name('editService');
            Route::get('/services/deleteService/{id}', 'Admin\ServiceController@deleteservice')->name('deleteService');

            Route::resource('/clientreviews', 'Admin\ReviewController');
            Route::post('/clientreviews/edit', 'Admin\ReviewController@edit_review')->name('editReview');
            Route::get('/clientreviews/deleteReview/{id}', 'Admin\ReviewController@deletereview')->name('deleteReview');

            Route::resource('/albums', 'Admin\AlbumController');
            Route::get('/albums/deleteAlbum/{id}', 'Admin\AlbumController@deletealbum')->name('deleteAlbum');


            /*/////////////////////////*/

            Route::group(['middleware' => ['permission:View orders']], function () {
                Route::get('/orders', 'Admin\OrderController@index')->name('orders');
                Route::get('/costsReport', 'Admin\OrderController@indexCost')->name('costsReport');
                Route::get('/costsUserReport', 'Admin\OrderController@indexUserCost')->name('costsUserReport');
                Route::get('/orders/{id}/view', 'Admin\OrderController@view')->name('orders_view');
                Route::get('/orders/{id}/ChangePaymentStatus', 'Admin\OrderController@changePayStatus')->name('orders_paymentStatus');
                Route::get('/orders/export', 'Admin\OrderController@orders_export');
                Route::get('/costs/export', 'Admin\OrderController@costs_export');
                Route::get('/costsUser/export', 'Admin\OrderController@costsUser_export');

                Route::group(['middleware' => ['permission:Accept orders']], function () {
                    Route::post('/order/accept', 'Admin\OrderController@acceptOrder')->name('acceptOrder');
                });
                Route::group(['middleware' => ['permission:Reject orders']], function () {
                    Route::post('/order/reject', 'Admin\OrderController@rejectOrder')->name('rejectOrder');
                    Route::post('/order/finish', 'Admin\OrderController@finishOrder')->name('finishOrder');
                });
                Route::get('/search', 'Admin\OrderController@search');
                Route::get('/searchCost', 'Admin\OrderController@search2');
                Route::get('/searchUserCost', 'Admin\OrderController@search3');

                Route::get('/get_sub_category/{parent}','Admin\CategoryController@get_sub_category');
            });

            Route::group(['prefix' => '/settings'], function(){

                Route::group(['middleware' => ['permission:View settings']], function () {
                    Route::get('complain_suggest', 'Admin\HomeController@complainSuggest')->name('complainSuggest');
                    Route::post('delete_complain_suggest', 'Admin\HomeController@deleteComplainSuggest')->name('deleteComplainSuggest');

                    Route::get('/{type}', 'Admin\HomeController@settings');

                    Route::group(['middleware' => ['permission:Edit settings']], function () {
                        Route::get('/{type}/edit', 'Admin\HomeController@editSettings');
                        Route::post('/{type}/edit/update', 'Admin\HomeController@updateSettings');
                    });
                });

            });
        });
});



