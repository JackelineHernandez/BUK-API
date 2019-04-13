<?php

namespace BukApi\Http\Controllers\Commons;

use BukApi\Models\Commons\CategoryCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use \BukApi\Constants\GeneralConstant;

class CategoryCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryCatalogue = CategoryCatalogue::orderBy(ColumnName::CATEGORY_NAME, GeneralConstant::ORDER_BY_ASC)->get();

        return $this->showAll($categoryCatalogue);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Commons\CategoryCatalogue  $categoryCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryCatalogue $categoryCatalogue)
    {
        return $this->showOne($categoryCatalogue);
    }
}
