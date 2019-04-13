<?php

namespace BukApi\Http\Controllers\Search\Transfer;

use Illuminate\Http\Request;
use BukApi\Contracts\Engines\IBaseEngine;
use BukApi\Http\Controllers\ApiController;
use BukApi\Http\Requests\SearchTransferRequest;
use BukApi\Models\Search\Commons\SearchResponse;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;
use BukApi\Constants\GeneralConstant;
use Response;

class SearchTransferController extends ApiController
{
    /** @var engine */
    private $engine;
    
    /**
    * inyecting orchestrator
    */
    public function __construct(IBaseEngine $enginebase)
    {
        $this->engine = $enginebase;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchTransferRequest $request)
    {
        $filters = json_decode($request->getContent());
        
                if (empty($filters)) {
                    $result = new SearchResponse();
                    $result->setStatus(false);
                    $result->setMessage(RequestMessage::BAD_FILTERS);
                    return response($result, RequestCode::OK)->header(GeneralConstant::CONTENT_TYPE, GeneralConstant::FORMAT);
                }
                else {
                    $destination = $filters->destination;
                    $priceFrom = $filters->priceFrom;
                    $priceTo = $filters->priceTo;
                    $arrivalDate = $filters->arrivalDate;
                    $departureDate = $filters->departureDate;
                    $qtyProduct = $filters->qtyProduct;
                    $qtyPax = $filters->qtyPax;
                    $others = $filters->others;
        
                     $response = json_encode(
                                    $this->engine->searchTransfer(
                                        $destination,
                                        $priceFrom ,
                                        $priceTo,
                                        $arrivalDate,
                                        $departureDate,
                                        $qtyProduct,
                                        $qtyPax,
                                        $others)
                                    ,
                                    JSON_UNESCAPED_UNICODE
                                    | JSON_UNESCAPED_SLASHES |JSON_PRETTY_PRINT
                    );
                    return response($response, RequestCode::OK)->header(GeneralConstant::CONTENT_TYPE, GeneralConstant::FORMAT);
                }
    }

}
