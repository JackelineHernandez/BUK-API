<?php

namespace BukApi\Http\Controllers\Commons;

use BukApi\Models\Commons\PayCardsCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use BukApi\Constants\GeneralConstant;

class PayCardsCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payCardsCatalogue = PayCardsCatalogue::orderBy(ColumnName::NAME, GeneralConstant::ORDER_BY_ASC)->get();
        
        return $this->showAll($payCardsCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Commons\PayCardsCatalogue  $payCardsCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(PayCardsCatalogue $payCardsCatalogue)
    {
        return $this->showOne($payCardsCatalogue);
    }

}
