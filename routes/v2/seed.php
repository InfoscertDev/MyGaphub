<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api', 'verified', 'throttle:80,1']], function() {

    Route::group(['prefix' => 'app/seed'], function () {
        // SEED
        Route::get('/', 'API\v2\SeedAPI@index');
        Route::get('/target', 'API\v2\SeedAPI@target');
        Route::post('/store/budget', 'API\v2\SeedAPI@storeSetBudget');
        Route::post('/store', 'API\v2\SeedAPI@storeSeed');
        Route::post('/assign/income', 'API\v2\SeedAPI@assignSeedIncome');

        Route::get('/history/{period}', 'API\v2\SeedAPI@periodHistory');
        Route::get('/monthly/{period}', 'API\v2\SeedAPI@monthlySeedReport');
        Route::get('/history/{period}/diffrences', 'API\v2\SeedAPI@periodHistoryDiffrences');
        Route::get('/history/{period}/{seed}', 'API\v2\SeedAPI@periodHistoryReport');
        Route::get('/allocate/budget', 'API\v2\SeedAllocationAPI@listAllocation');

        // SEED Allocations
        Route::post('/allocate/budget', 'API\v2\SeedAllocationAPI@storeCategoryAllocation');
        Route::put('/allocate/budget/{id}', 'API\v2\SeedAllocationAPI@updateCategoryAllocation');
        Route::delete('/allocate/budget/{id}', 'API\v2\SeedAllocationAPI@deleteAllocation');
        Route::get('/allocate/{id}', 'API\v2\SeedAllocationAPI@showAlloction');
        Route::post('/record/spent', 'API\v2\SeedAllocationAPI@storeRecordSpent');
        Route::put('/record/spent/{id}', 'API\v2\SeedAllocationAPI@updateRecordSpend');
        Route::delete('/record/spent/{id}', 'API\v2\SeedAllocationAPI@deleteRecordSpend');
    });
});