<?php

namespace BukApi\Contracts\Engines\Base;

use BukApi\Contracts\Engines\IBaseEngine;
use BukApi\Constants\GeneralConstant;
use BukApi\Constants\SearchConstant;
use BukApi\Models\Search\Hotel\HotelAdditionalInfo;
use BukApi\Models\Search\Commons\Image;
use BukApi\Models\Search\Hotel\Room;
use BukApi\Models\Search\Commons\SearchResponse;
use BukApi\Models\Search\Commons\SearchResult;
use BukApi\Models\Search\Hotel\HotelSpecialNote;
use BukApi\Models\Reservation\Commons\ReservationResponse;
use BukApi\Models\Reservation\Hotel\ReservationHotelResult;
use BukApi\Models\Reservation\Hotel\ReservationHotelDetail;
use BukApi\Models\Reservation\Transfer\ReservationTransferResult;
use BukApi\Models\Reservation\Transfer\ReservationTransferDetail;
use BukApi\Models\Reservation\Transfer\Owner;
use BukApi\Models\Reservation\Activity\ReservationActivityResult;
use BukApi\Models\Reservation\Activity\ReservationActivityDetail;
use BukApi\Models\Reservation\Activity\PaxList;
use BukApi\Models\Reservation\Commons\Reservation;
use BukApi\Models\Reservation\Hotel\Pax;
use BukApi\Models\Reservation\Commons\CxlPolicy;
use BukApi\Models\Reservation\Hotel\HotelDetail;
use BukApi\Models\Reservation\Hotel\Address;
use BukApi\Models\Reservation\Hotel\Location;
use BukApi\Models\Search\Activity\Activity;
use BukApi\Models\Search\Activity\ActivityAdditionalInfo;
use BukApi\Models\Search\Activity\ActivityPrice;
use BukApi\Models\Search\Activity\ActivityType;
use BukApi\Models\Search\Transfer\Vehicle;
use BukApi\Models\Search\Transfer\Transfer;
use BukApi\Models\Search\Transfer\TransferAdditionalInfo;
use BukApi\Models\Search\Transfer\TransferSpecialNote;
use BukApi\Models\Hotel\HotelService;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;

/**
 * Class DefaultEngine
 * Orquestador
 * @package BukApi\Contracts\Engines\Base
 * @version March 14, 2018, 12:29 pm UTC
 *
 */
class DefaultEngine implements IBaseEngine
{

    public function __construct(){

    }

    public function obtenerAcceso($key, $secret) {

    }

    //Traslados

    public function searchTransfer($destination, $priceFrom = 0, $priceTo = 0, $arrivalDate, 
    $departureDate, $qtyProduct = 1, $qtyPax = 1, $others = null) {
        $response = new SearchResponse();
        $response->setStatus(true);
        $result = $this->mapDemoTransfer($destination);
        $response->setTotalRegs(count($result));
        $response->setResults($result);
        $response->setMessage(RequestMessage::RESULTS_FOUND);
        return $response;
    }

    private function mapDemoTransfer($destination){
        $searchResult = new SearchResult;
        $searchResult->setId("103dd0");
        $searchResult->setTitle("Service's name");
        $searchResult->setDescription("Service's description and extras.");
        $searchResult->setProductId(null);
        $searchResult->setDestination($destination);
        $searchResult->setDateini("2018-02-18");
        $searchResult->setDateend("2018-02-22");

        $additionalInfo = new TransferAdditionalInfo;
        $additionalInfo->setLocation("USA - ORLANDO(FLORIDA)");
        //special notes
        $specialNote = new TransferSpecialNote;
        $specialNote->setNote("Resort Package Fee Mandatorio: $28.00 más impuestos, por habitación.....");
        $specialNotes = [];
        $specialNotes[] = $specialNote;
        $additionalInfo->setSpecialNotes($specialNotes);

        $transfer = new Transfer;
        $transfer->setTotalPrice(654.54);

        $vehicle = new Vehicle;
        $vehicle->setTripType("first_leg");
        $vehicle->setTransferType("Regular / Premium");
        $vehicle->setProductId("1");
        $vehicle->setProductTypeId(8);
        $vehicle->setVehicleName("Peugeot 5008 o similar");
        $vehicle->setVehicleType("Minivan");
        $vehicle->setChildAgeLimit("9");
        $vehicle->setMaxPax(3);
        $vehicle->setMaxBag(4);
        $vehicle->setPrice(22);
        $vehicle->setCancellationDate("2018-03-21T13:00:00+00:00");
        $vehicle->setIsHandicapped(false);
        $vehicle->setIsTaxi(false);
        $vehicle->setTransferTimeInMinutes(30);
        $vehicle->setUnits(1);

        $image = new Image;
        $image->setDescription("image description");
        $image->setImage("http://www.dominio.com/imagen/transfers/car1866_4.jpg");
        $image->setThumbnail("http://www.dominio.com/imagen/transfers/car1866_4th.jpg");

        $vehicle->setImages([$image]);
        $transfer->setVehicles([$vehicle]);
        $additionalInfo->setTransfers($transfer);
        $searchResult->setAdditionalInfo($additionalInfo);
        $result = [];
        array_push($result, $searchResult);
        return $result;

    }

