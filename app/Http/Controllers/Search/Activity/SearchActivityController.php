<?php

namespace BukApi\Http\Controllers\Search\Activity;

use BukApi\Contracts\Engines\IBaseEngine;
use BukApi\Http\Controllers\ApiController;
use BukApi\Http\Requests\SearchActivityRequest;
use BukApi\Models\Search\Commons\SearchResponse;
use Illuminate\Http\Request;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;
use BukApi\Constants\GeneralConstant;
use Response;

class SearchActivityController extends ApiController
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
	 * POST|HEAD /search
	 *
	 * JSON request:
	 * {
		 $destination:,
		 $priceFrom:,
		 $priceTo:,
		 $arrivalDate:,
		 $departureDate:,
		 $qtyProduct:,
		 $qtyPax:,
		 $others:
		 {
		 }
	   }
	 * - destination: IATA code
	 * - priceFrom/priceTo: float
	 * - arrivalDate/departureDate: datetime
	 * - qtyProduct: product quantity
	 * - qtyPax: number of passengers
	 * - others: json to additional key pair values
	 *
	 */
    public function index(SearchActivityRequest $request)
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
                                    $this->engine->searchActivity(
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
