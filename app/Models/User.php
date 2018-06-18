<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\CommonTrait;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, CommonTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'provider',
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public static function verboseName()
    {
        return _i("user");
    }

    public static function verboseNamePlural()
    {
        return _i("users");
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getFullnameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function setPasswordAttribute($value)
    {
        if (Hash::needsRehash($value)) {
            $value = Hash::make($value);
        }

        $this->attributes['password'] = $value;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
