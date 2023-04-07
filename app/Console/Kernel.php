<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\AssignNewOrderToPharmacy;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
     protected $commands = [
        Commands\ScanNewOrders::class,

    ];
    protected function schedule(Schedule $schedule): void
    {   
        $schedule->command('email:missyou')->daily();
        $schedule->job(new AssignNewOrderToPharmacy)->everyMinute();
        $schedule->command('scan:new-orders')->everyMinute();
         }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
