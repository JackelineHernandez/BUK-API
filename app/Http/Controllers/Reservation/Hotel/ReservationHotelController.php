<?php

namespace BukApi\Http\Controllers\Reservation\Hotel;

use BukApi\Contracts\Engines\IBaseEngine;
use BukApi\Http\Controllers\ApiController;
use BukApi\Http\Requests\CreateReservationHotelRequest;
use BukApi\Http\Requests\UpdateReservationRequest;
use BukApi\Models\Reservation\Commons\ReservationResponse;
use BukApi\Models\Reservation\Commons\Reservation;
use Illuminate\Http\Request;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;
use BukApi\Constants\GeneralConstant;
use Response;

class ReservationHotelController extends ApiController
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
     * @param CreateReservationHotelRequest $request
     *
     * @return Arrays array of ReservationResponse
     */
    public function store(CreateReservationHotelRequest $request)
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
            
            $response = json_encode($this->engine->makeReservations($reservaArray));
            return response($response, RequestCode::OK)->header(GeneralConstant::CONTENT_TYPE, GeneralConstant::FORMAT);
        } 
    }

    /**
     * Display the specified Reserva.
     * GET|HEAD /reserva/{idReserva}
     *
     * @param String $idReserva
     *
     * @return Response
     */
    public function show($idReservation)
    {
        $response = '';
        
        $response = json_encode($this->engine->findReservation($idReservation));                 
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
        $response = json_encode($this->engine->deleteReservation($id));
        return response($response, 200)->header(GeneralConstant::CONTENT_TYPE, GeneralConstant::FORMAT);
    }
}
