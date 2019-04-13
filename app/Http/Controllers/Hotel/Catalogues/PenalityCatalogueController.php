<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\Query;
use BukApi\Traits\Enums;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;

class PenalityCatalogueController extends ApiController
{
    use Enums;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penality = $this->getEnums(QUERY::PENALITY);
        $penality = $this ->getCollectionOrderById($penality);
        
        return $this->showAll($penality);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penality = $this->getEnum($id, QUERY::PENALITY);

        if($penality!=null)
            {
                return $this->showAll($penality);
            }
        
        return $this->errorResponse(RequestMessage::PENALITY_NOT_FOUND_BEGIN.$id.RequestMessage::NOT_FOUND_END, 
                RequestCode::NOT_FOUND);
    }

}
