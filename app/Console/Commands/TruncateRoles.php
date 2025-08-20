<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TruncateRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:truncate-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate roles table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('roles')->truncate();

        $this->info('Roles table truncated successfully.');
        return Command::SUCCESS;
    }
}
