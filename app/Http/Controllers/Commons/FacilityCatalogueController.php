<?php

namespace BukApi\Http\Controllers\Commons;

use BukApi\Models\Commons\FacilityCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use \BukApi\Constants\GeneralConstant;

class FacilityCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilityCatalogue = FacilityCatalogue::orderBy(ColumnName::FACILITY_DESCRIPTION, GeneralConstant::ORDER_BY_ASC)->get();
        
        return $this->showAll($facilityCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Commons\FacilityCatalogue  $facilityCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(FacilityCatalogue $facilityCatalogue)
    {
        return $this->showOne($facilityCatalogue);
    }
}
