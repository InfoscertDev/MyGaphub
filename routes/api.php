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
// Gaphub
Route::get('/acquisition/trigger/alert', 'API\v1\GaphubAlertController@triggerReapAlert');
Route::get('/acquisition/trigger/alert/{asset}', 'API\v1\GaphubAlertController@triggerAuthorizeReap');
Route::post('/gaphubers/non_member/sms', 'API\v1\GaphubAlertController@nonMemberSMS');
 
// Release A
Route::post('/mygap/newregister', 'Auth\GapAutReg@registeration');
Route::post('/mygap/login', 'Auth\GapAutAPI@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api', 'verified']], function() {
    Route::group(['prefix' => 'app'], function () {
        // Analytics  
        Route::post('/calculator', 'API\v1\SevenGAPI@createCalculator');
        Route::post('/stepquestions', 'API\v1\SevenGAPI@questions'); 
        Route::post('/seveng', 'API\v1\SevenGAPI@store');
        Route::get('/bespoke', 'API\v1\SevenGAPI@showBespoke');
        Route::post('/bespoke', 'API\v1\SevenGAPI@storeBespoke');
        Route::post('/bespoke/{id}',  'API\v1\SevenGAPI@updateBespoke');
        // Dashboard
        Route::get('/dashboard', 'API\v1\ToolAPI@dashboard'); 
        Route::post('/dashboard/tiles', 'API\v1\ToolAPI@storeTiles'); 
        Route::get('/seveng', 'API\v1\SevenGAPI@index'); 
        Route::get('/seveng/edit', 'API\v1\SevenGAPI@create'); 
        Route::get('/snapshot', 'API\v1\SevenGAPI@snapshot');
        
        Route::resource('reminder','API\v1\ReminderAPI');
        Route::get('/actionplan', 'API\v1\AssetActionController@action');
        Route::get('/todayplan', 'API\v1\AssetActionController@today');
        Route::post('/actionplan', 'API\v1\AssetActionController@store');
        
        Route::get('/acquisition/favourite/', 'API\v1\AcquisitionApi@favourite');
        Route::get('/acquisition/favourite/ganp', 'API\v1\AcquisitionApi@favouriteGanp');
        Route::get('/acquisition/favourite/{asset}', 'API\v1\AcquisitionApi@favouriteAsset');
        Route::post('/acquisition/interest/reap/{sasset}', 'API\v1\AcquisitionApi@interestReapInvestment');
        Route::post('/acquisition/investment/reap/{sasset}', 'API\v1\AcquisitionApi@reserveReapInvestment');
        Route::post('/acquisition/investment/ganp/{sasset}', 'API\v1\AcquisitionApi@reserveGanpInvestment');

        // Profiles
        Route::get('/profile', 'API\v1\ToolAPI@profile');
        Route::post('/tools/preference/exchange', 'API\v1\ToolAPI@updateExchange'); 
        Route::post('/default/picture', 'API\v1\ToolAPI@defaultpicture');
        Route::post('/picture', 'API\v1\ToolAPI@picture');
        Route::post('/editprofile', 'API\v1\ToolAPI@editprofile');
        // SEED
        Route::get('/seed', 'API\v1\SeedAPI@index');
        Route::post('/seed/store', 'API\v1\SeedAPI@storeSeed');
        // 360 
        Route::get('/360/tiles', 'API\v1\WheelController@tiles');
        Route::get('/360/ilab', 'API\v1\SeedAPI@ilab'); 
        Route::get('/360/net', 'API\v1\WheelController@netWorth'); 
        Route::get('/360/cash', 'API\v1\WheelController@cash');
        Route::get('/360/liability', 'API\v1\LiabilitiesApi@liability');
        Route::get('/360/mortgage', 'API\v1\LiabilitiesApi@mortgage');
        Route::get('/360/equity', 'API\v1\WheelController@equity');
        Route::get('/360/equity/info', 'API\v1\WheelController@equityInfo');
        Route::get('/360/protection', 'API\v1\IndependenceAPI@protection');
        Route::get('/360/expenditure', 'API\v1\SeedAPI@expenditure');
        Route::get('/360/philantrophy', 'API\v1\SeedAPI@philantrophy');
        Route::get('/360/income', 'API\v1\IndependenceAPI@income');
        Route::get('/360/retirement', 'API\v1\IndependenceAPI@retirement');
        Route::get('/360/retirement/roi', 'API\v1\IndependenceAPI@roi_status');
        Route::get('/360/investment', 'API\v1\PortfolioApi@investment'); 
        // 360 Add Account    
        Route::post('/360/ilab', 'API\v1\SeedAPI@storeILab');
        Route::post('/360/net', 'API\v1\WheelController@storeNet');
        Route::post('/360/cash', 'API\v1\WheelController@storeCash');
        Route::post('/360/liability', 'API\v1\LiabilitiesApi@storeLiability');
        Route::post('/360/mortgage', 'API\v1\LiabilitiesApi@storeMortgage');
        Route::post('/360/equity', 'API\v1\WheelController@storeEquity');
        Route::post('/360/philantrophy', 'API\v1\SeedAPI@savePhilantrophy');
        Route::post('/360/income', 'API\v1\IndependenceAPI@storeIncome');
        Route::post('/360/protection', 'API\v1\IndependenceAPI@storeProtection');
        Route::post('/360/retirement', 'API\v1\IndependenceAPI@storeRetirement');
        Route::post('/360/improve/roi', 'API\v1\IndependenceAPI@improveRoi');
        // 360 Update Account 
        Route::post('/360/liability/{id}', 'API\v1\LiabilitiesApi@updateLiability');
        Route::post('/360/mortgage/{id}', 'API\v1\LiabilitiesApi@updateMortgage');
        Route::post('/360/cash/{id}', 'API\v1\WheelController@updateCash');
        Route::post('/360/retirement/{id}', 'API\v1\IndependenceAPI@updatRetirement');
        Route::post('/360/equity/{id}', 'API\v1\WheelController@updateEquity');
        Route::post('/360/protection/{id}', 'API\v1\IndependenceAPI@updateProtection');
        Route::post('/360/income/{id}', 'API\v1\IndependenceAPI@updateIncome');
        Route::post('/360/income/records/{id}', 'API\v1\IndependenceAPI@updateIncomeRecord');
        // Portfolio
        Route::get('/portfolio', 'API\v1\PortfolioApi@index');
        Route::get('/portfolio/information', 'API\v1\PortfolioApi@information');
        Route::post('/portfolio/asset/', 'API\v1\PortfolioApi@store');
        Route::get('/portfolio/{braid}', 'API\v1\PortfolioApi@braid');  
        Route::get('/portfolio/{braid}/{id}', 'API\v1\PortfolioApi@braidInformation');
        
        Route::post('/portfolio/update/note/{id}', 'API\v1\PortfolioApi@updateAssetNote');
        Route::post('/portfolio/update/photo/{id}', 'API\v1\PortfolioApi@updateAssetPhoto');
        Route::post('/portfolio/update/details/{id}', 'API\v1\PortfolioApi@updateAssetDetails');
        Route::post('/portfolio/update/records/{id}', 'API\v1\PortfolioApi@updateAssetRecords');
        
        Route::post('/feedback', 'API\v1\ToolAPI@sendFeedback');  
    }); 
    // Relesea B Security   
    Route::post('/mygap/logout', 'Auth\GapAutAPI@logout');
    Route::get('/mygap/security', 'API\v1\MobileAuth@index');
    Route::post('/mygap/update/password', 'API\v1\MobileAuth@updatePassword');
    Route::post('/mygap/securemobile', 'API\v1\MobileAuth@store');
    Route::post('/confirm/passcode', 'API\v1\MobileAuth@confirmPassCode');
});
 