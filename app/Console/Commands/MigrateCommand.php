<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lb:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run fresh migration for Larablog';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('migrate:fresh', ['--seed' => true]);
        $this->info('Fresh migration with database seeding was successfull');
    }
}
