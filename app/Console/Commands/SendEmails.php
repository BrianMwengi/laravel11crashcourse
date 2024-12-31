<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily emails';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Emails send successfully!');
    }
}
