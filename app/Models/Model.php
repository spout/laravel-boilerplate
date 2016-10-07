<?php
namespace App\Models;

use Illuminate\Support\Pluralizer;

class Model extends \Illuminate\Database\Eloquent\Model
{
    protected $rules = array();
    protected $errors;

    public static function getVerboseName()
    {
        return class_basename(static::class);
    }

    public static function getVerboseNamePlural()
    {
        return Pluralizer::plural(self::getVerboseName());
    }

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }

    /**
     * @link https://daylerees.com/trick-validation-within-models/
     * @param $data
     * @return bool
     */
    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);

        // check for failure
        if ($v->fails()) {
            // set errors and return false
            $this->errors = $v->errors;
            return false;
        }

        // validation pass
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }
}