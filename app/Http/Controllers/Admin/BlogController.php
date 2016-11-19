<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\DatatablesTrait;
use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;

class BlogController extends AdminController
{
    use DatatablesTrait;

    protected static $model = Post::class;
    protected static $requestClass = PostFormRequest::class;
    protected static $resourcePrefix = 'admin.blog';

    public function edit($id)
    {
        $view = parent::edit($id);
        $view->categories = Category::all()->pluck('title', 'id');
        return $view;
    }
}