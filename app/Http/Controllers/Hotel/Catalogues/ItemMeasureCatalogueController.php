<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use BukApi\Models\Hotel\Catalogues\ItemMeasureCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use \BukApi\Constants\GeneralConstant;


class ItemMeasureCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemMeasureCatalogue = ItemMeasureCatalogue::orderBy(ColumnName::ITEM_NAME, GeneralConstant::ORDER_BY_ASC)->get();
        
        return $this->showAll($itemMeasureCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Hotel\Catalogues\ItemMeasureCatalogue  $itemMeasureCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(ItemMeasureCatalogue $itemMeasureCatalogue)
    {
        return $this->showOne($itemMeasureCatalogue);
    }
}
