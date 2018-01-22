<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;

class BlogController extends AdminController
{
    protected static $model = Post::class;
    protected static $requestClass = PostFormRequest::class;
    protected static $dataTableClass = BlogDataTable::class;
}