    public function makeTransferReservations($reservaArray = []){
        $reservaResponseArray = [];
        foreach ($reservaArray as $reserva) {
            array_push($reservaResponseArray, $this->transferReservation($reserva));
        }
        
        return $reservaResponseArray;
    }

    public function transferReservation($reserva){
        //
        $response = new ReservationResponse();
        $response->setStatus(true);

        $busquedaResult = $reserva->getProduct();

        $destination = $busquedaResult->getDestination();
        $dateIni = $busquedaResult->getDateini();
        $dateEnd = $busquedaResult->getDateend();
        $idProduct = $busquedaResult->getProductId();
        $others = $busquedaResult->getAdditionalInfo();

        //setting standar response
        $response->setMessage(RequestMessage::RESERVATION_SUCCESSFUL);
        $response->setResult($this->mapDemoTransferReservation($busquedaResult));
        return $response;
    }

    public function mapDemoTransferReservation($busquedaResult, $status = 1, $id = "1038757"){
        $reservation = new ReservationTransferResult;
        $reservation->setIdReservation("1038757");
        $reservation->setStatusProvider(($status) ? "CONFIRMED" : "cancelled");
        $reservation->setStatus($status);
        $reservation->setCancelationReasons(($status) ? null : "Cancelled for the pax");
        $reservation->setCommission(23);
        $reservation->setTotalPrice(438);
        $reservation->setPayBefore("2018-02-22");
        $reservation->setCompany("AGENCIA PRUEBAS");

        $reservationDetail = new ReservationTransferDetail;
        $reservationDetail->setLocation("USA - ORLANDO(FLORIDA)");
        $reservationDetail->setOrigin("direccion");
        $reservationDetail->setDestination("direccion");
        $reservationDetail->setRefPrice(580);
        $reservationDetail->setVehicleType("Minivan");
        $reservationDetail->setVehicle("Peugeot 5008 o similar");
        $reservationDetail->setPaxAdults(1);
        $reservationDetail->setPaxChildren(1);

        $owner = new Owner;
        $owner->setFirstName("dsds");
        $owner->setLastName("sdsd");
        $owner->setEmail("otero@host.local");
        $owner->setPhone("8604001674");
        $owner->setAddress("1947 Ihfi Plaza");
        $owner->setCountry("VE");
        $reservationDetail->setOwner($owner);
        $reservation->setReservationDetailTransfer([$reservationDetail]);

        $cxlPolicy = new CxlPolicy;
        $cxlPolicy->setFrom("2018-02-25T00:00:00");
        $cxlPolicy->setTo("2018-02-28T00:00:00");
        $cxlPolicy->setCxlCharge(113);

        $reservation->setCxlPolicy([$cxlPolicy]);

        if($busquedaResult)
        {
            $busquedaResult->setAdditionalInfo($reservation);
            return $busquedaResult;
        }
        return $reservation;
    }

    public function deleteTransferReservation($idReserva) {
        $response = new ReservationResponse();
        $response->setStatus(true);
        $response->setMessage(RequestMessage::RESERVATION_CANCELED);
        $reserva = new Reservation();
        $reserva->setId($idReserva);
        $reserva->setTitle("Executive service");
        $reserva->setDescription("Service's description");
        $reserva->setProductId("1038757");
        $reserva->setDestination("ORL");
        $reserva->setDateIni("2018-03-22");
        $reserva->setDateEnd("2018-03-26");

        $response->setResult($this->mapDemoTransferReservation($reserva, 0, $idReserva));
        
        //
        return $response;
    }

    //Hoteles

