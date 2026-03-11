<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api', 'verified', 'throttle:80,1']], function() {
    // Portfolio
    Route::group(['prefix' => 'app/portfolio'], function () {
        Route::get('/', 'API\v2\PortfolioApi@index');
        Route::get('/asset/types', 'API\v2\PortfolioApi@portfolioAssetTypes');
        Route::get('/information', 'API\v2\PortfolioApi@information');
        Route::post('/asset', 'API\v2\PortfolioApi@store');
        Route::get('/{braid}', 'API\v2\PortfolioApi@braid');
        Route::get('/{braid}/{id}', 'API\v2\PortfolioApi@braidInformation');
        Route::delete('/{id}', 'API\v2\PortfolioApi@destroy');

        Route::post('/update/note/{id}', 'API\v2\PortfolioApi@updateAssetNote');
        Route::post('/update/photo/{id}', 'API\v2\PortfolioApi@updateAssetPhoto');
        Route::post('/update/details/{id}', 'API\v2\PortfolioApi@updateAssetDetails');
        Route::post('/update/records/{id}', 'API\v2\PortfolioApi@updateAssetRecords');
    });
});