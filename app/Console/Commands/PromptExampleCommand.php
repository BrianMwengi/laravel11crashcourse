<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use function Laravel\Prompts\text;


class PromptExampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prompt-example-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demonstrate Laravel Prompts with validation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = text('What is your name?', validate: [
            'name' => 'required|min:3|max:255',
        ]);

        $this->info("Hello, {$name}!");

        return Command::SUCCESS;
    }
}
