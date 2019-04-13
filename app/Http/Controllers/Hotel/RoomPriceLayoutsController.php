<?php

namespace BukApi\Http\Controllers\Hotel;

use BukApi\Models\Hotel\RoomPriceLayout;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ValidationRule;
use BukApi\Constants\ColumnName;
use BukApi\Models\Hotel\HotelService;
use BukApi\Constants\GeneralConstant;
use BukApi\Constants\RequestMessage;
use BukApi\Constants\RequestCode;
use BukApi\Models\Hotel\Catalogues\RoomTypeCatalogue;
use BukApi\Models\Hotel\Catalogues\ItemMeasureCatalogue;
use Symfony\Component\HttpKernel\Exception\HttpException;
use BukApi\Http\Resources\Hotel\RoomPriceLayoutResource;
use BukApi\Constants\Query;
use BukApi\Traits\Enum;
use BukApi\Models\Hotel\Catalogues\RoomNamesCatalogue;

class RoomPriceLayoutsController extends ApiController
{
    use Enum;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoomPriceLayoutResource::collection(RoomPriceLayout::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ValidationRule::ROOM_PRICE_LAYOUTS;
        
        $this->validate($request, $rules);

        $input[ColumnName::HOTEL_SERVICE_ID] = $request->hotelServiceId;
        $input[ColumnName::ROOM_TOTAL_MEASURE] = $request->totalRoomMeasure;
        $input[ColumnName::UNIT_MEASURE_ROOM] =  $request->totalRoomMeasure!=null?$request->unitOfMeasurement:null;
        $input[ColumnName::PRICE] = $request->price;
        $input[ColumnName::ROOM_TYPE_CATALOGUE_ID] = $request->roomInfo[GeneralConstant::ROOM_TYPE_CATALOGUE_ID];
        $input[ColumnName::ROOM_NAMES_CATALOGUE_ID] = $request->roomInfo[GeneralConstant::ROOM_NAMES_CATALOGUE_ID];
        $input[ColumnName::ROOM_QUANTITY] = $request->roomInfo[GeneralConstant::ROOM_QUANTITY];
        $input[ColumnName::ROOM_PEOPLE_QUANTITY] = $request->roomInfo[GeneralConstant::ROOM_PEOPLE_QUANTITY];
        $input[ColumnName::CUSTOM_NAME] = $request->roomInfo[GeneralConstant::CUSTOM_NAME];
        $input[ColumnName::HAS_SMOKING_POLICY] = $request->roomInfo[GeneralConstant::HAS_SMOKING_POLICY] === GeneralConstant::BOOLEAN_TRUE;
        $input[ColumnName::SMOKING_POLICY_DESCRIPTION] = $request->roomInfo[GeneralConstant::HAS_SMOKING_POLICY]===GeneralConstant::BOOLEAN_TRUE?$request->roomInfo[GeneralConstant::SMOKING_POLICY_DESCRIPTION]:null;
        $input[ColumnName::LIVING_QUANTITY] = $request->spaces[GeneralConstant::LIVING_QUANTITY];
        $input[ColumnName::BATH_QUANTITY] = $request->spaces[GeneralConstant::BATH_QUANTITY];
        $input[ColumnName::ROOM_ITEM_MEASURE] = $request->bedInfo;
        
        

        $this->validateHotelService($input[ColumnName::HOTEL_SERVICE_ID]);
        $this->validateRoomType($input[ColumnName::ROOM_TYPE_CATALOGUE_ID]);
        $this->validateRoomName($input[ColumnName::ROOM_NAMES_CATALOGUE_ID]);
        $this->validateQuantityRoom($input[ColumnName::HOTEL_SERVICE_ID],$input[ColumnName::ROOM_QUANTITY]);
        $this->validateUnitMeasureRoom($input[ColumnName::UNIT_MEASURE_ROOM], $input[ColumnName::ROOM_TOTAL_MEASURE]);

        $roomItemMeasures=$this->validateItemMeasure($input[ColumnName::ROOM_ITEM_MEASURE], $input[ColumnName::ROOM_PEOPLE_QUANTITY]);

		$roomPriceLayout = RoomPriceLayout::create($input);
		
		if(!empty($roomItemMeasures))
            $roomPriceLayout->itemMeasureCatalogue()->attach($roomItemMeasures);

        return $this->showOne($roomPriceLayout, RequestCode::CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Hotel\RoomPriceLayout  $roomPriceLayout
     * @return \Illuminate\Http\Response
     */
    public function show(RoomPriceLayout $roomPriceLayout)
    {
        return new RoomPriceLayoutResource($roomPriceLayout);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BukApi\Models\Hotel\RoomPriceLayout  $roomPriceLayout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomPriceLayout $roomPriceLayout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BukApi\Models\Hotel\RoomPriceLayout  $roomPriceLayout
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomPriceLayout $roomPriceLayout)
    {
        //
    }

    private function validateHotelService($idHotelService){
        // Find HotelService
        $hotelService = HotelService::where(ColumnName::ID, $idHotelService)->first();  
        if(empty($hotelService))
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::HOTEL_SERVICE_NOT_FOUND_BEGIN.$idHotelService.RequestMessage::NOT_FOUND_END);
    }

    private function validateRoomType($idRoomType){
         // Find RoomType
         $roomType = RoomTypeCatalogue::where(ColumnName::ID, $idRoomType)->first();  
         if(empty($roomType))
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::ROOM_TYPE_NOT_FOUND_BEGIN.$idRoomType.RequestMessage::NOT_FOUND_END);    
    }

