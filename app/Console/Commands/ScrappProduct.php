<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ScrappProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrapp:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrapped your product';

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
     * @return int
     */
    public function handle()
    {
        $scrapper = new \App\Http\Controllers\ScrapperController();
        $scrapper->cron_job();
        $this->info($this->description);
    }
}
