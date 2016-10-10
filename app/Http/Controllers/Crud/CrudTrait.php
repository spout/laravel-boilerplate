<?php
namespace App\Http\Controllers\Crud;

trait CrudTrait
{
    use CommonTrait, CreateTrait, RetrieveTrait, UpdateTrait, DeleteTrait, IndexTrait;
}