    private function validateQuantityRoom($idHotelService, $roomQuantity){

        $quantityRoomHotel = HotelService::select(ColumnName::QUANTITY_ROOMS)->where(ColumnName::ID, $idHotelService)->first();
        $currentRoomsLayouts = RoomPriceLayout::where(ColumnName::HOTEL_SERVICE_ID, $idHotelService)->sum(ColumnName::ROOM_QUANTITY);
        $quantityRoomPermited = $quantityRoomHotel->quantity_rooms-$currentRoomsLayouts;
        $currentRoomsLayouts += $roomQuantity;
        
        if($currentRoomsLayouts>$quantityRoomHotel->quantity_rooms)
            throw new HttpException(RequestCode::VALIDATION_EXCEPTION, RequestMessage::ROOM_QUANTITY_SURPASSED.$quantityRoomPermited);
    }

    private function validateItemMeasure($inputRoomItemMeasures, $roomInputPeopleQuantity){
        //Validate Item Measure
        $itemMeasure = ItemMeasureCatalogue::all()->pluck(ColumnName::ID);
        $itemMeasure=$itemMeasure->toArray();
		$roomPeopleQuantity=GeneralConstant::CERO;
		
        if (isset($inputRoomItemMeasures) && 
            is_array($inputRoomItemMeasures) && 
            !empty($inputRoomItemMeasures) && 
            !empty($itemMeasure)){
                
                $roomItemMeasures=[];
				
				foreach ($inputRoomItemMeasures as $item)
                    {
                    	if (isset($item[GeneralConstant::ID]) && is_numeric($item[GeneralConstant::ID]) && in_array($item[GeneralConstant::ID],$itemMeasure)){
                                    
                            $key = array_search($item[GeneralConstant::ID], array_column($roomItemMeasures, ColumnName::ITEM_MEASURE_CATALOGUE_ID));
                                    
                            if($key===false)
								if(isset($item[GeneralConstant::ITEM_QUANTITY]) && is_numeric($item[GeneralConstant::ITEM_QUANTITY]) 
									&& preg_match(ValidationRule::QUANTITY, $item[GeneralConstant::ITEM_QUANTITY]))
									if(isset($item[GeneralConstant::ITEM_PEOPLE_QUANTITY]) && is_numeric($item[GeneralConstant::ITEM_PEOPLE_QUANTITY]) 
									&& preg_match(ValidationRule::QUANTITY, $item[GeneralConstant::ITEM_PEOPLE_QUANTITY]))
										{
											array_push($roomItemMeasures, 
														[   ColumnName::ITEM_MEASURE_CATALOGUE_ID => $item[GeneralConstant::ID], 
															ColumnName::ITEM_QUANTITY => $item[GeneralConstant::ITEM_QUANTITY],
															ColumnName::ITEM_PEOPLE_QUANTITY => $item[GeneralConstant::ITEM_PEOPLE_QUANTITY]
														]);
											$roomPeopleQuantity+= $item[GeneralConstant::ITEM_QUANTITY] * $item[GeneralConstant::ITEM_PEOPLE_QUANTITY];
										}
									else 
                                        throw new HttpException(RequestCode::VALIDATION_EXCEPTION, RequestMessage::ITEM_PEOPLE_QUANTITY_INVALID.$item[GeneralConstant::ITEM_PEOPLE_QUANTITY]);
                                else 
                                    throw new HttpException(RequestCode::VALIDATION_EXCEPTION, RequestMessage::ITEM_QUANTITY_INVALID.$item[GeneralConstant::ITEM_QUANTITY]);
                            else
                                throw new HttpException(RequestCode::CONFLICT, RequestMessage::DUPLICATED_ITEM_MEASURE_BEGIN.$item[GeneralConstant::ID].RequestMessage::DUPLICATED_END);
                        }else 
                            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::ITEM_MEASURE_NOT_FOUND_BEGIN.$item[GeneralConstant::ID].RequestMessage::NOT_FOUND_END);
                        if($roomPeopleQuantity>$roomInputPeopleQuantity)
                            throw new HttpException(RequestCode::CONFLICT, RequestMessage::ITEM_PEOPLE_QUANTITY_SURPASSED.$roomInputPeopleQuantity);
                    }
            }
        else
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::ITEM_MEASURE_NOT_FOUND);
        
        return $roomItemMeasures;
    }

    private function validateUnitMeasureRoom($inputUnitMeasureRoom, $roomTotalMeasure){
        // Find UnitMeasureRoom
        $unitMeasureRoom = $this->getEnum($inputUnitMeasureRoom, QUERY::UNIT_MEASURE_ROOM_ENUM);
        if(empty($unitMeasureRoom) && $roomTotalMeasure!=null)
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::PARKING_CONDITION_NOT_FOUND_BEGIN.$inputUnitMeasureRoom.RequestMessage::NOT_FOUND_END);
                 
    }

    private function validateRoomName($idRoomName){
        // Find RoomName
        $roomType = RoomNamesCatalogue::where(ColumnName::ID, $idRoomName)->first();  
        if(empty($roomType))
           throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::ROOM_NAME_NOT_FOUND_BEGIN.$idRoomName.RequestMessage::NOT_FOUND_END);    
   }
}
