<?php

namespace BukApi\Http\Controllers\Commons;

use BukApi\Models\Commons\CustomerTypeCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use \BukApi\Constants\GeneralConstant;

class CustomerTypeCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerTypeCatalogue = CustomerTypeCatalogue::orderBy(ColumnName::CLIENT_KIND_DESCRIPTION, GeneralConstant::ORDER_BY_ASC)->get();
        
        return $this->showAll($customerTypeCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Commons\CustomerTypeCatalogue  $customerTypeCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerTypeCatalogue $customerTypeCatalogue)
    {
        return $this->showOne($customerTypeCatalogue);
    }
}
