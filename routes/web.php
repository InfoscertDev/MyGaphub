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
// {!! Form::open(['route' => ['contact_us'], 'method' => 'POST', 'role'=>"form", 'class'=>"contact", 'name'=>"contact"]) !!}

use Admin\MarketOpportunityController;
use App\Models\Asset\SeedBudgetAllocation;

Route::get('/', function () { return  redirect('/login');  });

Route::get('/fxt', function() {

    // $exitCode2 = \Illuminate\Support\Facades\Artisan::call('gaphub:reminder');
    // $exitCode2 = \Illuminate\Support\Facades\Artisan::call('storage:link');

    return '<h1>Cache facade value cleared</h1>';
});

Route::get('/fincalculator', 'Web\FinicialCalculatorController@index');
Route::post('/fincalculator', 'Web\FinicialCalculatorController@store')->name('store.calculator');
Route::post('/fin/improve', 'Web\FinicialCalculatorController@improve')->name('finicial.improve');
Route::post('/fin/download', 'Web\FinicialCalculatorController@download')->name('finicial.download');
Route::post('/status/recommend', 'Web\FinicialCalculatorController@recommend')->name('status.recommend');

Route::get('/status/recommend', 'Web\FinicialCalculatorController@recommend');
Route::get('/fin/improve', 'Web\FinicialCalculatorController@improve');

// Route::get('/register/questions', 'Auth\RegisterController@mainregister' )->name('register.mainregister');

Route::get('/email/resend', 'Auth\VerificationController@resend');
Route::get('/email/verify', 'Auth\VerificationController@verify');
Route::get('/email/reminder', 'Auth\VerificationController@reminder')->name('email.reminder');

Auth::routes(['verify' => 'true']);
Route::post('/questions', 'HomeController@questions' )->name('register.questions');

