<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\Query;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;
use BukApi\Traits\Enum;

class ParkingLocationCatalogueController extends ApiController
{
    use Enum;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkingLocationCatalogue = $this->getEnums(QUERY::PARKING_LOCATION_ENUM);
        $parkingLocationCatalogue = $this ->getCollection($parkingLocationCatalogue);

        return $this->showAll($parkingLocationCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parkingLocationCatalogue = $this->getEnum($id, QUERY::PARKING_LOCATION_ENUM);

        if($parkingLocationCatalogue!=null)
            {
                return $this->showAll($parkingLocationCatalogue);
            }
        
        return $this->errorResponse(RequestMessage::PARKING_LOCATION_NOT_FOUND_BEGIN.$id.RequestMessage::NOT_FOUND_END, 
                RequestCode::NOT_FOUND);
    }

}
