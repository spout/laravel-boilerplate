<?php

namespace App\DataTables;

use App\Models\EmailTemplate;

class EmailTemplatesDataTable extends DataTable
{
    protected static $model = EmailTemplate::class;
    protected static $resourcePrefix = 'admin.email-templates';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'email_type.title', 'name' => 'emailType.title', 'title' => _i("Type")],
        ];
    }

    public function query()
    {
        $model = static::$model;
        $query = $model::with('emailType')->select('email_templates.*');

        return $this->applyScopes($query);
    }
}
