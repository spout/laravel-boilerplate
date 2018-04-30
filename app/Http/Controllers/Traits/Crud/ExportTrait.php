<?php

namespace App\Http\Controllers\Traits\Crud;

use League\Csv\CannotInsertRecord;
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
            $csv->insertAll($model::all()->toArray());
        } catch (CannotInsertRecord $e) {
            die($e->getMessage());
        }

        $csv->output("{$table}.csv");
    }
}