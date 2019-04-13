<?php

namespace BukApi\Http\Controllers\Commons;

use BukApi\Models\Commons\BreakfastCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use \BukApi\Constants\GeneralConstant;

class BreakfastCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breakfastCatalogue = BreakfastCatalogue::orderBy(ColumnName::BREAKFAST_TYPE, GeneralConstant::ORDER_BY_ASC)->get();;
        
        return $this->showAll($breakfastCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Commons\BreakfastCatalogue  $breakfastCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(BreakfastCatalogue $breakfastCatalogue)
    {
        return $this->showOne($breakfastCatalogue);
    }

}
