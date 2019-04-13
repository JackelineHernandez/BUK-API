<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\Query;
use BukApi\Traits\Enums;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;

class PetsChargesCatalogueController extends ApiController
{
    use Enums;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petsCharges = $this->getEnums(QUERY::PETS_CHARGES);
        $petsCharges = $this ->getCollectionOrderById($petsCharges);
        
        return $this->showAll($petsCharges);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petsCharges = $this->getEnum($id, QUERY::PETS_CHARGES);

        if($petsCharges!=null)
            {
                return $this->showAll($petsCharges);
            }
        
        return $this->errorResponse(RequestMessage::PETS_CHARGES_NOT_FOUND_BEGIN.$id.RequestMessage::NOT_FOUND_END, 
                RequestCode::NOT_FOUND);
    }
}
