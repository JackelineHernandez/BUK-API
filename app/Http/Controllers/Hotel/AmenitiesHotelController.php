<?php

namespace BukApi\Http\Controllers\Hotel;

use BukApi\Models\Hotel\AmenitiesHotel;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ValidationRule;
use BukApi\Constants\ColumnName;
use BukApi\Constants\GeneralConstant;
use BukApi\Constants\RequestCode;
use BukApi\Models\Hotel\HotelService;
use Symfony\Component\HttpKernel\Exception\HttpException;
use BukApi\Constants\RequestMessage;
use BukApi\Constants\Query;
use BukApi\Traits\Enum;
use BukApi\Models\Hotel\AmenityExtraBed;
use BukApi\Models\Hotel\Catalogues\AmenitiesCatalogue;
use BukApi\Http\Resources\Hotel\AmenitiesHotelResource;

class AmenitiesHotelController extends ApiController
{
    use Enum;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AmenitiesHotelResource::collection(AmenitiesHotel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ValidationRule::AMENITIES_HOTEL;
        
        $this->validate($request, $rules);

        $input[ColumnName::HOTEL_SERVICE_ID] = $request->hotelServiceId;
        $input[ColumnName::HAS_EXTRA_BED] = $request->extraBeds[GeneralConstant::HAS_EXTRA_BED] === GeneralConstant::BOOLEAN_TRUE;
        
        $this->validateHotelService($input[ColumnName::HOTEL_SERVICE_ID]);

        if($input[ColumnName::HAS_EXTRA_BED]){
            $extraBeds=$this->validateExtraBeds($request->extraBeds);
        }
        
        $amenitiesList = $this->validateAmenities($request->amenities);

        $amenitiesHotel = AmenitiesHotel::create($input);
        
        if(!empty($extraBeds))
            $amenitiesHotel->amenityExtraBed()->save($extraBeds);

        if(!empty($amenitiesList))
            $amenitiesHotel->amenitiesCatalogue()->attach($amenitiesList);

        $amenitiesHotel = AmenitiesHotel::find($amenitiesHotel->id);
        return $this->showOne($amenitiesHotel, RequestCode::CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Hotel\AmenitiesHotel  $amenitiesHotel
     * @return \Illuminate\Http\Response
     */
    public function show(AmenitiesHotel $amenitiesHotel)
    {
        return new AmenitiesHotelResource($amenitiesHotel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BukApi\Models\Hotel\AmenitiesHotel  $amenitiesHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AmenitiesHotel $amenitiesHotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BukApi\Models\Hotel\AmenitiesHotel  $amenitiesHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AmenitiesHotel $amenitiesHotel)
    {
        //
    }

    private function validateHotelService($idHotelService){
        // Find HotelService
        $hotelService = HotelService::where(ColumnName::ID, $idHotelService)->first();  
        if(empty($hotelService))
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::HOTEL_SERVICE_NOT_FOUND_BEGIN.$idHotelService.RequestMessage::NOT_FOUND_END);
    }

    private function validateExtraBeds($inputExtraBeds){
        //Validate Extra Beds
        $extraBedsAmenity = new AmenityExtraBed();
                
        if (isset($inputExtraBeds) && 
            is_array($inputExtraBeds) && 
            !empty($inputExtraBeds)){
                
                if(!preg_match(ValidationRule::QUANTITY, $inputExtraBeds[GeneralConstant::BEDS_QUANTITY]))
                    throw new HttpException(RequestCode::VALIDATION_EXCEPTION, RequestMessage::BEDS_QUUANTITY_INVALID);
                else
                    $extraBedsAmenity->extra_beds_quantity=$inputExtraBeds[GeneralConstant::BEDS_QUANTITY];;
                
                $extraBedsAmenity->have_children_in_cribs=$inputExtraBeds[GeneralConstant::HAVE_CHILDREN_IN_CRIBS] === GeneralConstant::BOOLEAN_TRUE;
                
                $extraBedsAmenity->child_cribs_price=$inputExtraBeds[GeneralConstant::HAVE_CHILDREN_IN_CRIBS]===
                                                        GeneralConstant::BOOLEAN_TRUE?
                                                            $inputExtraBeds[GeneralConstant::CHILD_CRIBS_PRICE]:
                                                            GeneralConstant::CERO;

                $extraBedsAmenity->have_children = $inputExtraBeds[GeneralConstant::HAVE_CHILDREN] === GeneralConstant::BOOLEAN_TRUE;
                
                if(!$extraBedsAmenity->have_children)
                    {
                        $extraBedsAmenity->children_ages = null;
                        $extraBedsAmenity->children_price = GeneralConstant::CERO;
                    }
                else{
                        $this->validateChildrenAges($inputExtraBeds[GeneralConstant::CHILDREN_AGES]);
                        $extraBedsAmenity->children_ages=$inputExtraBeds[GeneralConstant::CHILDREN_AGES];
                        $extraBedsAmenity->children_price = $inputExtraBeds[GeneralConstant::CHILDREN_PRICE];
                    }
                
                $extraBedsAmenity->have_adults = $inputExtraBeds[GeneralConstant::HAVE_ADULTS] === GeneralConstant::BOOLEAN_TRUE; 
                $extraBedsAmenity->adult_price = $inputExtraBeds[GeneralConstant::HAVE_ADULTS]===
                                                    GeneralConstant::BOOLEAN_TRUE?
                                                        $inputExtraBeds[GeneralConstant::ADULT_PRICE]:
                                                        GeneralConstant::CERO; 
            }
        else
            throw new HttpException(RequestCode::VALIDATION_EXCEPTION, RequestMessage::EXTRA_BEDS_REQUIRED);
        
        return $extraBedsAmenity;
    }

    private function validateChildrenAges($inputChildrenAges){
        // Find ChildrenAges
        $childrenAges = $this->getEnum($inputChildrenAges, QUERY::CHILDREN_AGES_ENUM);
        if(empty($childrenAges))
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::CHILDREN_AGES_NOT_FOUND_BEGIN.$inputChildrenAges.RequestMessage::NOT_FOUND_END);
                 
    }

    private function validateAmenities($amenitiesList){
        $amenitiesBd = AmenitiesCatalogue::all()->pluck(ColumnName::ID);
        $amenitiesBd=$amenitiesBd->toArray();
        
        $amenities=[];
            
        if (isset($amenitiesList) && is_array($amenitiesList) && !empty($amenitiesList) && 
        !empty($amenitiesBd)){
            
            foreach ($amenitiesList as $item)
                {
                    if (is_numeric($item) && in_array($item,$amenitiesBd))
                        {
                            $key = array_search($item, array_column($amenities, ColumnName::AMENITIES_CATALOGUE_ID));
                            
                            if($key===false)
                                array_push($amenities, [ColumnName::AMENITIES_CATALOGUE_ID => $item]); 
                            else
                                throw new HttpException(RequestCode::CONFLICT, RequestMessage::DUPLICATED_AMENITIES_BEGIN.$item.RequestMessage::DUPLICATED_END);
                        }
                    else
                        throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::AMENITY_NOT_FOUND_BEGIN.$item.RequestMessage::NOT_FOUND_END);
                }
        }
        
        return $amenities;
    }
}
