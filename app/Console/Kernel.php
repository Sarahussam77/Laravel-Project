<?php

namespace App\Console;

use App\Console\Commands\SendMissYouEmails;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
     protected $commands = [
        SendMissYouEmails::class,
        'App\Console\Commands\SendMissYouEmails',

    ];
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('email:missyou')
        ->everyMinute();
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
