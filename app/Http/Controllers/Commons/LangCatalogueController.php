<?php

namespace BukApi\Http\Controllers\Commons;

use BukApi\Models\Commons\LangCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use \BukApi\Constants\GeneralConstant;

class LangCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $langCatalogue = LangCatalogue::orderBy(ColumnName::LANG_DESCRIPTION, GeneralConstant::ORDER_BY_ASC)->get();
        
        return $this->showAll($langCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Commons\LangCatalogue  $langCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(LangCatalogue $langCatalogue)
    {
        return $this->showOne($langCatalogue);
    }
}
