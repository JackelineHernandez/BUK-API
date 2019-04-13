<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\Query;
use BukApi\Traits\Enums;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;

class CancellationDaysCatalogueController extends ApiController
{
    use Enums;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cancellationDays = $this->getEnums(QUERY::CANCELLATION_DAYS);
        $cancellationDays = $this ->getCollectionOrderById($cancellationDays);
        
        return $this->showAll($cancellationDays);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cancellationDays = $this->getEnum($id, QUERY::CANCELLATION_DAYS);

        if($cancellationDays!=null)
            {
                return $this->showAll($cancellationDays);
            }
        
        return $this->errorResponse(RequestMessage::CANCELLATION_DAYS_NOT_FOUND_BEGIN.$id.RequestMessage::NOT_FOUND_END, 
                RequestCode::NOT_FOUND);
    }
}
