<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Helper\IntegrationParties as Integrations;
use Illuminate\Support\Facades\Log;

class CurrencyRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the updated Currency rate';

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
        // info(['Integrating', date('Y-m-d H:i')]);
        $integration = new Integrations();
        $integration->load_currency_converter();
    }
}
