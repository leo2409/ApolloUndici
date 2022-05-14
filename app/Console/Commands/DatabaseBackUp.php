<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Storage;

class DatabaseBackUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a backup of the database';

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
    public function handle()
    {
        $dir = Carbon::now()->format('M_Y');
        if (!Storage::exists("backup/{$dir}")) {
            Storage::makeDirectory("backup/{$dir}");
        }

        $filename = "backup-" . Carbon::now()->format('d-m-Y') . ".gz";

        $command = "mysqldump --user=" . config('database.connections.mysql.username') ." --password=" . config('database.connections.mysql.password') . " --host=" . config('database.connections.mysql.host') . " " . config('database.connections.mysql.database') . " --no-tablespaces  | gzip > " . storage_path() . "/app/backup/{$dir}/" . $filename;

        $returnVar = NULL;
        $output  = NULL;

        exec($command, $output, $returnVar);
    }
}
