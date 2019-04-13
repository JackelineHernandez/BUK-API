<?php

namespace BukApi\Http\Controllers\Reservation\Transfer;

use BukApi\Contracts\Engines\IBaseEngine;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;
use BukApi\Constants\GeneralConstant;
use BukApi\Http\Controllers\ApiController;
use BukApi\Http\Requests\CreateReservationTransferRequest;
use BukApi\Http\Requests\UpdateReservationRequest;
use BukApi\Models\Reservation\Commons\ReservationResponse;
use BukApi\Models\Reservation\Commons\Reservation;
use Illuminate\Http\Request;
use Response;

class ReservationTransferController extends ApiController
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
     * Store a newly created Reservation in storage.
     * POST /reservation
     *
     *
     * @param CreateReservationTransferRequest $request
     *
     * @return Arrays array of ReservationResponse
     */
    public function store(CreateReservationTransferRequest $request)
    {
         $filters = json_decode($request->getContent());	
         $filters = $filters[0];       
         if (empty($request->getContent()) ||
             !is_array(json_decode($request->getContent()))) {
             $result = new ReservationResponse();
             $result->setStatus(false);
             $result->setMessage(RequestMessage::BAD_FILTERS);                      
             return json_encode($result);
         }
         else {
             $reservaArray = [];
             foreach (json_decode($request->getContent()) AS $key => $value) {
                 $reserva = new Reservation();
                 $reserva->jsonDeserialize($value);
                 array_push($reservaArray, $reserva);
             }
             
             $response = json_encode($this->engine->makeTransferReservations($reservaArray));
             return response($response, RequestCode::OK)->header(GeneralConstant::CONTENT_TYPE, GeneralConstant::FORMAT);
         } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = '';
        
        $response = json_encode($this->engine->findReservation($id));                 
        return response($response, RequestCode::OK)->header(GeneralConstant::CONTENT_TYPE, GeneralConstant::FORMAT);
    }

    /**
     * Update the specified Reservation in storage.
     * PUT/PATCH/reserva/
     *
     * @param UpdateReservationRequest $request
     *
     * @return Response
     */
    public function update(UpdateReservationRequest $request)
    {
        $filters = json_decode($request->getContent(0));
        if (empty($request->getContent())) {
            $result = new ReservationResponse();
            $result->setStatus(false);
            return response(json_encode($result), RequestCode::OK)->header(GeneralConstant::CONTENT_TYPE, GeneralConstant::FORMAT);
        } else {
            $arrayUpdate = [];
            
            foreach (json_decode($request->getContent()) as $key => $value) {
              $reserva = new Reservation();
              $reserva->jsonDeserialize($value);
              $arrayUpdate[] = $reserva;
            }

            $response =  json_encode($this->engine->updateReservations($arrayUpdate));
            return response($response, RequestCode::OK)->header(GeneralConstant::CONTENT_TYPE, GeneralConstant::FORMAT);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = json_encode($this->engine->deleteTransferReservation($id));
        return response($response, 200)->header(GeneralConstant::CONTENT_TYPE, GeneralConstant::FORMAT);
    }
}
