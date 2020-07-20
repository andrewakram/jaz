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



Route::get('/changeLanguagee/{lang}', function ($lang) {
$lang == 'en' ? Session::put('lang','ar') : Session::put('lang','en');

return back();
});
/*Route::group(['prefix '=> Session::get('lang')], function(){*/

//web site routes
Route::middleware('setlocale')->group(function () {
Route::get('/', 'WebController@webIndex')->name('webIndex');

Route::get('/provide-service', 'WebController@provideService')->name('provideService');

Route::get('/log-in', 'WebController@webLogin')->name('webLogin');
Route::get('/log-out', 'WebController@webLogout');
Route::post('/login/user', 'WebController@webLoginFunc');

Route::get('/webregister', 'WebController@webRegister')->name('webRegister');
Route::get('/register-company', 'WebController@webRegisterCompany')->name('webRegister-company');
Route::get('/register/user', 'WebController@webRegister');
Route::post('/register/newuser', 'WebController@webRegisterFunc');
Route::post('/code/check', 'WebController@webCheckCodeFunc');

Route::get('/code/verify', 'WebController@webVerify');
Route::get('/edit-profile', 'WebController@webRegister')->name('webEdit-profile');



Route::get('/categories/{main_cat}', 'WebController@webCategories')->name('webCategories');
Route::get('/choose-choice/{cat_id}', 'WebController@webChooseOrderChoice');
Route::get('/order-choice/{cat_id}/{choice}', 'WebController@webOrderChoice')->name('webOrderChoice');
Route::get('/service-type/{cat_id}', 'WebController@webServiceType')->name('webServiceType');
Route::get('/order-form/{type}', 'WebController@webOrderForm')->name('webOrderForm');
Route::post('/make-order', 'WebController@webMakeOrderForm')->name('webMakeOrderForm');

Route::get('/error-404', 'WebController@webError404')->name('webError-404');
Route::get('/forget-password', 'WebController@webForgetPassword')->name('webForget-password');
Route::post('/reset-password', 'WebController@webForgetPassFunc');
Route::post('/confirm-resetPass', 'WebController@webResetNewPass');
Route::post('/reset-newPass', 'WebController@webResetNewPassFunc');


Route::get('/forget-code', 'WebController@webForgetCode')->name('webForget-code');
Route::get('/new-password', 'WebController@webNewPassword')->name('webNew-password');
Route::get('/active-requests', 'WebController@webActiveRequests')->name('webActive-requests');
Route::get('/acceptedcompanies', 'WebController@webAcceptedCompanies')->name('webAcceptedCompanies');
Route::get('/order-tracking/{id}', 'WebController@webOrderTracking');
Route::post('/cancel-order', 'WebController@webcancelOrder')->name('webcancelOrder');

/*ajax*/
Route::get('/change/orderRate', 'WebController@changeOrderRate');
Route::get('/change/myCart-remove-order', 'WebController@updateCartOrder');
/*end ajax*/

Route::get('/companies/{id}', 'WebController@webViewCompaniesOffers');

Route::get('/company/{id}', 'WebController@webCompany');
Route::get('/order-form', 'WebController@webOrderForm')->name('webOrder-form');
Route::get('/make-order', 'WebController@webMakeOrderForm')->name('webMakeOrderForm');


Route::get('/terms-condition', 'WebController@webTermsCondition')->name('webTerms-condition');
Route::get('/contact-us', 'WebController@webContactUs')->name('webContact-us');
Route::get('/suggestion', 'WebController@webSuggestion')->name('webSuggestion');
Route::post('/addSuggestion', 'WebController@webAddSuggestion')->name('webAddSuggestion');
Route::get('/about-us', 'WebController@webAboutUs')->name('webAbout-us');
Route::get('/edit-profile', 'WebController@editProfile')->name('webEditProfile');
Route::post('/update-profile', 'WebController@updateProfileData');
Route::get('/chat/{id}/{order_id}', 'WebController@webChat')->name('webChat');

Route::post('/contact-uss', 'WebController@contact_uss');
Route::post('/send-newsletter', 'WebController@send_newsletter');
});
/*});*/

Route::get('/get/subCats{id}', 'WebController@webgetSubCategories');

Route::post('get/messages22','WebController@getMessages22')->name('getMessages22');
Route::post('add/messages22','WebController@addMessages22')->name('addMessages22');
Route::post('get/ChatUpdates22','WebController@getChatUpdates22')->name('getChatUpdates22');


Route::get('/clear-cache',function(){
Artisan::call('route:clear');
Artisan::call('view:clear');
Artisan::call('config:clear');
return "done";

});
