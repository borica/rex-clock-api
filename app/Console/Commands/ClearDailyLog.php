<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ClearDailyLog extends Command
{
    protected $signature = 'log:clear-daily';
    protected $description = 'Clear the log file for today';

    public function handle(): void
    {
        $today = now()->format('Y-m-d');
        $logFilePath = storage_path('logs/laravel-' . $today . '.log');

        if (file_exists($logFilePath)) {
            unlink($logFilePath);
            Log::info('Log file for today has been cleared.');
            $this->info('Log file for today has been cleared.');
        } else {
            $this->info('Log file for today does not exist.');
        }
    }
}
