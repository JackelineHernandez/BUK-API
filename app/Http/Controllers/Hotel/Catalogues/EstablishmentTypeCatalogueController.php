<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use BukApi\Models\Hotel\Catalogues\EstablishmentTypeCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use \BukApi\Constants\GeneralConstant;

class EstablishmentTypeCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $establishmentTypeCatalogue = EstablishmentTypeCatalogue::where(ColumnName::ACTIVE, GeneralConstant::ONE)
                                                                ->orderBy(ColumnName::ESTABLISHMENT_TYPE_DESCRIPTION, GeneralConstant::ORDER_BY_ASC)
                                                                ->get();
        
        return $this->showAll($establishmentTypeCatalogue);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Hotel\Catalogues\EstablishmentTypeCatalogue  $establishmentTypeCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(EstablishmentTypeCatalogue $establishmentTypeCatalogue)
    {
        return $this->showOne($establishmentTypeCatalogue);
    }
}
