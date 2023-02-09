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
    protected $description = 'Command description';

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
        $current = date('Y-m').'-01';
        $gapgubers_portfoilos = PortfolioAsset::where('isArchive', 0)->get();
 
        foreach($gapgubers_portfoilos as $portfolio){
            $asset_records = new PortfoloAssetRecord(); 
            $asset_records->user_id = $portfolio->user_id;
            $asset_records->portfolio_asset_id = $portfolio->id;
            $asset_records->period = $current; 
            $asset_records->amount = $portfolio->asset_value;
            $asset_records->save(); 
        }
    } 
}