    private function calculate_distance($lat1, $lon1, $lat2, $lon2){ 
        $theta = $lon1 - $lon2; 
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + 
        cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
        $dist = acos($dist); 
        $dist = rad2deg($dist); 
        $miles = $dist * SearchConstant::DEG_TO_MILES;

        if( ($miles*SearchConstant::MILES_TO_KM) > SearchConstant::MAX_SEARCH_DISTANCE){
            return false;
        }
        return true;
    }

    public function searchHotel($destination, $priceFrom = 0, $priceTo = 0, $arrivalDate, 
                                $departureDate, $others) {
        $response = new SearchResponse();
        $response->setStatus(true);
        $result = $this->mapHotel($destination, $arrivalDate, $departureDate, $others);
        $response->setResults($result);
        if(empty($result)){
            $response->setTotalRegs(count($result));
            $response->setMessage(RequestMessage::NO_RESULTS);
            return $response;
        }else{
            $response->setTotalRegs(count($result));
            $response->setMessage(RequestMessage::RESULTS_FOUND);
        }
        return $response;
    }

    private function calculateRoomSpace($others, $maxRooms, $maxPeople){
        $qty;
        $others = json_encode($others);
        $others = json_decode($others, true);
        $rooms = count($others[SearchConstant::HOTELS][SearchConstant::ROOM_CONFIG]);
        
        $result = false;
        foreach($others[SearchConstant::HOTELS][SearchConstant::ROOM_CONFIG] as $people){
            $qty = $people[SearchConstant::ADULTS] + count($people[SearchConstant::CHILDREN]);
            if($qty > $maxPeople){
                return false;
            }else{
                $result = true;
            }
        }
        if(($rooms > $maxRooms)){
            $result = false;
        }
        return $result;
        
    }

    public function getNumberOfNights($date1, $date2)
    {
        $datetime1 = strtotime($date1);
        $datetime2 = strtotime($date2);
        //Se calcula la diferencia en segundos entre las dos variables
        $secs = $datetime2 - $datetime1;
        $days = $secs / 86400;

        return $days;
    }

    private function mapHotel($destination, $arrivalDate, $departureDate, $others){
        $hotelServices = HotelService::with(SearchConstant::ROOM_RELATIONSHIP, SearchConstant::PHOTOS, SearchConstant::GENERAL_DESCRIPTION_RELATIONSHIP)->get();
        $hoteles = [];
        $nights = $this->getNumberOfNights($arrivalDate, $departureDate);
        foreach ($hotelServices as $hotel) {
            $geoCoordinates = $hotel->geo_coordinates;
            $jsonurl = SearchConstant::IATAGEO_API . $destination;
            $json = file_get_contents($jsonurl);
            $coordinates = json_decode($json, true);
            if(!isset($coordinates[SearchConstant::ERROR])){
                list($lat, $long) = explode(SearchConstant::EXPLODE, $geoCoordinates);
                if($this->calculate_distance($lat, $long, $coordinates[SearchConstant::LAT], $coordinates[SearchConstant::LONG])){
                    array_push($hoteles, $hotel);
                }
            }else{
                return SearchConstant::IATA_ERROR;
            } 
        }

        $result = [];
        foreach ($hoteles as $hotel) {
            $searchResult = new SearchResult;
            $searchResult->setId($hotel->id);
            $searchResult->setTitle($hotel->establishment_name);
            $searchResult->setDescription(null);
            $searchResult->setDestination($destination);
            $searchResult->setDateini($arrivalDate);
            $searchResult->setDateend($departureDate);

            $additionalInfo = new HotelAdditionalInfo;
            $additionalInfo->setLocation($hotel->home_address);
            $additionalInfo->setCategory($hotel->starRating);
            $additionalInfo->setReserveMultiHab(false);

            //special notes
            // TODO: cuando se tenga implementado en BD se debe devolver bien
            $specialNote = new HotelSpecialNote;
            $specialNotes = [];
            $specialNotes[] = $specialNote;
            $additionalInfo->setSpecialNotes($specialNotes);

            //images
            if (is_object($hotel->photoHotel))
            {
                $images = [];
                foreach ($hotel->photoHotel as $photo) {
                    $image = new Image;
                    $image->image = $photo->image_path;
                    // TODO: agregar campos thumbnail y description que aun no existen en BD
                }
                $additionalInfo->setImages($images);
            }

            //rooms qty
            $additionalInfo->setRoomsQty($hotel->quantity_rooms);
            if (is_object($hotel->roomPriceLayout))
            {
                $rooms = [];
                foreach ($hotel->roomPriceLayout as $layout) {
                    if($this->calculateRoomSpace($others, $layout->roomInfo[SearchConstant::QUANTITY], $layout->roomInfo[SearchConstant::ROOM_MAX_PAX])){
                        //rooms info
                        $room = new Room;
                        $room->setDescription($layout->roomInfo[SearchConstant::ROOM_TYPE][SearchConstant::ROOM_DESC]);
                        $room->setRoomType($layout->roomInfo[SearchConstant::ROOM_NAME][SearchConstant::NAME]);
                        $room->setRoomId($layout->id);
                        $room->setMaxPax($layout->roomInfo[SearchConstant::ROOM_MAX_PAX]);
                        // TODO: cuando se tenga implementado en BD se debe devolver bien los campos que estan en null
                        $room->setNetPrice(null);
                        $room->setOptionNightsNetTotal(null);
                        $room->setOptionCommissionValue(null);
                        $room->setOptionNightsTotal($layout->price * $nights);
                        $room->setRefPrice($layout->price);
                        $room->setOptionFreeNightsTotal(null);
                        $room->setOptionCommissionPercentage(null);
                        $room->setNights($nights);
                        $room->setSpecialPrice([]);
                        array_push($rooms, $room);
                    }
                }
                $additionalInfo->setRooms($rooms);
            }
            //seting additionalInfo
            $searchResult->setAdditionalInfo($additionalInfo);
            if($additionalInfo->getRooms()){
                array_push($result, $searchResult);
            }
            
        } 
        return $result;
    }

