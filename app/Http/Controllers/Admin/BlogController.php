<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\DatatablesTrait;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;

class BlogController extends AdminController
{
    use DatatablesTrait;

    protected static $model = Post::class;
    protected static $requestClass = PostFormRequest::class;
    protected static $resourcePrefix = 'admin.blog';
}