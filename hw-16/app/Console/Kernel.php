<?php

namespace App\Console;

use Spatie\ShortSchedule\ShortSchedule;
use App\Console\Commands\ListenTelegramBot;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //ShortShedul
    }

    protected function shortSchedule(ShortSchedule $shortSchedule)
    {
        $shortSchedule->command(ListenTelegramBot::class)
            ->everySeconds(2)
            ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
