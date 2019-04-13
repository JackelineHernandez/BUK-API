<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\Query;
use BukApi\Traits\Enums;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;

class ChildAgesLimitCatalogueController extends ApiController
{
    use Enums;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childAgesLimits = $this->getEnums(QUERY::CHILD_AGES_LIMIT);
        $childAgesLimits = $this ->getCollectionOrderById($childAgesLimits);
        
        return $this->showAll($childAgesLimits);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $childAgesLimits = $this->getEnum($id, QUERY::CHILD_AGES_LIMIT);

        if($childAgesLimits!=null)
            {
                return $this->showAll($childAgesLimits);
            }
        
        return $this->errorResponse(RequestMessage::CHILD_AGES_LIMIT_NOT_FOUND_BEGIN.$id.RequestMessage::NOT_FOUND_END, 
                RequestCode::NOT_FOUND);
    }
}
