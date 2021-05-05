<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LeaveManagementPartenityLeave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:leaveAllocationPartenity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will alocate paternity leave for men. 3 days per year';

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
        app('App\Http\Controllers\AllocateLeavedaysFamilyCronController')->resetPaternityLeaves();
        \Log::info('Cron - LeaveManagementPartenityLeave, artisan command schedule:leaveResetPartenity ran successfully @ ' . \Carbon\Carbon::now());
    }
}