Route::group(['middleware' => ['auth','verified']], function() {
    //  Acquisition
    Route::get('/actionplan', 'Web\AcquisitionController@action')->name('user.actionplan');
    Route::post('/actionplan', 'Web\AcquisitionController@store')->name('store.assetaction');
    Route::get('/acquisition/favourite/{asset}', 'Web\AcquisitionController@favouriteAsset')->name('user.favourite-asset');
    Route::get('/acquisition/create/alert', 'Web\ListedAcquisitionController@createAlert')->name('acquisition.create.alert');
    Route::post('/acquisition/invest/reap/{sasset}', 'Web\ListedAcquisitionController@reserveReapInvestment')->name('acqusition.reserve_reap');
    Route::post('/acquisition/invest/ganp/{sasset}', 'Web\ListedAcquisitionController@reserveGanpInvestment')->name('acqusition.reserve_ganp');

    Route::group(['prefix' => 'home'], function () {
        // User Link
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/notifications', 'HomeController@notifications')->name('notifications');
        Route::post('/dashboard/tiles', 'HomeController@dashboardTiles')->name('home.dashboard');
        // Seed
        Route::get('/seed', 'Web\SeedController@index')->name('seed');
        Route::get('/seed/create', 'Web\SeedController@create')->name('seed.create');
        Route::get('/seed/future', 'Web\SeedController@future')->name('seed.future');
        Route::get('/seed/history', 'Web\SeedController@history')->name('seed.history');
        Route::get('/seed/history/chart', 'Web\SeedController@chartHistory')->name('seed.chart_history');
        Route::get('/seed/history/{period}', 'Web\SeedController@seedPeriodHistory')
                                ->where('period', '[0-9]{4}-[0-9]{2}-[0-9]{2}')
                                ->name('seed.periodic_history');
        Route::get('/seed/monthly/{period}', 'Web\SeedController@monthlySeedReport')->name('seed.monthly_period');
        Route::get('/seed/history/{period}/diffrences', 'Web\SeedController@periodHistoryDiffrences')->name('seed.periodic_history_diffrences');
        Route::get('/seed/history/{period}/{seed}', 'Web\SeedController@periodHistoryReport')->name('seed.periodic_history_report');

        // Route::post('/seed/store', 'Web\SeedController@storeSeed')->name('seed.store');
        Route::post('/seed/assign/income', 'Web\SeedController@assignSeedIncome')->name('seed.assign.income');
        Route::post('/seed/store/budget', 'Web\SeedController@storeSetBudget')->name('seed.store.set_budget');
        Route::get('/seed/summary/{seed}', 'Web\SeedAllocationController@seedSummaryPage')->name('seed.summary');
        Route::get('/seed/list/allocate', 'Web\SeedAllocationController@listAllocation')->name('seed.list.allocation');
        Route::get('/seed/allocate/{id}', 'Web\SeedAllocationController@showAlloction')->name('seed.allocation');
        Route::get('/seed/record/{id}', 'Web\SeedAllocationController@showRecordSpend')->name('seed.record');

        Route::post('/seed/store/allocation', 'Web\SeedAllocationController@storeCategoryAllocation')->name('seed.store.allocation');
        Route::post('/seed/store/allocation/{id}', 'Web\SeedAllocationController@updateCategoryAllocation')->name('seed.update.allocation');
        Route::delete('/seed/store/allocation/{id}', 'Web\SeedAllocationController@deleteAllocation')->name('seed.delete.allocation');
        Route::post('/seed/record/spent', 'Web\SeedAllocationController@storeRecordSpent')->name('seed.add.record_spent');
        Route::post('/seed/record/spent/{id}', 'Web\SeedAllocationController@updateRecordSpend')->name('seed.update.record_spent');
        Route::delete('/seed/record/spent/{id}', 'Web\SeedAllocationController@deleteRecordSpend')->name('seed.delete.record_spent');
        // SevenG
        Route::get('/7g', 'Web\SevenGSnapshotController@index')->name('7g');
        Route::get('/7g/edit', 'Web\SevenGSnapshotController@create')->name('7g.editall');
        Route::post('/7g/store', 'Web\SevenGSnapshotController@store')->name('save.seveng');
        Route::post('/7g/bespoke', 'Web\SevenGSnapshotController@storeBespoke')->name('save.bespoke');
        Route::post('/7g/bespoke/{id}', 'Web\SevenGSnapshotController@updateBespoke')->name('update.bespoke');
        Route::get('/bespoke/edit', 'Web\SevenGSnapshotController@bespoke')->name('bespoke.editall');
        Route::resource('reminder','Web\ReminderController', ['names' => ['create' => 'new.reminder']]);
        // Route::get('/reminders', 'ReminderController@index')->name('user.reminders'); ['as'=> 'reminder']
        // Tools
        Route::get('/tools', 'Web\OtherToolController@index')->name('tools');
        Route::get('/tools/profile', 'Web\OtherToolController@profile')->name('profile');
        Route::get('/tools/security', 'Web\OtherToolController@security')->name('security');
        Route::get('/tools/compliance', 'Web\OtherToolController@compliance')->name('compliance');
        Route::get('/tools/preference', 'Web\OtherToolController@preference')->name('preference');
        Route::get('/tools/exchange', 'Web\OtherToolController@soon')->name('exchange');

        Route::post('/tools/preference/exchange', 'Web\OtherToolController@updateExchange')->name('update.exchange');
        Route::post('/tools/picture', 'Web\OtherToolController@picture')->name('picture');
        Route::post('/tools/default/picture', 'Web\OtherToolController@defaultpicture')->name('default.picture');
        Route::post('/tools/editprofile', 'Web\OtherToolController@editprofile')->name('edit.profile');
        Route::post('/tools/security/password', 'Web\OtherToolController@changePassword')->name('change.password');

        // 360 Detail
        Route::get('/360', 'Web\WheelController@index')->name('360');
        Route::get('/360/ilab', 'Web\SeedController@ilab')->name('360.ilab');
        Route::get('/360/net', 'Web\WheelController@netWorth')->name('360.net');
        Route::get('/360/liability', 'Web\LiabilitiesController@liability')->name('360.liability');
        Route::get('/360/liabilities', 'Web\LiabilitiesController@liability')->name('360.liabilities');
        Route::get('/360/expenditure', 'Web\SeedController@expenditure')->name('360.expenditure');
        Route::get('/360/protection', 'Web\IndependenceController@protection')->name('360.protection');
        Route::get('/360/non_portfolio/{id}', 'Web\IndependenceController@nonPortfolioDetail')->name('360.income.non_portfolio');

        Route::get('/360/retirement', 'Web\IndependenceController@retirement')->name('360.retirement');
        Route::get('/360/investment', 'Web\PortfolioController@investment')->name('360.investment');
        Route::get('/360/cash', 'Web\WheelController@cash')->name('360.cash');
        Route::get('/360/mortgage', 'Web\LiabilitiesController@mortgage')->name('360.mortgage');

        Route::get('/360/philantropy', 'Web\SeedController@philanthropy')->name('360.philanthropy');
        Route::get('/360/philanthropy', 'Web\SeedController@philanthropy')->name('360.philanthropy');
        Route::get('/360/income', 'Web\IndependenceController@income')->name('360.income');
        Route::get('/360/list/income', 'Web\IndependenceController@incomeList')->name('360.income.list');
        Route::get('/360/asset', 'Web\WheelController@asset')->name('360.asset');
        Route::get('/360/equity', 'Web\WheelController@equity')->name('360.equity');
        // 360 Add Account
        Route::post('/360/ilab', 'Web\SeedController@storeILab')->name('360.store.ilab');
        Route::post('/360/net', 'Web\WheelController@storeNet')->name('360.store.net');
        Route::post('/360/cash', 'Web\WheelController@storeCash')->name('360.store.cash');
        Route::post('/360/liability', 'Web\LiabilitiesController@storeLiability')->name('360.store.liability');
        Route::post('/360/mortgage', 'Web\LiabilitiesController@storeMortgage')->name('360.store.mortgage');
        Route::post('/360/income', 'Web\IndependenceController@storeIncome')->name('360.store.income');
        Route::post('/360/equity', 'Web\WheelController@storeEquity')->name('360.store.equity');
        Route::post('/360/protection', 'Web\IndependenceController@storeProtection')->name('360.store.protection');
        Route::post('/360/retirement', 'Web\IndependenceController@storeRetirement')->name('360.store.retirement');
        Route::post('/360/improve/roi', 'Web\IndependenceController@improveRoi')->name('360.store.roi');
        Route::post('/360/philantrophy', 'Web\SeedController@savePhilantrophy')->name('360.store.philantrophy');
        // 360 Update
        Route::post('/360/cash/{id}', 'Web\WheelController@updateCash')->name('360.update.cash');
        Route::post('/360/mortgage/{id}', 'Web\LiabilitiesController@updateMortgage')->name('360.update.mortgage');
        Route::post('/360/liability/{id}', 'Web\LiabilitiesController@updateLiability')->name('360.update.liability');
        Route::post('/360/retirement/{id}', 'Web\IndependenceController@updatRetirement')->name('360.update.retirement');
        Route::post('/360/equity/{id}', 'Web\WheelController@updateEquity')->name('360.update.equity');
        Route::post('/360/protection/{id}', 'Web\IndependenceController@updateProtection')->name('360.update.protection');
        Route::post('/360/income/{id}', 'Web\IndependenceController@updateIncome')->name('360.update.income');
        Route::post('/360/income/records/{id}', 'Web\IndependenceController@updateIncomeRecord')->name('360.update.income_record');
        // Portfolio
        Route::get('/portfolio', 'Web\PortfolioController@index')->name('portfolio');
        Route::post('/portfolio/asset', 'Web\PortfolioController@addPortfolioAsset')->name('portfolio.new_asset');
        Route::get('/portfolio/asset/{type}', 'Web\PortfolioController@portfolioAssetType')->name('portfolio.asset_type');
        Route::get('/portfolio/{braid}', 'Web\PortfolioController@braid')->name('portfolio.braid');
        Route::get('/portfolio/{braid}/{id}', 'Web\PortfolioController@braidInformation')->name('portfolio.braid.info');
        Route::get('/portfolio/{braid}/{id}/financial', 'Web\PortfolioController@braidFinancialInformation')->name('portfolio.braid.financial');
        //   Portfolio Records
        Route::post('/portfolio/update/photo/{id}', 'Web\PortfolioController@updateAssetPhoto')->name('portfolio.update.photo');
        Route::post('/portfolio/update/records/{id}', 'Web\PortfolioController@updateAssetRecords')->name('portfolio.update.records');
        Route::post('/portfolio/update/note/{id}', 'Web\PortfolioController@updateAssetNote')->name('portfolio.update.note');
        Route::post('/portfolio/update/details/{id}', 'Web\PortfolioController@updateAssetDetails')->name('portfolio.update.details');
        // Others
        Route::get('/favourite', 'Web\ListedAcquisitionController@favourite')->name('favourite');
        Route::get('/favourite/ganp', 'Web\ListedAcquisitionController@favouriteGanp')->name('favourite_ganp');
        Route::get('/invite', 'Web\OtherToolController@soon')->name('invite');
        Route::get('/feedback', 'Web\OtherToolController@feedback')->name('feedback');
        Route::post('/feedback', 'Web\OtherToolController@sendFeedback')->name('send.feedback');
    });
});

