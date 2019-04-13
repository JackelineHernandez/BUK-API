<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\Query;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;
use BukApi\Traits\Enum;

class UnitMeasureRoomCatalogueController extends ApiController
{
    use Enum;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitMeasureRoomCatalogue = $this->getEnums(QUERY::UNIT_MEASURE_ROOM_ENUM);
        $unitMeasureRoomCatalogue = $this ->getCollection($unitMeasureRoomCatalogue);

        return $this->showAll($unitMeasureRoomCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unitMeasureRoomCatalogue = $this->getEnum($id, QUERY::UNIT_MEASURE_ROOM_ENUM);

        if($unitMeasureRoomCatalogue!=null)
            {
                return $this->showAll($unitMeasureRoomCatalogue);
            }
        
        return $this->errorResponse(RequestMessage::UNIT_MEASURE_ROOM_NOT_FOUND_BEGIN.$id.RequestMessage::NOT_FOUND_END, 
                RequestCode::NOT_FOUND);
    }
}
