<?php

namespace App\Http\Controllers\Traits\Crud;

trait CrudTrait
{
    use CommonTrait, CreateTrait, RetrieveTrait, UpdateTrait, DeleteTrait, IndexTrait, BulkTrait;
}