    public function makeReservations($reservaArray = []) {
        $reservaResponseArray = [];
        foreach ($reservaArray as $reserva) {
            array_push($reservaResponseArray, $this->hotelReservation($reserva));
        }
        
        return $reservaResponseArray;
    }


	public function hotelReservation($reserva) {
        $response = new ReservationResponse();
        $response->setStatus(true);
        //verifica el adapter parte de la reserva
        $busquedaResult = $reserva->getProduct();

        $destination = $busquedaResult->getDestination();
        $dateIni = $busquedaResult->getDateini();
        $dateEnd = $busquedaResult->getDateend();
        $idProduct = $busquedaResult->getProductId();
        $others = $busquedaResult->getAdditionalInfo();

        //setting standar response
        $response->setMessage(RequestMessage::RESERVATION_SUCCESSFUL);
        $response->setResult($this->mapDemoHotelReservation($busquedaResult));
        return $response;
    }

    public function mapDemoHotelReservation($busquedaResult, $status = 1, $id = "100034210"){
        $reservation = new ReservationHotelResult;
        $reservation->setIdReservation("100034210");
        $reservation->setStatusProvider(($status) ? "CONFIRMED" : "cancelled");
        $reservation->setStatus($status);
        $reservation->setCancelationReasons(($status) ? null : "Cancelled for the pax");
        $reservation->setCommission(0);
        $reservation->setTotalPrice(580.6882);
        $reservation->setNights(4);
        $reservation->setPayBefore(null);
        $reservation->setCompany(null);

        $reservationDetail = new ReservationHotelDetail;
        $reservationDetail->setRoomNumber(1);
        $reservationDetail->setRoomType("King Guestroom");
        $reservationDetail->setRefPrice(580);
        
        $pax = new Pax;
        $pax->setId("100034210");
        $pax->setLastName("McGee");
        $pax->setFirstName("Maurice");
        $pax->setQty(1);
        $pax->setType("Adult");
        $pax->setAge(21);
        $reservationDetail->setPax([$pax]);
        $reservation->setReservationDetail($reservationDetail);

        $cxlPolicy = new CxlPolicy;
        $cxlPolicy->setFrom("2018-03-08T00:00:00");
        $cxlPolicy->setTo("2018-03-16T00:00:00");
        $cxlPolicy->setCxlCharge(580.688232);

        $reservation->setCxlPolicy([$cxlPolicy]);

        $hotelDetail = new HotelDetail;
        $hotelDetail->setName("The James Chicago Hotel");
        $location = new Location;
        $location->setCountry("United States");
        $location->setState("Illinois");
        $location->setCity("Chicago");
        $location->setZone("");
        $hotelDetail->setLocation($location);
        $address = new Address;
        $address->setAddress("55 East Ontario");
        $address->setZipcode("60611");
        $hotelDetail->setAddress($address);
        $hotelDetail->setPhone("");

        $reservation->setHotelDetail($hotelDetail);
        if($busquedaResult)
        {
            $busquedaResult->setAdditionalInfo($reservation);
            return $busquedaResult;
        }
        return $reservation;
    }

