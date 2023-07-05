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

Route::group(['namespace' => 'Seller', 'prefix' => 'seller', 'middleware' => ['seller', 'verified'], 'as' => 'seller.'], function () {
    Route::prefix('meetings')->name('meetings.')->group(function () {
        Route::resource('/appointments', 'AppointmentController');
        Route::post('appointments/update_status', 'AppointmentController@update_status')->name('appointments.update_status');
        Route::post('appointments/duplicate', 'AppointmentController@duplicate')->name('appointments.duplicate');
        Route::get('appointments/requests/booking', 'AppointmentController@booking_requests')->name('appointments.booking_requests');
        Route::get('appointments/edit/booking/{id}', 'AppointmentController@edit_booking_requests')->name('appointments.booking.edit');
        Route::put('appointments/update/booking/{id}', 'AppointmentController@update_booking_requests')->name('appointments.booking.update');
        Route::get('appointments/lists/booked', 'AppointmentController@lists_booked')->name('appointments.lists_booked');
        Route::get('expired/appointments-lists','AppointmentController@lists_expired_booked')->name('appointments.lists_expired_booked');
        Route::get('appointment/setting-zoom-app','AppointmentController@setting_zoom_app')->name('appointments.setting_zoom_app');
        Route::get('appointment/zoom-app-integration','AppointmentController@zoom_app_integration')->name('appointments.zoom_app_integration');
    });
});

Route::group(['namespace' => 'Front'],function(){
    Route::prefix('meetings')->name('meetings.')->group(function () {
        Route::get('/appointments', 'AppointmentController@index')->name('appointments.index');
        Route::get('/appointments/shop/{shop_slug}','AppointmentController@show')->name('appointments.shop');
    });
});

Route::group(['namespace' => 'Front','middleware' => ['user']],function(){
    Route::prefix('meetings')->name('meetings.')->group(function () {
        Route::post('/appointments/booking', 'AppointmentController@booking_appointment')->name('appointments.booking');
        Route::post('/appointments/booking/{id}/{status}', 'AppointmentController@update_booking_appointment_status')->name('appointments.cancel');
        Route::get('/appointments/booked', 'AppointmentController@all_booked_appointments')->name('appointments.booked');
        Route::get('/appointments/ended/booked', 'AppointmentController@all_ended_booked_appointments')->name('appointments.ended_booked');
    });
});
