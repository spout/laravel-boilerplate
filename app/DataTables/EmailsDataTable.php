<?php

namespace App\DataTables;

use App\Models\Email;

class EmailsDataTable extends DataTable
{
    protected static $model = Email::class;
    protected static $resourcePrefix = 'admin.emails';

    protected function getColumns()
    {
        return [
            ['data' => 'property.name', 'name' => 'property.name', 'title' => _i("Property")],
            ['data' => 'email_type.title', 'name' => 'emailType.title', 'title' => _i("Type")],
            ['data' => 'to', 'name' => 'to', 'title' => _i("To")],
            ['data' => 'subject', 'name' => 'subject', 'title' => _i("Subject")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Date")],
        ];
    }

    public function query()
    {
        $model = static::$model;
        $query = $model::with(['property', 'emailType'])->select('emails.*');

        return $this->applyScopes($query);
    }
}
