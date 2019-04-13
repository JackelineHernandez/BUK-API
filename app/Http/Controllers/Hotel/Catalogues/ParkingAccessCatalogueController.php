<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\Query;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;
use BukApi\Traits\Enum;

class ParkingAccessCatalogueController extends ApiController
{
    use Enum;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkingAccessCatalogue = $this->getEnums(QUERY::PARKING_ACCESS_ENUM);
        $parkingAccessCatalogue = $this ->getCollection($parkingAccessCatalogue);
        
        return $this->showAll($parkingAccessCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parkingAccessCatalogue = $this->getEnum($id, QUERY::PARKING_ACCESS_ENUM);

        if($parkingAccessCatalogue!=null)
            {
                return $this->showAll($parkingAccessCatalogue);
            }
        
        return $this->errorResponse(RequestMessage::PARKING_ACCESS_NOT_FOUND_BEGIN.$id.RequestMessage::NOT_FOUND_END, 
                RequestCode::NOT_FOUND);
    }
}
