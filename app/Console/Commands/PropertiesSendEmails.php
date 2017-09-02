<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PropertiesSendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'properties:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send properties emails';

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
