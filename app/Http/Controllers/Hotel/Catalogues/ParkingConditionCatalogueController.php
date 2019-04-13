<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\Query;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;
use BukApi\Traits\Enum;

class ParkingConditionCatalogueController extends ApiController
{
    use Enum;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkingConditionCatalogue = $this->getEnums(QUERY::PARKING_CONDITION_ENUM);
        $parkingConditionCatalogue = $this ->getCollection($parkingConditionCatalogue);
        
        return $this->showAll($parkingConditionCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parkingConditionCatalogue = $this->getEnum($id, QUERY::PARKING_CONDITION_ENUM);

        if($parkingConditionCatalogue!=null)
            {
                return $this->showAll($parkingConditionCatalogue);
            }
        
        return $this->errorResponse(RequestMessage::PARKING_CONDITION_NOT_FOUND_BEGIN.$id.RequestMessage::NOT_FOUND_END, 
                RequestCode::NOT_FOUND);      
    }
}
