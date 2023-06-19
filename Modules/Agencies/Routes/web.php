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
    Route::controller(AgenciesController::class)->group(function() {
        Route::get('/agencies', 'index')->name('agencies');

        /** agencies info */
        Route::get('/agency-info','agency_info')->name('agency-info');
        Route::post('/store-agency-info','store_agency_info')->name('store-agency-info');
        Route::post('/update-agency-info','update_agency_info')->name('update-agency-info');

        /** agencies country info */
        Route::get('/create-agency-country','create_agency_country')->name('create-agency-country');
        Route::get('/delete-agency-country/{agency_country_id}','delete_agency_country')->name('delete-agency-country');
        Route::post('/store-agency-country','store_agency_country')->name('store-agency-country');
        Route::get('/edit-agency-country/{agency_country_id}','edit_agency_country')->name('edit-agency-country');
        Route::put('/update-agency-country/{agency_country_id}','update_agency_country')->name('update-agency-country');

        /** agencies terms */
        Route::get('/create-agency-terms/{agency_country_id}','create_agency_terms')->name('create-agency-terms');
        Route::post('/store-agency-terms/{agency_country_id}','store_agency_terms')->name('store-agency-terms');
        Route::get('delete-agency-term/{term_id}','delete_agency_term')->name('delete-agency-term');
        Route::get('edit-agency-term/{agency_country_id}/{term_id}/','edit_agency_term')->name('edit-agency-term');
        Route::put('update-agency-term/{term_id}/','update_agency_term')->name('update-agency-term');
    });

    Route::controller(AgentsController::class)->group(function() {
        Route::get('/agents','index')->name('agents-show');
        Route::get('/agent/{agent_id}','show')->name('agent-details');
        Route::put('update-agent-status/{agent_id}','update')->name('update-agent-status');
    });
});


Route::group(['namespace' => 'Front'],function(){
    Route::controller(AgenciesController::class)->group(function() {
        Route::get('agencies','index')->name('list-agencies');
        Route::get('agency/{agency_id}','agency_show')->name('agency-show');
        Route::group(['middleware' => ['customer', 'verified', 'unbanned']], function() {
            Route::get('agency-join/{agency_id}','agency_join')->name('agency-join');
            Route::get('terms-agency-country','terms_agency_country')->name('terms-agency-country');
            Route::post('store-agency-join','create_join_request')->name('store-agency-join');
            Route::get('agencies-request','agencies_orders_dashboard')->name('agencies-join-orders-dashboard');
            Route::get('agency-join-info/{request_id}','agency_join_info')->name('agency-join-info');
        });
    });
});

Route::group(['namespace' => 'Admin','prefix' => 'admin', 'middleware' => ['admin'], 'as' => 'admin.'],function(){
   Route::controller(AgencyController::class)->group(function(){
        Route::get('seller-agencies','index')->name('seller-agencies');
        Route::get('agencies-show/{id}','show')->name('agencies-show');
        Route::get('agency-agents/{agency_id}','show_agency_agents')->name('agency-agents');
        Route::post('agent-approved','update_agency_agents')->name('agency-agent-approve');
   });
});

Route::get('clear-all',function(){
    \Artisan::call('config:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('cache:clear');
});
