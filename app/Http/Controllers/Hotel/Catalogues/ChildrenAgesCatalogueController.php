<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\Query;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;
use BukApi\Traits\Enum;


class ChildrenAgesCatalogueController extends ApiController
{
    use Enum;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childrenAges = $this->getEnums(QUERY::CHILDREN_AGES_ENUM);
        $childrenAges = $this ->getCollectionOrderById($childrenAges);
        
        return $this->showAll($childrenAges);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $childrenAges = $this->getEnum($id, QUERY::CHILDREN_AGES_ENUM);

        if($childrenAges!=null)
            {
                return $this->showAll($childrenAges);
            }
        
        return $this->errorResponse(RequestMessage::CHILDREN_AGES_NOT_FOUND_BEGIN.$id.RequestMessage::NOT_FOUND_END, 
                RequestCode::NOT_FOUND);
    }
}
