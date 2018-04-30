<?php

namespace App\Http\Controllers\Traits\Crud;

use League\Csv\Writer;

trait ExportTrait
{
    public function export()
    {
        $model = static::$model;
        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        $table = $model::getTableName();

        try {
            $csv->insertOne(\Schema::getColumnListing($table));

            $rows = $model::all();
            foreach ($rows as $row) {
                $csv->insertOne($row->toArray());
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        $csv->output("{$table}.csv");
    }
}