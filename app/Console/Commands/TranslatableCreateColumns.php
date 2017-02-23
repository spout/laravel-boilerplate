<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TranslatableCreateColumns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translatable:create-columns {model?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create translatable columns';

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
        $model = $this->argument('model');
        if (empty($model)) {
            $model = $this->ask(__("Which model ?"));
        }
        $modelClass = 'App\\Models\\' . $model;
        $table = $modelClass::getTableName();

        foreach ($modelClass::$translatableColumns as $column) {
            $type = Schema::getColumnType($table, $column);
            Schema::table($table, function (Blueprint $table) use ($column, $type) {
                $doctrineColumn = DB::connection()->getDoctrineColumn($table->getTable(), $column);
                $params = [
                    'length' => $doctrineColumn->getLength(),
                    'nullable' => !$doctrineColumn->getNotnull(),
                    'default' => $doctrineColumn->getDefault(),
                    'after' => $column,
                ];

                foreach (config('app.locales') as $locale => $name) {
                    $columnLocale = $column . '_' . $locale;
                    if (!Schema::hasColumn($table->getTable(), $columnLocale)) {
                        $table->addColumn($type, $columnLocale, $params);
                    }
                }
            });
        }

        return true;
    }
}
