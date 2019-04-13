<?php

namespace BukApi\Http\Controllers\Hotel;

use BukApi\Models\Hotel\HotelService;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Http\Resources\Hotel\DescriptionGenHotelResource;
use BukApi\Http\Resources\Hotel\RoomPriceLayoutResource;
use BukApi\Http\Resources\Hotel\HotelServiceResource;
use BukApi\Constants\GeneralConstant;
use BukApi\Constants\ColumnName;
use BukApi\Http\Resources\Hotel\AmenitiesHotelResource;
use BukApi\Http\Resources\Hotel\PhotoHotelResource;
use BukApi\Http\Resources\Hotel\PoliticConditionsResource;

class HotelCompleteInfoController extends ApiController
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotelService = HotelService::findOrFail($id);
        $hotelService->phoneHotels->makeHidden(ColumnName::HOTEL_SERVICE_ID);
        $basicInfo = new HotelServiceResource($hotelService);

        $descriptionGen=null;
        if($hotelService->descriptionGenHotel)
            $descriptionGen = DescriptionGenHotelResource::make($hotelService->descriptionGenHotel)->hide([GeneralConstant::HOTEL_SERVICE_ID]);
        
        $layouts = RoomPriceLayoutResource::collection($hotelService->roomPriceLayout)->hide([GeneralConstant::HOTEL_SERVICE_ID]);
        
        $amenities=null;
        if($hotelService->amenitiesHotel)
            $amenities = AmenitiesHotelResource::make($hotelService->amenitiesHotel);

        $photos =PhotoHotelResource::collection($hotelService->photoHotel)->hide([GeneralConstant::HOTEL_SERVICE_ID]);

        $politicConditions=null;
        if($hotelService->politicConditions)
            $politicConditions = PoliticConditionsResource::make($hotelService->politicConditions)->hide([GeneralConstant::HOTEL_SERVICE_ID]);
        

        $info = [
            GeneralConstant::BASIC_INFO => $basicInfo,
            GeneralConstant::DESCRIPTION_GEN => $descriptionGen,
            GeneralConstant::LAYOUTS  => $layouts,
            GeneralConstant::AMENITIES  => $amenities,
            GeneralConstant::PHOTOS => $photos,
            GeneralConstant::POLITIC_CONDITIONS => $politicConditions
        ];

        return $this->showOneData($info);
    }
}
