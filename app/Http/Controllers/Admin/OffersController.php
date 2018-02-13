<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OffersDataTable;
use App\Http\Requests\OfferFormRequest;
use App\Models\Offer;

class OffersController extends AdminController
{
    protected static $model = Offer::class;
    protected static $requestClass = OfferFormRequest::class;
    protected static $dataTableClass = OffersDataTable::class;
}