<?php

namespace App\Models;

class AddressBook extends Model
{
    protected $guarded = ['location', 'address_bookable'];
    public $timestamps = false;

    public static function verboseName()
    {
        return _i("address book");
    }

    public static function verboseNamePlural()
    {
        return _i("address books");
    }

    public function addressBookable()
    {
        return $this->morphTo();
    }

    public function __toString()
    {
        $parts = [
            $this->firstname,
            $this->lastname,
            $this->company,
        ];

        $parts = array_filter($parts);

        return implode(' ', $parts);
    }
}