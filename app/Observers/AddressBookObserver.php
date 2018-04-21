<?php

namespace App\Observers;

use App\Models\AddressBook;

class AddressBookObserver
{
    public function saving(AddressBook $addressBook)
    {
        $addressBookable = request()->input('address_bookable');
        if (empty($addressBookable)) {
            return false;
        }

        list($addressBook->address_bookable_type, $addressBook->address_bookable_id) = explode('.', $addressBookable);
    }
}