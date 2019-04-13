<?php

namespace BukApi\Http\Controllers\Commons;

use BukApi\Models\Commons\InternetConnectTypeCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use \BukApi\Constants\GeneralConstant;

class InternetConnectTypeCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internetConnectTypeCatalogue = InternetConnectTypeCatalogue::orderBy(ColumnName::CONNECT_TYPE, GeneralConstant::ORDER_BY_ASC)->get();
        
        return $this->showAll($internetConnectTypeCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Commons\InternetConnectTypeCatalogue  $internetConnectTypeCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(InternetConnectTypeCatalogue $internetConnectTypeCatalogue)
    {
        return $this->showOne($internetConnectTypeCatalogue);
    }

}
