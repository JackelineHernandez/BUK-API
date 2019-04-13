<?php

namespace BukApi\Http\Controllers\Commons;

use BukApi\Models\Commons\InternetPlaceCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use \BukApi\Constants\GeneralConstant;

class InternetPlaceCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internetPlaceCatalogue = InternetPlaceCatalogue::orderBy(ColumnName::INTERNET_PLACE, GeneralConstant::ORDER_BY_ASC)->get();
        
        return $this->showAll($internetPlaceCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Commons\InternetPlaceCatalogue  $internetPlaceCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(InternetPlaceCatalogue $internetPlaceCatalogue)
    {
        return $this->showOne($internetPlaceCatalogue);
    }
}
