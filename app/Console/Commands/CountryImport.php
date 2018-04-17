<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;

class CountryImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'country:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import country list';

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
     * @return mixed
     */
    public function handle()
    {
        $dataPath = base_path() . '/vendor/umpirsky/country-list/data/';

        foreach (config('app.locales') as $locale => $lang) {
            $countries = require $dataPath . $locale . '/country.php';

            foreach ($countries as $code => $name) {
                Country::updateOrCreate(['code' => $code], ["name_{$locale}" => $name]);
            }
        }

        return true;
    }
}
