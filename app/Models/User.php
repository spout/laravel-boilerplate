<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\CommonTrait;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, CommonTrait;

    const ROLE_ADMIN = 'admin';
    const ROLE_MEMBER = 'member';

    public static $roles = [
        self::ROLE_ADMIN => self::ROLE_ADMIN,
        self::ROLE_MEMBER => self::ROLE_MEMBER,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
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

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
