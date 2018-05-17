<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\VideosDataTable;
use App\Http\Requests\VideoFormRequest;
use App\Models\Video;

class VideosController extends AdminController
{
    public static $model = Video::class;
    public static $requestClass = VideoFormRequest::class;
    public static $dataTableClass = VideosDataTable::class;
    public static $resourcePrefix = 'admin.videos';
}