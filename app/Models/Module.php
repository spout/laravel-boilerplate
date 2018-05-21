<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;
use Illuminate\Support\Collection;

class Module extends Model
{
    use TranslatableTrait;

    public $incrementing = false;
    public static $translatableColumns = ['title'];
    protected $primaryKey = 'slug';

    public static function verboseName()
    {
        return _i("module");
    }

    public static function verboseNamePlural()
    {
        return _i("modules");
    }

    public function templates()
    {
        return $this->belongsToMany(Template::class, 'placeholders')->using(Placeholder::class);
    }

    /**
     * @param $productId
     * @return Collection
     */
    public function getProductAssociatedModelInstances($productId)
    {
        $moduleModelClass = $this->model_class;
        $where = [
            'product_id' => $productId,
            'placeholder_id' => $this->pivot->id,
        ];
        return $moduleModelClass::where($where)->get();
    }
}