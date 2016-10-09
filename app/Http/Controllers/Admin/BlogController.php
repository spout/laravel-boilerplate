<?php
namespace App\Http\Controllers\Admin;

use App\Models\Post;

class BlogController extends AdminController
{
    public $model = Post::class;
}