    public function deleteReservation($idReserva) {
        $response = new ReservationResponse();
        $response->setStatus(true);
        $response->setMessage(RequestMessage::RESERVATION_CANCELED);
        $reserva = new Reservation();
        $reserva->setId($idReserva);
        $reserva->setTitle("Comfort Inn Cockatoo Near LAX Airport");
        $reserva->setDescription("Comfort Inn Cockatoo Near LAX Airport is a strategically located Los Angeles hotel just four miles from LAX, offering free airport transportation, breakfast, wireless Internet access, and parking. Situated just steps from major highways, the property also allows guests easy access to popular attractions, like Disneyland, Universal Studios, and Santa Monica Pier. Complete with spacious guestrooms equipped with kitchen facilities, this hotel has all you need for an enjoyable stay.");
        $reserva->setProductId("10314579");
        $reserva->setDestination("LAX");
        $reserva->setDateIni("2018-03-22");
        $reserva->setDateEnd("2018-03-26");

        $response->setResult($this->mapDemoReservation($reserva, 0, $idReserva));
        
        //
        return $response;
    }

    //Actividades: Tours

    public function searchActivity($destination, $priceFrom = 0, $priceTo = 0, $arrivalDate, 
                                $departureDate, $qtyProduct = 1, $qtyPax = 1, $others = null) {

        //aqui se deberia hacer la busqueda en backend,
        //de momento se devuelve una respuesta demo generada por el metodo mapDemoHotel
        $response = new SearchResponse();
        $response->setStatus(true);
        $result = $this->mapDemoActivity($destination, $arrivalDate, $departureDate);
        $response->setTotalRegs(count($result));
        $response->setResults($result);
        $response->setMessage(RequestMessage::RESULTS_FOUND);
        return $response;
    }

    private function mapDemoActivity($destination, $dateIni, $dateEnd){
        $searchResult = new SearchResult;

        $searchResult->setId("103dd0");
        $searchResult->setTitle("Service's name");
        $searchResult->setDescription("Service's description and extras.");
        $searchResult->setProductId("103dd0_138507680080218_4_2-4_1_9_f1bbf728eaf44cc78d75451a9adb7c4e_");
        $searchResult->setDestination($destination);
        $searchResult->setDateini($dateIni);
        $searchResult->setDateend($dateEnd);

        $additionalInfo = new ActivityAdditionalInfo;
        $additionalInfo->setLocation("USA - ORLANDO(FLORIDA)");

        //images
        $image = new Image;
        $image->setDescription("image_");
        $image->setImage("http://www.dominio.com/imagen/hoteles/hotel1866_4.jpg");
        $image->setThumbnail("http://www.dominio.com/imagen/hoteles/hotel1866_4th.jpg");
        $images  = [];
        $images[] = $image;
        $additionalInfo->setImages($images);

        //special notes
        $specialNote = new HotelSpecialNote;
        $specialNote->setNote("Resort Package Fee Mandatorio: $28.00 más impuestos, por habitación.....");
        $specialNote->setFrom("2016-06-02T00:00:00");
        $specialNote->setTo("2019-04-30T00:00:00");
        $specialNotes = [];
        $specialNotes[] = $specialNote;
        $additionalInfo->setSpecialNotes($specialNotes);

        //actividades
        $activity = new Activity;
        //prices
        $price = new ActivityPrice;
        $price->setAdult(30.00);
        $price->setChild(20.00);
        //type
        $type = new ActivityType;
        $type->setName("Tour General");
        $type->setPrices($price);
        $type->setAvailableDates(["2016-04-01", "2016-04-02"]);
        $type->setDuration("2 days");
        $type->setTotalPrice(130.00);
        $activity->setTypes([$type]);
        $additionalInfo->setTours($activity);

        //seting additionalInfo
        $searchResult->setAdditionalInfo($additionalInfo);

        $result = [];
        array_push($result, $searchResult);
        return $result;
        
    }

