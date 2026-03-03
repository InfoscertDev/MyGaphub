<?php

namespace App\Console\Commands;

use App\Asset\PortfolioAsset;
use App\Asset\PortfoloAssetRecord;
use Illuminate\Console\Command;

class PeriodicalPortfolioAsset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'periodical:asset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $month = date('m')-1;
        $current_period = date('Y-m').'-01';
        $last_period =  date('Y-').$month.'-01';

        // Portfolio Cron
        $gaphubers_portfoilo = PortfolioAsset::where('period', $current_period)
                                     ->where('isArchive', 0)->get();

        foreach($gaphubers_portfoilo as $portfolio){
            $asset_records = new PortfoloAssetRecord();
            $asset_records->user_id = $portfolio->user_id;
            $asset_records->portfolio_asset_id = $portfolio->id;
            $asset_records->period = $last_period;
            $asset_records->amount = $portfolio->asset_value;
            $asset_records->save();
        }
    }
}
