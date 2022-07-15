<?php

namespace App\Console\Commands;

use App\Services\Bots\Telegram\Telegram;
use Illuminate\Console\Command;

class ListenTelegramBot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:bot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listen telegram bot, get and answer messages';

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
    public function handle(Telegram $telegram)
    {
        return $telegram::getUpdates();
    }
}