    public function makeActivityReservations($reservaArray = []){
        $reservaResponseArray = [];
        foreach ($reservaArray as $reserva) {
            array_push($reservaResponseArray, $this->activityReservation($reserva));
        }
        
        return $reservaResponseArray;
    }

    public function activityReservation($reserva){
        //
        $response = new ReservationResponse();
        $response->setStatus(true);

        $busquedaResult = $reserva->getProduct();

        $destination = $busquedaResult->getDestination();
        $dateIni = $busquedaResult->getDateini();
        $dateEnd = $busquedaResult->getDateend();
        $idProduct = $busquedaResult->getProductId();
        $others = $busquedaResult->getAdditionalInfo();

        //setting standar response
        $response->setMessage(RequestMessage::RESERVATION_SUCCESSFUL);
        $response->setResult($this->mapDemoActivityReservation($busquedaResult));
        return $response;
    }

    public function mapDemoActivityReservation($busquedaResult, $status = 1, $id = "1038757"){
        $reservation = new ReservationActivityResult;
        $reservation->setIdReservation("1038757");
        $reservation->setStatusProvider(($status) ? "CONFIRMED" : "cancelled");
        $reservation->setStatus($status);
        $reservation->setCancelationReasons(($status) ? null : "Cancelled for the pax");
        $reservation->setCommission(23);
        $reservation->setTotalPrice(438);
        $reservation->setNights(3);
        $reservation->setPayBefore("2018-02-22");
        $reservation->setCompany("AGENCIA PRUEBAS");

        $reservationDetail = new ReservationActivityDetail;
        $reservationDetail->setName("Tour General");
        //prices
        $price = new ActivityPrice;
        $price->setAdult(30.00);
        $price->setChild(20.00);
        $reservationDetail->setPrices($price);

        $reservationDetail->setDuration("2 days");
        $reservationDetail->setTotalPrice(130.00);

        //paxList
        $paxList = new PaxList;
        $paxList->setTitle("MRS.");
        $paxList->setFirstName("Josie");
        $paxList->setLastName("Nichols");
        $paxList->setAge(35);
        $paxList->setEmail("otero@host.local");
        $paxList->setPhone("8604001674");
        $paxList->setAddress("1947 Ihfi Plaza");
        $paxList->setCountry("VE");
        $paxList->setHolder("holder");

        $reservationDetail->setPaxList([$paxList]);


        $reservation->setReservationDetailTours([$reservationDetail]);

        $cxlPolicy = new CxlPolicy;
        $cxlPolicy->setFrom("2018-02-25T00:00:00");
        $cxlPolicy->setTo("2018-02-28T00:00:00");
        $cxlPolicy->setCxlCharge(113);

        $reservation->setCxlPolicy([$cxlPolicy]);

        if($busquedaResult)
        {
            $busquedaResult->setAdditionalInfo($reservation);
            return $busquedaResult;
        }
        return $reservation;
    }

    public function deleteActivityReservation($idReserva) {
        $response = new ReservationResponse();
        $response->setStatus(true);
        $response->setMessage(RequestMessage::RESERVATION_CANCELED);
        $reserva = new Reservation();
        $reserva->setId($idReserva);
        $reserva->setTitle("Executive service");
        $reserva->setDescription("Service's description");
        $reserva->setProductId("1038757");
        $reserva->setDestination("ORL");
        $reserva->setDateIni("2018-03-22");
        $reserva->setDateEnd("2018-03-26");

        $response->setResult($this->mapDemoActivityReservation($reserva, 0, $idReserva));
        
        //
        return $response;
    }

    //General

    public function findReservation($idReserva) {
        $response = new ReservationResponse();

        $response->setStatus(false);
        $response->setMessage(RequestMessage::RESERVATION_ERROR);
        $response->setResult(RequestMessage::NO_RESULTS);

        return $response;
    }

    public function updateReservations(array $reservas){
      $responseActualizaciones = [];
      foreach ($reservas as $reserva) {
        $busquedaProducto = $reserva;
        $result = $this->updateReservation($reserva, $busquedaProducto->idReservationOld);
        $responseActualizaciones[] = $result;
      }
      return $responseActualizaciones;
    }

	public function updateReservation($reserva, $idReserva) {
        $response = new ReservationResponse();
        $response->setStatus(false);
        $response->setMessage(RequestMessage::UNEXPECTED);
        $response->setResult(RequestMessage::ID_SEARCH);
        //
        return $response;
    }

}