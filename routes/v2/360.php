<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api', 'verified', 'throttle:80,1']], function() {

    Route::group(['prefix' => 'app/360'], function () {
        // Overview
        Route::get('/tiles', 'API\v2\WheelController@tiles');
        Route::get('/ilab', 'API\v2\WheelController@ilab');
        Route::post('/ilab', 'API\v2\WheelController@storeILab');
        Route::get('/expenditure', 'API\v2\WheelController@expenditure');
        //Philantropy
        Route::get('/philantrophy', 'API\v2\WheelController@philanthropy');
        Route::post('/philantrophy', 'API\v2\WheelController@savePhilanthropy');
        // Net Worth
        Route::get('/net-worth', 'API\v2\NetWorthController@netWorth');
        Route::post('/net-worth', 'API\v2\NetWorthController@storeNet');
        // Equity
        Route::get('/equity', 'API\v2\EquityController@index');
        Route::get('/equity/info', 'API\v2\EquityController@equityInfo');
        Route::post('/equity', 'API\v2\EquityController@store');
        Route::put('/equity/{id}', 'API\v2\EquityController@update');
        // Protection
        Route::get('/protection', 'API\v2\ProtectionController@index');
        Route::get('/protection/config', 'API\v2\ProtectionController@config');
        Route::post('/protection', 'API\v2\ProtectionController@store');
        Route::put('/protection/{id}', 'API\v2\ProtectionController@update');
        // Retirement
        Route::get('/retirement', 'API\v2\RetirementController@index');
        Route::post('/retirement', 'API\v2\RetirementController@store');
        Route::put('/retirement/{id}', 'API\v2\RetirementController@update');
        // ROI
        Route::get('/retirement/roi', 'API\v2\RoiController@roiStatus');
        Route::post('/improve/roi', 'API\v2\RoiController@improveRoi');
        // Cash
        Route::get('/cash', 'API\v2\CashController@index');
        Route::post('/cash', 'API\v2\CashController@store');
        Route::put('/cash/{id}', 'API\v2\CashController@update');
        // Income
        Route::get('/income', 'API\v2\IncomeController@index');
        Route::post('/income', 'API\v2\IncomeController@store');
        Route::put('/income/{id}', 'API\v2\IncomeController@update');
        Route::post('/income/{id}/records', 'API\v2\IncomeController@updateRecord');
        Route::get('/income/{id}/non_portfolio', 'API\v2\IncomeController@nonPortfolioDetail');
        // Liabilities
        Route::get('/liability', 'API\v2\LiabilityController@index');
        Route::post('/liability', 'API\v2\LiabilityController@store');
        Route::put('/liability/{id}', 'API\v2\LiabilityController@update');
        // Mortgages
        Route::get('/mortgage', 'API\v2\MortgageController@index');
        Route::post('/mortgage', 'API\v2\MortgageController@store');
        Route::put('/mortgage/{id}', 'API\v2\MortgageController@update');
        // Investment
        Route::get('/investment', 'API\v2\PortfolioController@investment');
    });
});