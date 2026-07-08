<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::post('/mygap/newregister', 'API\v2\AuthenticationApi@registeration');
    Route::post('/mygap/login', 'Auth\GapAutAPI@login');

    // Password Reset Routes
    Route::post('password/send-otp', 'Auth\ForgotPasswordController@sendOTP');
    Route::post('password/verify-otp', 'Auth\ResetPasswordController@verifyOTP')->middleware('throttle:30,1');
    Route::post('password/reset-with-otp', 'Auth\ResetPasswordController@resetWithOTP');

    Route::post('password/send-reset-link', 'Auth\ForgotPasswordController@sendResetLink');
    Route::post('password/verify-token', 'Auth\ResetPasswordController@verifyResetToken')->middleware('throttle:30,1');
    Route::post('password/reset-with-link', 'Auth\ResetPasswordController@resetPassword');

    Route::post('/enquiry', 'API\v2\ToolAPI@sendHelpEnquiry');

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


Route::group(['middleware' => ['auth:api', 'verified', 'throttle:80,1']], function() {
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
        Route::get('/snapshot', 'API\v2\SevenGAPI@snapshot');
        // FCM Token and Notifcation
        Route::get('/notifications', 'API\v2\NotificationController@index');
        Route::post('/notifications/{id}/mark-as-read', 'API\v2\NotificationController@markAsRead');
        Route::post('/notifications/{id}/mark-all-read', 'API\v2\NotificationController@markAllAsRead');
        Route::delete('/notifications/{id}', 'API\v2\NotificationController@deleteNotification');

        Route::post('/notifications/log', 'API\v2\NotificationController@logNotification');
        Route::post('/notifications/log-batch', 'API\v2\NotificationController@logBatchNotifications');

        Route::post('/fcm-token', 'API\v2\NotificationController@notificationToken');
        Route::get('/fcm-token', 'API\v2\NotificationController@getTokens');
        Route::get('/fcm-token/device', 'API\v2\NotificationController@getTokenByDevice');
        Route::get('/fcm-token', 'API\v2\NotificationController@deleteToken');

        // Action Plan
        Route::get('/actionplan', 'API\v2\AssetActionController@action');
        Route::get('/todayplan', 'API\v2\AssetActionController@today');
        Route::post('/actionplan', 'API\v2\AssetActionController@store');
        // Strategies
        Route::get   ('action-strategies',                   'API\v2\ActionStrategyController@index');
        Route::post  ('action-strategies',                   'API\v2\ActionStrategyController@store');
        Route::get   ('action-strategies/{id}',              'API\v2\ActionStrategyController@show');
        Route::delete('action-strategies/{id}',              'API\v2\ActionStrategyController@destroy');
        Route::post  ('action-strategies/{id}/items',        'API\v2\ActionStrategyController@storeItems');
        Route::post  ('action-strategies/{id}/investigation','API\v2\ActionStrategyController@storeInvestigation');
        Route::post  ('action-strategies/{id}/allocation',   'API\v2\ActionStrategyController@storeAllocation');



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

        Route::post('/feedback', 'API\v2\ToolAPI@sendFeedback');
        Route::get('/product/market-opportunities', 'API\v2\GapProductController@market');
        Route::get('/product/finacial-hub', 'API\v2\GapProductController@financialHub');

        Route::post('/activity/app-open', 'API\v2\UserActivityController@trackAppOpen');
        Route::post('/activity/status', 'API\v2\UserActivityController@getActivityStatus');

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

Route::group(['middleware' => ['auth:api', 'verified']], function() {
    Route::group(['prefix' => 'app/options'], function () {
        // Reminders - with custom names to avoid conflicts
        Route::resource('/reminders', 'API\v2\ReminderAPI')->names([
            'index' => 'api.reminders.index',
            'store' => 'api.reminders.store',
            'show' => 'api.reminders.show',
            'update' => 'api.reminders.update',
            'destroy' => 'api.reminders.destroy',
        ]);

        Route::post('/reminders/{id}/archive', 'API\v2\ReminderAPI@archive')->name('api.reminders.archive');
        Route::post('/reminders/{id}/restore', 'API\v2\ReminderAPI@restore')->name('api.reminders.restore');
    });
});

require __DIR__.'/v2/360.php';

require __DIR__.'/v2/seed.php';

require __DIR__.'/v2/portfolio.php';



Route::middleware(['cors', 'throttle:60,1'])->group(function () {
    // Route::get('blogs/featured', ['API\v2\GapProductController@featured']);
    Route::get('blog', 'API\v2\GapProductController@blog');
    Route::get('blog/search', 'API\v2\GapProductController@search');
    Route::get('blog/{slug}', 'API\v2\GapProductController@show');
    Route::get('blog/{post}/related', 'API\v2\GapProductController@related');
    // Route::get('/product/market-opportunities', 'API\v2\GapProductController@market');
    // Route::get('/product/finacial-hub', 'API\v2\GapProductController@market');
});
