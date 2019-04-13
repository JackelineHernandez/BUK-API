<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use BukApi\Models\Hotel\Catalogues\RoomNamesCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use BukApi\Constants\GeneralConstant;

class RoomNamesCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomNamesCatalogue = RoomNamesCatalogue::orderBy(ColumnName::CATALOGUE_NAME, GeneralConstant::ORDER_BY_ASC)->get();
        
        return $this->showAll($roomNamesCatalogue);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Hotel\Catalogues\RoomNamesCatalogue  $roomNamesCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(RoomNamesCatalogue $roomNamesCatalogue)
    {
        return $this->showOne($roomNamesCatalogue);
    }
}