// Acquisition
Route::get('/home/tools/support', 'Web\OtherToolController@support')->name('support');
Route::get('/home/tools/support/guide', 'Web\OtherToolController@supportGuide')->name('support.guide');

Route::get('/acquisition', 'Web\AcquisitionController@index')->name('user.acquisition');
Route::get('/acquisition/asset/{asset}', 'Web\AcquisitionController@opportunity')->name('user.opportunity');
Route::get('/acquisition/asset/reap/{sasset}', 'Web\ListedAcquisitionController@singleReap')->name('user.single_reap');
Route::get('/acquisition/asset/{asset}/reap', 'Web\AcquisitionController@reapOpportunity')->name('user.reap-opportunity');
Route::get('/acquisition/featured/asset', 'Web\ListedAcquisitionController@featuredReap')->name('user.reap-featured');

Route::get('/acquisition/asset/{asset}/ganp', 'Web\AcquisitionController@ganpOpportunity')->name('user.ganp-opportunity');
Route::get('/acquisition/asset/ganp/{ganp_asset}', 'Web\AcquisitionController@ganpCultivation')->name('user.single_ganp');

Route::get('/acquisition/asset/{asset}/search', 'Web\AcquisitionController@searchPaginaton')->name('user.reap-search');
Route::get('/acquisition/asset/{asset}/ganp/search', 'Web\AcquisitionController@searchGanpPaginaton')->name('user.ganp-search');
Route::post('/acquisition/asset/{asset}/reap', 'Web\AcquisitionController@searchReap')->name('user.search-reap');
Route::post('/acquisition/asset/{asset}/ganp', 'Web\AcquisitionController@searchGANP')->name('user.search-ganp');
//
Route::post('/acquisition/contact/reap/{sasset}', 'Web\ListedAcquisitionController@intrestReapInvestment')->name('acqusition.invest_reap');

