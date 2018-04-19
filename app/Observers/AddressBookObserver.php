<?php

namespace App\Observers;

use App\Models\AddressBook;

class AddressBookObserver
{
    public function saving(AddressBook $addressBook)
    {
        list($addressBook->address_bookable_type, $addressBook->address_bookable_id) = explode('.', $addressBook->address_bookable);

        unset($addressBook->address_bookable);
    }
}