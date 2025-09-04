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

// Below API routes secured with API Key
// Route::middleware('auth.apikey')->group( function () {

Route::any('/', function (Request $request) {
    return response()->json([
        'status' => true,
        'message' => "V2. If you're not sure you know what you are doing, you probably shouldn't be using this API.",
        'data' => [
            'service' => 'Gaphub-Api',
            'version' => '2.0',
        ]
    ], 200);
});


// Apply API key middleware to all routes (create this middleware first)
Route::middleware(['api.key', 'throttle:60,1'])->group(function () {
    // Release C
    Route::get('/mygap/check/email', 'API\v2\AuthenticationApi@checkEmailAvailability')->middleware('throttle:30,1');
    Route::post('/mygap/newregister', 'API\v2\AuthenticationApi@registeration')->middleware('throttle:15,1');
    Route::post('/mygap/login', 'Auth\GapAutAPI@login')->middleware('throttle:15,1');

    // Password Reset Routes
    Route::post('password/send-otp', 'Auth\ForgotPasswordController@sendOTP')->middleware('throttle:15,1');
    Route::post('password/verify-otp', 'Auth\ResetPasswordController@verifyOTP')->middleware('throttle:30,1');
    Route::post('password/reset-with-otp', 'Auth\ResetPasswordController@resetWithOTP')->middleware('throttle:15,1');

    Route::post('password/send-reset-link', 'Auth\ForgotPasswordController@sendResetLink')->middleware('throttle:15,1');
    Route::post('password/verify-token', 'Auth\ResetPasswordController@verifyResetToken')->middleware('throttle:30,1');
    Route::post('password/reset-with-link', 'Auth\ResetPasswordController@resetPassword')->middleware('throttle:15,1');

    Route::post('/enquiry', 'API\v2\ToolAPI@sendHelpEnquiry')->middleware('throttle:15,1');

    Route::get('/acquisition/trigger/alert', 'API\v2\GaphubAlertController@triggerReapAlert');
    Route::get('/acquisition/trigger/alert/{asset}', 'API\v2\GaphubAlertController@triggerAuthorizeReap');
    Route::post('/gaphubers/non_member/sms', 'API\v2\GaphubAlertController@nonMemberSMS');

    Route::prefix('whatsapp')->group(function () {
        Route::post('/send-otp', 'API\v2\WhatsAppOTPController@sendOTP');
        Route::post('/verify-otp', 'API\v2\WhatsAppOTPController@verifyOTP');
        Route::post('/verification-status', 'API\v2\WhatsAppOTPController@getVerificationStatus');
        Route::post('/resend-otp', 'API\v2\WhatsAppOTPController@resendOTP');
    });

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api', 'verified']], function() {
    Route::group(['prefix' => 'app'], function () {
        //
        Route::get('/calculator', 'API\v2\SevenGAPI@calculator');
        Route::get('/financial/recommendations', 'API\v2\SevenGAPI@recommendations');
        Route::post('/calculator', 'API\v2\SevenGAPI@createCalculator');
        Route::post('/calculator/budget', 'API\v2\SevenGAPI@createBudget');
        Route::post('/calculator/portfolio', 'API\v2\SevenGAPI@createPortfolio');
        Route::post('/calculator/investment', 'API\v2\SevenGAPI@createInvestment');
        // Analytics
        Route::post('/stepquestions', 'API\v2\SevenGAPI@questions');
        Route::post('/seveng', 'API\v2\SevenGAPI@store');
        Route::get('/seveng', 'API\v2\SevenGAPI@index');
        Route::get('/seveng/edit', 'API\v2\SevenGAPI@create');
        Route::get('/bespoke', 'API\v2\SevenGAPI@showBespoke');
        Route::post('/bespoke', 'API\v2\SevenGAPI@storeBespoke');
        Route::post('/bespoke/{id}',  'API\v2\SevenGAPI@updateBespoke');
        // Dashboard
        Route::get('/dashboard', 'API\v2\ToolAPI@dashboard');
        Route::post('/dashboard/tiles', 'API\v2\ToolAPI@storeTiles');
        Route::get('/notifications', 'API\v2\ToolAPI@notifications');
        Route::get('/snapshot', 'API\v2\SevenGAPI@snapshot');
        // Avtion Plan
        Route::get('/actionplan', 'API\v2\AssetActionController@action');
        Route::get('/todayplan', 'API\v2\AssetActionController@today');
        Route::post('/actionplan', 'API\v2\AssetActionController@store');
        Route::resource('reminder','API\v2\ReminderAPI');
        // Acquisition
        Route::resource('property/favourite','API\v2\SavePropertyApi');

        // Route::get('/acquisition/favourite/', 'API\v2\AcquisitionApi@favourite');
        // Route::get('/acquisition/favourite/ganp', 'API\v2\AcquisitionApi@favouriteGanp');
        // Route::get('/acquisition/favourite/{asset}', 'API\v2\AcquisitionApi@favouriteAsset');
        // Route::post('/acquisition/interest/reap/{sasset}', 'API\v2\AcquisitionApi@interestReapInvestment');
        // Route::post('/acquisition/investment/reap/{sasset}', 'API\v2\AcquisitionApi@reserveReapInvestment');
        // Route::post('/acquisition/investment/ganp/{sasset}', 'API\v2\AcquisitionApi@reserveGanpInvestment');

        // Profiles
        Route::get('/support', 'API\v2\ToolAPI@support');
        Route::get('/profile', 'API\v2\ToolAPI@profile');
        Route::post('/tools/preference/exchange', 'API\v2\ToolAPI@updateExchange');
        Route::post('/default/picture', 'API\v2\ToolAPI@defaultpicture');
        Route::post('/picture', 'API\v2\ToolAPI@picture');
        Route::post('/editprofile', 'API\v2\ToolAPI@editprofile');
        Route::delete('/account', 'API\v2\ToolAPI@deleteAccount');
        Route::get('/exchange', 'API\v2\ToolAPI@getExchangeData');

        // SEED
        Route::get('/seed', 'API\v2\SeedAPI@index');
        Route::get('/seed/target', 'API\v2\SeedAPI@target');
        Route::post('/seed/store/budget', 'API\v2\SeedAPI@storeSetBudget');
        Route::post('/seed/store', 'API\v2\SeedAPI@storeSeed');
        Route::post('/seed/assign/income', 'API\v2\SeedAPI@assignSeedIncome');

        Route::get('/seed/history/{period}', 'API\v2\SeedAPI@periodHistory');
        Route::get('/seed/monthly/{period}', 'API\v2\SeedAPI@monthlySeedReport');
        Route::get('/seed/history/{period}/diffrences', 'API\v2\SeedAPI@periodHistoryDiffrences');
        Route::get('/seed/history/{period}/{seed}', 'API\v2\SeedAPI@periodHistoryReport');
        Route::get('/seed/allocate/budget', 'API\v2\SeedAllocationAPI@listAllocation');
        // SEED Allocations
        Route::post('/seed/allocate/budget', 'API\v2\SeedAllocationAPI@storeCategoryAllocation');
        Route::put('/seed/allocate/budget/{id}', 'API\v2\SeedAllocationAPI@updateCategoryAllocation');
        Route::delete('/seed/allocate/budget/{id}', 'API\v2\SeedAllocationAPI@deleteAllocation');
        Route::get('/seed/allocate/{id}', 'API\v2\SeedAllocationAPI@showAlloction');
        Route::post('/seed/record/spent', 'API\v2\SeedAllocationAPI@storeRecordSpent');
        Route::put('/seed/record/spent/{id}', 'API\v2\SeedAllocationAPI@updateRecordSpend');
        Route::delete('/seed/record/spent/{id}', 'API\v2\SeedAllocationAPI@deleteRecordSpend');
        // 360
        Route::get('/360/tiles', 'API\v2\WheelController@tiles');
        Route::get('/360/ilab', 'API\v2\SeedAPI@ilab');
        Route::get('/360/net', 'API\v2\WheelController@netWorth');
        Route::get('/360/cash', 'API\v2\WheelController@cash');
        Route::get('/360/liability', 'API\v2\LiabilitiesApi@liability');
        Route::get('/360/mortgage', 'API\v2\LiabilitiesApi@mortgage');
        Route::get('/360/equity', 'API\v2\WheelController@equity');
        Route::get('/360/equity/info', 'API\v2\WheelController@equityInfo');
        Route::get('/360/protection', 'API\v2\IndependenceAPI@protection');
        Route::get('/360/expenditure', 'API\v2\SeedAPI@expenditure');
        Route::get('/360/philantrophy', 'API\v2\SeedAPI@philantrophy');
        Route::get('/360/income', 'API\v2\IndependenceAPI@income');
        Route::get('/360/retirement', 'API\v2\IndependenceAPI@retirement');
        Route::get('/360/retirement/roi', 'API\v2\IndependenceAPI@roi_status');
        Route::get('/360/investment', 'API\v2\PortfolioApi@investment');
        Route::get('/360/non_portfolio/{id}', 'API\v2\IndependenceAPI@nonPortfolioDetail');
        // 360 Add Account
        Route::post('/360/ilab', 'API\v2\SeedAPI@storeILab');
        Route::post('/360/net', 'API\v2\WheelController@storeNet');
        Route::post('/360/cash', 'API\v2\WheelController@storeCash');
        Route::post('/360/liability', 'API\v2\LiabilitiesApi@storeLiability');
        Route::post('/360/mortgage', 'API\v2\LiabilitiesApi@storeMortgage');
        Route::post('/360/equity', 'API\v2\WheelController@storeEquity');
        Route::post('/360/philantrophy', 'API\v2\SeedAPI@savePhilantrophy');
        Route::post('/360/income', 'API\v2\IndependenceAPI@storeIncome');
        Route::post('/360/protection', 'API\v2\IndependenceAPI@storeProtection');
        Route::post('/360/retirement', 'API\v2\IndependenceAPI@storeRetirement');
        Route::post('/360/improve/roi', 'API\v2\IndependenceAPI@improveRoi');
        // 360 Update Account
        Route::post('/360/liability/{id}', 'API\v2\LiabilitiesApi@updateLiability');
        Route::post('/360/mortgage/{id}', 'API\v2\LiabilitiesApi@updateMortgage');
        Route::post('/360/cash/{id}', 'API\v2\WheelController@updateCash');
        Route::post('/360/retirement/{id}', 'API\v2\IndependenceAPI@updatRetirement');
        Route::post('/360/equity/{id}', 'API\v2\WheelController@updateEquity');
        Route::post('/360/protection/{id}', 'API\v2\IndependenceAPI@updateProtection');
        Route::post('/360/income/{id}', 'API\v2\IndependenceAPI@updateIncome');
        Route::post('/360/income/records/{id}', 'API\v2\IndependenceAPI@updateIncomeRecord');
        // Portfolio
        Route::get('/portfolio', 'API\v2\PortfolioApi@index');
        Route::get('/portfolio/asset/types', 'API\v2\PortfolioApi@portfolioAssetTypes');
        Route::get('/portfolio/information', 'API\v2\PortfolioApi@information');
        Route::post('/portfolio/asset', 'API\v2\PortfolioApi@store');
        Route::get('/portfolio/{braid}', 'API\v2\PortfolioApi@braid');
        Route::get('/portfolio/{braid}/{id}', 'API\v2\PortfolioApi@braidInformation');
        Route::delete('/portfolio/{id}', 'API\v2\PortfolioApi@destroy');

        Route::post('/portfolio/update/note/{id}', 'API\v2\PortfolioApi@updateAssetNote');
        Route::post('/portfolio/update/photo/{id}', 'API\v2\PortfolioApi@updateAssetPhoto');
        Route::post('/portfolio/update/details/{id}', 'API\v2\PortfolioApi@updateAssetDetails');
        Route::post('/portfolio/update/records/{id}', 'API\v2\PortfolioApi@updateAssetRecords');

        Route::post('/feedback', 'API\v2\ToolAPI@sendFeedback');
        Route::get('/product/market-opportunities', 'API\v2\GapProductController@market');
        Route::get('/product/finacial-hub', 'API\v2\GapProductController@financialHub');

        // Main settings endpoints
        Route::get('/settings', 'API\v2\SettingsAPI@getSettings'); // Main endpoint
        Route::get('/settings/{key}', 'API\v2\SettingsAPI@getSetting');

        // Specific setting endpoints (alternative direct routes)
        Route::put('/settings/{key}', 'API\v2\SettingsAPI@updateSetting');
        Route::put('/settings/notifications', 'API\v2\SettingsAPI@updateNotifications');
        Route::put('/settings/appearance', 'API\v2\SettingsAPI@updateAppearance');
        Route::put('/settings/preferences', 'API\v2\SettingsAPI@updatePreferences');

        // Additional endpoints for settings management
        // Route::post('/settings/reset', 'API\v2\SettingsAPI@resetSettings');
        Route::post('/settings/{key}/reset', 'API\v2\SettingsAPI@resetSetting');
    });

    // Relesea B Security
    Route::get('/mygap/biometric', 'API\v2\MobileAuth@index');
    Route::post('/mygap/biometric/fingerprint', 'API\v2\MobileAuth@setFingerprint');
    Route::post('/mygap/biometric/passcode', 'API\v2\MobileAuth@setPasscode');
    Route::post('/mygap/passcode/confirm', 'API\v2\MobileAuth@confirmPasscode');

    Route::post('/mygap/logout', 'Auth\GapAutAPI@logout');
    Route::post('/mygap/update/password', 'API\v2\MobileAuth@updatePassword');
    Route::post('/mygap/securemobile', 'API\v2\MobileAuth@store'); //comment later
});

Route::middleware(['cors', 'throttle:60,1'])->group(function () {
    // Route::get('blogs/featured', ['API\v2\GapProductController@featured']);
    Route::get('blog', 'API\v2\GapProductController@blog');
    Route::get('blog/search', 'API\v2\GapProductController@search');
    Route::get('blog/{slug}', 'API\v2\GapProductController@show');
    Route::get('blog/{post}/related', 'API\v2\GapProductController@related');
    // Route::get('/product/market-opportunities', 'API\v2\GapProductController@market');
    // Route::get('/product/finacial-hub', 'API\v2\GapProductController@market');
});
