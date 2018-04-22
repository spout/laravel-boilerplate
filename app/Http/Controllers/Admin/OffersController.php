<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OffersDataTable;
use App\Http\Requests\OfferFormRequest;
use App\Models\Offer;

class OffersController extends AdminController
{
    public static $model = Offer::class;
    public static $requestClass = OfferFormRequest::class;
    public static $dataTableClass = OffersDataTable::class;
    public static $resourcePrefix = 'admin.offers';
}