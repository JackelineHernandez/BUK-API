<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\Query;
use BukApi\Traits\Enums;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;

class GraceTimePeriodCatalogueController extends ApiController
{
    use Enums;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graceTimePeriod = $this->getEnums(QUERY::GRACE_TIME_PERIOD);
        $graceTimePeriod = $this ->getCollectionOrderById($graceTimePeriod);
        
        return $this->showAll($graceTimePeriod);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $graceTimePeriod = $this->getEnum($id, QUERY::GRACE_TIME_PERIOD);

        if($graceTimePeriod!=null)
            {
                return $this->showAll($graceTimePeriod);
            }
        
        return $this->errorResponse(RequestMessage::GRACE_TIME_PERIOD_NOT_FOUND_BEGIN.$id.RequestMessage::NOT_FOUND_END, 
                RequestCode::NOT_FOUND);
    }
}
