<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PropertiesCreateEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'properties:create-events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create properties Google Calendar events';

    /**
     * Create a new command instance.
     *
     * PropertiesCreateEvents constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        return true;
    }
}
