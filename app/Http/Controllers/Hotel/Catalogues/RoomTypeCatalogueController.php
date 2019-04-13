<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use BukApi\Models\Hotel\Catalogues\RoomTypeCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use BukApi\Constants\GeneralConstant;


class RoomTypeCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomTypeCatalogue = RoomTypeCatalogue::orderBy(ColumnName::ROOM_TYPE_DESCRIPTION, GeneralConstant::ORDER_BY_ASC)->get();
        
        return $this->showAll($roomTypeCatalogue);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Hotel\Catalogues\RoomTypeCatalogue  $roomTypeCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(RoomTypeCatalogue $roomTypeCatalogue)
    {
        return $this->showOne($roomTypeCatalogue);
    }
}
