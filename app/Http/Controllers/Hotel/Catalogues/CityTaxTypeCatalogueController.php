<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\Query;
use BukApi\Traits\Enums;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;

class CityTaxTypeCatalogueController extends ApiController
{
    use Enums;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cityTaxType = $this->getEnums(QUERY::CITY_TAX_TYPE);
        $cityTaxType = $this ->getCollectionOrderById($cityTaxType);
        
        return $this->showAll($cityTaxType);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cityTaxType = $this->getEnum($id, QUERY::CITY_TAX_TYPE);

        if($cityTaxType!=null)
            {
                return $this->showAll($cityTaxType);
            }
        
        return $this->errorResponse(RequestMessage::CITY_TAX_TYPE_NOT_FOUND_BEGIN.$id.RequestMessage::NOT_FOUND_END, 
                RequestCode::NOT_FOUND);
    }
}
