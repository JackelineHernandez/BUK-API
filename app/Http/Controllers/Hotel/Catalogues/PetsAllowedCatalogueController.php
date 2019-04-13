<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\Query;
use BukApi\Traits\Enums;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;

class PetsAllowedCatalogueController extends ApiController
{
    use Enums;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petsAllowed = $this->getEnums(QUERY::PETS_ALLOWED);
        $petsAllowed = $this ->getCollectionOrderById($petsAllowed);
        
        return $this->showAll($petsAllowed);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petsAllowed = $this->getEnum($id, QUERY::PETS_ALLOWED);

        if($petsAllowed!=null)
            {
                return $this->showAll($petsAllowed);
            }
        
        return $this->errorResponse(RequestMessage::PETS_ALLOWED_NOT_FOUND_BEGIN.$id.RequestMessage::NOT_FOUND_END, 
                RequestCode::NOT_FOUND);
    }
}
