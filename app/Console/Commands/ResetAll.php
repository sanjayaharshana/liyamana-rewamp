<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ResetAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'liyamana:reset-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Resetting all data...');
        Artisan::call('migrate:refresh');
        $this->info('Installing All Admin Information...');
        Artisan::call('admin:install');
        $this->info('Seeding all data...');
        Artisan::call('db:seed');
    }
}
