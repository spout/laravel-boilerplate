<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;

class BlogController extends AdminController
{
    public static $model = Post::class;
    public static $requestClass = PostFormRequest::class;
    public static $dataTableClass = BlogDataTable::class;
}