Route::group(['prefix' => 'gapadmin'], function () {
    //Admin Auth
    Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
    Route::get('/register', 'AdminAuth\RegisterController@quickReg');
    Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.siginin');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['admin']], function() {

        Route::get('/dashboard', 'Admin\AdminManagement@dashboard');
        Route::get('/reports', 'Admin\AdminManagement@reportLogin')->name('gap.report');
        Route::get('/admins', 'Admin\AdminManagement@index')->name('admins');
        Route::get('/users', 'Admin\UsersManagement@index')->name('gap.users');
        Route::get('/users/{id}', function(){  return view('admin.coming-soon'); })->name('gap.single_user');

        Route::post('/preference/email', 'Admin\AdminManagement@preferenceEmail')->name('preference.email');
        Route::get('/preference/exchange', 'Admin\AdminManagement@exchange')->name('gap.exchange');
        Route::get('/products', 'Admin\SevenGComment@products' )->name('gap.products');
        Route::post('/products/{asset}', 'Admin\SevenGComment@storeProducts' )->name('gap.store.products');

        Route::get('/support',  'Admin\SupportController@index')->name('gap.support');
        Route::get('/support/quickstart',  'Admin\SupportController@quickstart')->name('gap.support.guide');
        Route::get('/support/quickstart/{id}',  'Admin\SupportController@showGuide')->name('gap.view.guide');
        Route::post('/support/quickstart',  'Admin\SupportController@storeQuickstart')->name('gap.store.guide');
        Route::put('/support/quickstart/{id}',  'Admin\SupportController@updateQuickstart')->name('gap.update.guide');
        Route::delete('/support/quickstart/{id}',  'Admin\SupportController@deleteQuickstart')->name('gap.delete.guide');

        // Route::get('/support/faqs',  'Admin\FaqController@index')->name('gap.faq.index');
        Route::resource('/support/faqs','Admin\FaqController');
        Route::get('/feedbacks', 'Admin\SupportController@feedbacks')->name('gap.support.feedbacks');
        Route::post('/feedbacks/{id}', 'Admin\SupportController@replyFeedback')->name('gap.reply.feedback');
        Route::get('/enquiries', 'Admin\SupportController@enquiries')->name('gap.support.enquiries');
        // Route::get('/reap', function(){  return view('admin.coming-soon'); })->name('gap.reap');
        // Route::get('/ganp', function(){  return view('admin.coming-soon'); })->name('gap.ganp');

        Route::get('/asset/type', 'Admin\AssetTypeController@index')->name('gap.asset_type');
        Route::post('/asset/type', 'Admin\AssetTypeController@store')->name('store.asset_type');
        Route::get('/asset/type/{id}', 'Admin\AssetTypeController@show')->name('show.asset_type');
        Route::post('/asset/type/{id}', 'Admin\AssetTypeController@update')->name('update.asset_type');

        Route::get('/acqusition', 'Admin\SevenGComment@index')->name('gap.acqusition');
        Route::post('/acqusition/{braid}', 'Admin\SevenGComment@storeAcquisitionCms')->name('gap.store.acqusition');
        Route::get('/emails', 'Admin\SevenGComment@emails')->name('gap.emails');
        Route::get('/emails/welcome', 'Admin\SevenGComment@welcome')->name('gap.emails.welcome');
        Route::get('/emails/recommendation', 'Admin\SevenGComment@recommendation')->name('gap.emails.recommendation');
        Route::post('/emails', 'Admin\SevenGComment@store_emails')->name('store.emails');

        // Market Oppourtunity
        Route::resource('market-opportunities', 'Admin\MarketOpportunityController');
        Route::put('market-opportunities/{marketOpportunity}/toggle-publish', ['App\Http\Controllers\Admin\MarketOpportunityController', 'togglePublish'])
            ->name('market-opportunities.toggle-publish');
        Route::post('market-opportunities/update-order', ['App\Http\Controllers\Admin\MarketOpportunityController', 'updateOrder'])
            ->name('market-opportunities.update-order');
        // financial-hub
        Route::resource('financial-hub', 'Admin\FinancialIntelligentHubController')
                ->parameters(['financial-hub' => 'video']);
        Route::put('financial-hub/{video}/toggle-publish', ['App\Http\Controllers\Admin\FinancialIntelligentHubController', 'togglePublish'])
            ->name('financial-hub.toggle-publish');
        Route::post('financial-hub/update-order', ['App\Http\Controllers\Admin\FinancialIntelligentHubController', 'updateOrder'])
            ->name('financial-hub.update-order');
        Route::post('financial-hub/update-playlist-link', ['App\Http\Controllers\Admin\FinancialIntelligentHubController', 'updatePlaylistLink'])
            ->name('financial-hub.update-playlist-link');
        // Blog
        // Route::resource('blog', 'Admin\BlogPostController')
        //     ->names(['gap.blog']);
    });
});

// 3WP3KiJkng_Po

