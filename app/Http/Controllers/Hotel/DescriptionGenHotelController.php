<?php

namespace BukApi\Http\Controllers\Hotel;

use BukApi\Models\Hotel\DescriptionGenHotel;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ValidationRule;
use BukApi\Constants\RequestCode;
use BukApi\Constants\ColumnName;
use BukApi\Models\Commons\InternetConnectTypeCatalogue;
use BukApi\Constants\RequestMessage;
use BukApi\Models\Commons\InternetPlaceCatalogue;
use BukApi\Models\Hotel\HotelService;
use BukApi\Constants\GeneralConstant;
use BukApi\Constants\Query;
use BukApi\Traits\Enum;
use BukApi\Models\Commons\FacilityCatalogue;
use BukApi\Models\Commons\LangCatalogue;
use BukApi\Models\Commons\BreakfastCatalogue;
use Symfony\Component\HttpKernel\Exception\HttpException;
use BukApi\Http\Resources\Hotel\DescriptionGenHotelResource;


class DescriptionGenHotelController extends ApiController
{
    use Enum;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DescriptionGenHotelResource::collection(DescriptionGenHotel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ValidationRule::DESCRIPTION_GEN_HOTEL_RULES;

        $this->validate($request, $rules);

        $input[ColumnName::HOTEL_SERVICE_ID] = $request->hotelServiceId;
        
        $input[ColumnName::HAS_INTERNET] = (Integer) $request->internet[GeneralConstant::HAS_INTERNET];
        $input[ColumnName::INTERNET_CONNECT_TYPE_CATALOGUE_ID] = (Integer)$request->internet[GeneralConstant::HAS_INTERNET] !=GeneralConstant::CERO? $request->internet[GeneralConstant::INTERNET_CONNECT_TYPE]:null;
        $input[ColumnName::INTERNET_PLACE_CATALOGUE_ID] = (Integer) $request->internet[GeneralConstant::HAS_INTERNET]==GeneralConstant::ONE?$request->internet[GeneralConstant::INTERNET_PLACE]:null;
        $input[ColumnName::INTERNET_PRICE] = (Integer)$request->internet[GeneralConstant::HAS_INTERNET] ==GeneralConstant::TWO? $request->internet[GeneralConstant::INTERNET_PRICE]:GeneralConstant::CERO;
        
        $input[ColumnName::HAS_PARKING] = (Integer)$request->parking[GeneralConstant::HAS_PARKING];
        $input[ColumnName::PARKING_CONDITION] = (Integer) $request->parking[GeneralConstant::HAS_PARKING] !=GeneralConstant::CERO? $request->parking[GeneralConstant::PARKING_CONDITION]:null;
        $input[ColumnName::PARKING_ACCESS] = (Integer) $request->parking[GeneralConstant::HAS_PARKING] !=GeneralConstant::CERO? $request->parking[GeneralConstant::PARKING_ACCESS]:null;
        $input[ColumnName::PARKING_LOCATION] = (Integer) $request->parking[GeneralConstant::HAS_PARKING] !=GeneralConstant::CERO? $request->parking[GeneralConstant::PARKING_LOCATION] :null;
        $input[ColumnName::PARKING_PRICE] =  (Integer) $request->parking[GeneralConstant::HAS_PARKING] ==GeneralConstant::TWO? $request->parking[GeneralConstant::PARKING_PRICE]:GeneralConstant::CERO;
        
        $input[ColumnName::HAS_BREAKFAST] = (Integer) $request->breakfasts[GeneralConstant::HAS_BREAKFAST] ;
        $input[ColumnName::DESCRIPTIONGEN_HOTEL_BREAKFAST_CATALOGUE] = $request->breakfasts[GeneralConstant::BREAKFAST_LIST];

        $input[ColumnName::DESCRIPTIONGEN_HOTEL_FACILITY_CATALOGUE] = $request->facilities;
        $input[ColumnName::DESCRIPTIONGEN_HOTEL_LANG_CATALOGUE] = $request->langs;

        $this->validateHotelService($input[ColumnName::HOTEL_SERVICE_ID]);
        
        /**
         * VALIDATING HOTEL'S INTERNET
         * 
         * $input[ColumnName::HAS_INTERNET]: 
         * 0 => No Hay Internet
         * 1 => Si, Gratis
         * 2 => Si, es pago
         * 
         * has_Internet
         * 0 => No Hay
         * 1 => Si Hay
         * 
         * Pay_Internet
         * 0 => Gratis
         * 1 => Pago
         */
        $input[ColumnName::PAY_INTERNET]=null;
        if($input[ColumnName::HAS_INTERNET]!=GeneralConstant::CERO)
            {
                $input[ColumnName::PAY_INTERNET] = $input[ColumnName::HAS_INTERNET]==GeneralConstant::ONE?false:true;
                $input[ColumnName::HAS_INTERNET]=true;
            }
        
        $this->validateInternetConnectType($input[ColumnName::HAS_INTERNET],$input[ColumnName::INTERNET_CONNECT_TYPE_CATALOGUE_ID]);
        $this->validateInternetPlaces($input[ColumnName::INTERNET_PLACE_CATALOGUE_ID], $input[ColumnName::PAY_INTERNET], $input[ColumnName::HAS_INTERNET]);

        
        /**
         * VALIDATING HOTEL'S PARKING
         * 
         * $input[ColumnName::HAS_PARKING]: 
         * 0 => No Hay Parking
         * 1 => Si, Gratis
         * 2 => Si, es pago
         * 
         * has_Parking
         * 0 => No Hay
         * 1 => Si Hay
         * 
         * Pay_Parking
         * 0 => Gratis
         * 1 => Pago
         */
        if($input[ColumnName::HAS_PARKING]!=GeneralConstant::CERO)
            {
                $input[ColumnName::PAY_PARKING] = $input[ColumnName::HAS_PARKING]==GeneralConstant::ONE?false:true;
                $input[ColumnName::HAS_PARKING]=true;
            }
        
        $this->validateParkingCondition($input[ColumnName::PARKING_CONDITION], $input[ColumnName::HAS_PARKING]);
        $this->validateParkingAccess($input[ColumnName::PARKING_ACCESS],$input[ColumnName::HAS_PARKING]);
        $this->validateParkingLocation($input[ColumnName::PARKING_LOCATION],$input[ColumnName::HAS_PARKING]);
        
        /**
         * VALIDATING HOTEL'S BREAKFAST
         * 
         * $input[ColumnName::HAS_BREAKFAST]: 
         * 0 => No Hay Breakfast
         * 1 => Si, incluido en el pago
         * 2 => Si, es opcional
         * 
         * has_Breakfast
         * 0 => No Hay
         * 1 => Si Hay
         * 
         * Pay_Breakfast
         * 0 => Gratis
         * 1 => Pago
         */
        if($input[ColumnName::HAS_BREAKFAST]!=GeneralConstant::CERO)
            {
                $input[ColumnName::PAY_BREAKFAST] = $input[ColumnName::HAS_BREAKFAST]==GeneralConstant::ONE?false:true;
                //$input[ColumnName::HAS_BREAKFAST]=GeneralConstant::ONE;
                $input[ColumnName::HAS_BREAKFAST]=true;

                $hotelBreakfast=$this->validateBreakfast($input[ColumnName::HAS_BREAKFAST], $input[ColumnName::DESCRIPTIONGEN_HOTEL_BREAKFAST_CATALOGUE], $input[ColumnName::PAY_BREAKFAST], true);
            }

        // Validating Facilities     
        $hotelFacilities=$this->validateFacility($input[ColumnName::DESCRIPTIONGEN_HOTEL_FACILITY_CATALOGUE], true);
        
        // Validating Langs 
        $hotelLangs = $this->validateLangs($input[ColumnName::DESCRIPTIONGEN_HOTEL_LANG_CATALOGUE], true);
        
        $descriptionGenHotel = DescriptionGenHotel::create($input);
        if(!empty($hotelFacilities))
            $descriptionGenHotel->facilityCatalogue()->attach($hotelFacilities);
        if(!empty($hotelLangs))
            $descriptionGenHotel->langCatalogue()->attach($hotelLangs);
        if(!empty($hotelBreakfast))
            $descriptionGenHotel->breakfastCatalogue()->attach($hotelBreakfast);

        return $this->showOne($descriptionGenHotel, RequestCode::CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Hotel\DescriptionGenHotel  $descriptionGenHotel
     * @return \Illuminate\Http\Response
     */
    public function show(DescriptionGenHotel $descriptionGenHotel)
    {
        return new DescriptionGenHotelResource($descriptionGenHotel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BukApi\Models\Hotel\DescriptionGenHotel  $descriptionGenHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DescriptionGenHotel $descriptionGenHotel)
    {
        $rules = ValidationRule::HOTEL_SERVICE_UPDATE_RULES;
        
        $this->validate($request, $rules);

        $this->validateDescriptionGenHotel($request->hotelServiceId, $descriptionGenHotel->id);
        
        if($request->has(GeneralConstant::INTERNET))
            if(array_key_exists(GeneralConstant::HAS_INTERNET, $request->internet) ){
                if($request->internet[GeneralConstant::HAS_INTERNET]==GeneralConstant::CERO){
                    $descriptionGenHotel->has_internet=false;
                    $descriptionGenHotel->internet_connect_type_catalogue_id=null;
                    $descriptionGenHotel->pay_internet=false;
                    $descriptionGenHotel->internet_place_catalogue_id=null;
                    $descriptionGenHotel->internet_price=GeneralConstant::CERO;
                }else if($request->internet[GeneralConstant::HAS_INTERNET]==GeneralConstant::ONE){
                    $descriptionGenHotel->has_internet=true;
                    $descriptionGenHotel->pay_internet=false;
                    $descriptionGenHotel->internet_price=GeneralConstant::CERO;
                    
                    if(array_key_exists(GeneralConstant::INTERNET_CONNECT_TYPE, $request->internet)){
                        $this->validateInternetConnectType($descriptionGenHotel->has_internet,$request->internet[GeneralConstant::INTERNET_CONNECT_TYPE]);
                        $descriptionGenHotel->internet_connect_type_catalogue_id = $request->internet[GeneralConstant::INTERNET_CONNECT_TYPE];
                    }else if($descriptionGenHotel->internet_connect_type_catalogue_id==null) 
                        return $this->errorResponse(RequestMessage::INTERNET_CONNECT_TYPE_REQUIRED, RequestCode::VALIDATION_EXCEPTION);
                    
                    if( array_key_exists(GeneralConstant::INTERNET_PLACE, $request->internet)){
                        $this->validateInternetPlaces($request->internet[GeneralConstant::INTERNET_PLACE], $descriptionGenHotel->pay_internet, $descriptionGenHotel->has_internet);
                        $descriptionGenHotel->internet_place_catalogue_id=$request->internet[GeneralConstant::INTERNET_PLACE];
                    }else if($descriptionGenHotel->internet_place_catalogue_id==null) 
                        return $this->errorResponse(RequestMessage::INTERNET_PLACES_REQUIRED, RequestCode::VALIDATION_EXCEPTION);
                
                }else if($request->internet[GeneralConstant::HAS_INTERNET]==GeneralConstant::TWO){
                    $descriptionGenHotel->has_internet=true;
                    $descriptionGenHotel->pay_internet=true;
                    $descriptionGenHotel->internet_place_catalogue_id=null;
                    
                    if(array_key_exists(GeneralConstant::INTERNET_CONNECT_TYPE, $request->internet)){
                        $this->validateInternetConnectType($descriptionGenHotel->has_internet,$request->internet[GeneralConstant::INTERNET_CONNECT_TYPE]);
                        $descriptionGenHotel->internet_connect_type_catalogue_id = $request->internet[GeneralConstant::INTERNET_CONNECT_TYPE];
                    }else if($descriptionGenHotel->internet_connect_type_catalogue_id==null) 
                        return $this->errorResponse(RequestMessage::INTERNET_CONNECT_TYPE_REQUIRED, RequestCode::VALIDATION_EXCEPTION);
                    
                    if(array_key_exists(GeneralConstant::INTERNET_PRICE, $request->internet)){
                        $descriptionGenHotel->internet_price = $request->internet[GeneralConstant::INTERNET_PRICE];
                    }else if($descriptionGenHotel->internet_price==null) 
                        return $this->errorResponse(RequestMessage::INTERNET_PRICE_REQUIRED, RequestCode::VALIDATION_EXCEPTION);
                }    
            }else{
                if(array_key_exists(GeneralConstant::INTERNET_CONNECT_TYPE, $request->internet) && $descriptionGenHotel->has_internet){
                    $this->validateInternetConnectType($descriptionGenHotel->has_internet,$request->internet[GeneralConstant::INTERNET_CONNECT_TYPE]);
                    $descriptionGenHotel->internet_connect_type_catalogue_id = $request->internet[GeneralConstant::INTERNET_CONNECT_TYPE];
                }

                if(array_key_exists(GeneralConstant::INTERNET_PLACE, $request->internet) && !$descriptionGenHotel->pay_internet){
                    $this->validateInternetConnectType($descriptionGenHotel->has_internet,$request->internet[GeneralConstant::INTERNET_CONNECT_TYPE]);
                    $descriptionGenHotel->internet_connect_type_catalogue_id = $request->internet[GeneralConstant::INTERNET_CONNECT_TYPE];
                }

                if(array_key_exists(GeneralConstant::INTERNET_PRICE, $request->internet) && $descriptionGenHotel->pay_internet)
                    $descriptionGenHotel->internet_price = $request->internet[GeneralConstant::INTERNET_PRICE];
            }
        
        if($request->has(GeneralConstant::PARKING))
            if(array_key_exists(GeneralConstant::HAS_PARKING, $request->parking) ){
                if($request->parking[GeneralConstant::HAS_PARKING]==GeneralConstant::CERO){
                    $descriptionGenHotel->has_parking=false;
                    $descriptionGenHotel->parking_condition=null;
                    $descriptionGenHotel->pay_parking=false;
                    $descriptionGenHotel->parking_access=null;
                    $descriptionGenHotel->parking_location=null;
                    $descriptionGenHotel->parking_price=GeneralConstant::CERO;
                }else{
                    
                    if($request->parking[GeneralConstant::HAS_PARKING]==GeneralConstant::ONE){
                        $descriptionGenHotel->has_parking=true;
                        $descriptionGenHotel->pay_parking=false;
                        $descriptionGenHotel->parking_price=GeneralConstant::CERO;
                    }
                    else{
                        $descriptionGenHotel->pay_parking=true;
                        $descriptionGenHotel->has_parking=true;
                        if(array_key_exists(GeneralConstant::PARKING_PRICE, $request->parking)){
                            $descriptionGenHotel->parking_price = $request->parking[GeneralConstant::PARKING_PRICE];
                        }else if($descriptionGenHotel->parking_price==null) 
                            return $this->errorResponse(RequestMessage::PARKING_PRICE_REQUIRED, RequestCode::VALIDATION_EXCEPTION);
                    }
                    
                    if(array_key_exists(GeneralConstant::PARKING_CONDITION, $request->parking)){
                        $this->validateParkingCondition($request->parking[GeneralConstant::PARKING_CONDITION], $descriptionGenHotel->has_parking);
                        $descriptionGenHotel->parking_condition = $request->parking[GeneralConstant::PARKING_CONDITION];
                    }else if($descriptionGenHotel->parking_condition==null) 
                        return $this->errorResponse(RequestMessage::PARKING_CONDITION_REQUIRED, RequestCode::VALIDATION_EXCEPTION);
                    
                    if( array_key_exists(GeneralConstant::PARKING_ACCESS, $request->parking)){
                        $this->validateParkingAccess($request->parking[GeneralConstant::PARKING_ACCESS], $descriptionGenHotel->has_parking);
                        $descriptionGenHotel->parking_access=$request->parking[GeneralConstant::PARKING_ACCESS];
                    }else if($descriptionGenHotel->parking_access==null) 
                        return $this->errorResponse(RequestMessage::PARKING_ACCESS_REQUIRED, RequestCode::VALIDATION_EXCEPTION);
                    
                    if( array_key_exists(GeneralConstant::PARKING_LOCATION, $request->parking)){
                        $this->validateParkingLocation($request->parking[GeneralConstant::PARKING_LOCATION], $descriptionGenHotel->has_parking);
                        $descriptionGenHotel->parking_location=$request->parking[GeneralConstant::PARKING_LOCATION];
                    }else if($descriptionGenHotel->parking_location==null) 
                        return $this->errorResponse(RequestMessage::PARKING_LOCATION_REQUIRED, RequestCode::VALIDATION_EXCEPTION);
                }
            }else{
                
                if(array_key_exists(GeneralConstant::PARKING_PRICE, $request->parking) && $descriptionGenHotel->pay_parking)
                    $descriptionGenHotel->parking_price = $request->parking[GeneralConstant::PARKING_PRICE];

                if(array_key_exists(GeneralConstant::PARKING_CONDITION, $request->parking) && $descriptionGenHotel->has_parking){
                    $this->validateParkingCondition($request->parking[GeneralConstant::PARKING_CONDITION], $descriptionGenHotel->has_parking);
                    $descriptionGenHotel->parking_condition = $request->parking[GeneralConstant::PARKING_CONDITION];
                }
                
                if( array_key_exists(GeneralConstant::PARKING_ACCESS, $request->parking) && $descriptionGenHotel->has_parking){
                    $this->validateParkingAccess($request->parking[GeneralConstant::PARKING_ACCESS], $descriptionGenHotel->has_parking);
                    $descriptionGenHotel->parking_access=$request->parking[GeneralConstant::PARKING_ACCESS];
                }
                
                if( array_key_exists(GeneralConstant::PARKING_LOCATION, $request->parking) && $descriptionGenHotel->has_parking){
                    $this->validateParkingLocation($request->parking[GeneralConstant::PARKING_LOCATION], $descriptionGenHotel->has_parking);
                    $descriptionGenHotel->parking_location=$request->parking[GeneralConstant::PARKING_LOCATION];
                }
            }
        
        // Validating Facilities
        $updateFacilities = false;
        if ($request->has(GeneralConstant::FACILITIES)){
            $hotelFacilities=$this->validateFacility($request->facilities, false);   
            if(!empty($hotelFacilities)){
                $result = $descriptionGenHotel->facilityCatalogue()->sync($hotelFacilities);
                if(!empty($result[GeneralConstant::ATTACHED]) || !empty($result[GeneralConstant::DETACHED]) || !empty($result[GeneralConstant::UPDATED]))
                    $updateFacilities = true;
            }
        }

        // Validating Langs 
        $updateLangs = false;
        if ($request->has(GeneralConstant::LANGS)){
            $hotelLangs=$this->validateLangs($request->langs, false);   
            if(!empty($hotelLangs)){
                $result = $descriptionGenHotel->langCatalogue()->sync($hotelLangs);
                if(!empty($result[GeneralConstant::ATTACHED]) || !empty($result[GeneralConstant::DETACHED]) || !empty($result[GeneralConstant::UPDATED]))
                    $updateLangs = true;
            }
        }

        // Validating Breakfast 
        $updateBreakfast = false;
        if($request->has(GeneralConstant::BREAKFAST)){
            if(array_key_exists(GeneralConstant::HAS_BREAKFAST, $request->breakfasts) ){
                if($request->parking[GeneralConstant::HAS_BREAKFAST]==GeneralConstant::CERO){
                    $descriptionGenHotel->has_breakfast=false;
                    $descriptionGenHotel->pay_breakfast=null;
                    $descriptionGenHotel->breakfastCatalogue()->detach();
                }else{
                    $descriptionGenHotel->has_breakfast=true;
                    
                    if($request->parking[GeneralConstant::HAS_BREAKFAST]==GeneralConstant::ONE)
                        $descriptionGenHotel->pay_breakfast=false;
                    else
                        $descriptionGenHotel->pay_breakfast=true;

                    if(array_key_exists(GeneralConstant::BREAKFAST_LIST, $request->breakfasts)){
                        $hotelBreakfast=$this->validateBreakfast($descriptionGenHotel->has_breakfast, $request->breakfasts[GeneralConstant::BREAKFAST_LIST], $descriptionGenHotel->pay_breakfast, false);
                        if(!empty($hotelBreakfast)){
                            $descriptionGenHotel->breakfastCatalogue()->sync($hotelBreakfast);
                        }
                    }else if(empty($descriptionGenHotel->breakfastCatalogue)) 
                        return $this->errorResponse(RequestMessage::BREAKFAST_LIST_REQUIRED, RequestCode::VALIDATION_EXCEPTION);
                    
                }
            }else{
                if(array_key_exists(GeneralConstant::BREAKFAST_LIST, $request->breakfasts)){
                    $hotelBreakfast=$this->validateBreakfast($descriptionGenHotel->has_breakfast, $request->breakfasts[GeneralConstant::BREAKFAST_LIST], $descriptionGenHotel->pay_breakfast, false);
                    if(!empty($hotelBreakfast)){
                        $result = $descriptionGenHotel->breakfastCatalogue()->sync($hotelBreakfast);
                        if(!empty($result[GeneralConstant::ATTACHED]) || !empty($result[GeneralConstant::DETACHED]) || !empty($result[GeneralConstant::UPDATED]))
                            $updateBreakfast = true;
                    }
                }
            }
        }
        if (!$descriptionGenHotel->isDirty() && !$updateFacilities && !$updateLangs && !$updateBreakfast ) {
            return $this->errorResponse(RequestMessage::UPDATING, RequestCode::VALIDATION_EXCEPTION);
        }

        $descriptionGenHotel->save();

        return $this->showOne($descriptionGenHotel);        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BukApi\Models\Hotel\DescriptionGenHotel  $descriptionGenHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DescriptionGenHotel $descriptionGenHotel)
    {
        //
    }

    private function validateHotelService($idHotelService){
        // Find HotelService
        $hotelService = HotelService::where(ColumnName::ID, $idHotelService)->first();  
        if(empty($hotelService))
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::HOTEL_SERVICE_NOT_FOUND_BEGIN.$idHotelService.RequestMessage::NOT_FOUND_END);
    }

    private function validateDescriptionGenHotel($idHotelService, $idDescriptionGenHotel){
        // Find DescriptionGen
        $descriptionGenHotel = DescriptionGenHotel::where(ColumnName::ID, $idDescriptionGenHotel)->where(ColumnName::HOTEL_SERVICE_ID, $idHotelService)->first();  
        if(empty($descriptionGenHotel))
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::HOTEL_SERVICE_NOT_FOUND_BEGIN.$idHotelService.RequestMessage::NOT_FOUND_END);
    }

    private function validateInternetConnectType($hasInternet, $inputInternetConnectType){
        // Find InternetConnectType
        $internetConnectType = InternetConnectTypeCatalogue::where(ColumnName::ID, $inputInternetConnectType)->first();  
        if(empty($internetConnectType) && $hasInternet)
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::INTERNET_CONNECT_TYPE_NOT_FOUND_BEGIN.$inputInternetConnectType.RequestMessage::NOT_FOUND_END);
    }

    private function validateInternetPlaces($inputInternetPlace, $payInternet, $hasInternet){
        // Find InternetPlaces
        $internetPlaces = InternetPlaceCatalogue::where(ColumnName::ID, $inputInternetPlace)->first();  
        if(empty($internetPlaces) && !$payInternet && $hasInternet)
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::INTERNET_PLACES_NOT_FOUND_BEGIN.$inputInternetPlace.RequestMessage::NOT_FOUND_END);
            
    }

    private function validateParkingCondition($inputParkingCondition, $hasParking){
        // Find ParkingCondition
        $parkingCondition = $this->getEnum($inputParkingCondition, QUERY::PARKING_CONDITION_ENUM);
        if(empty($parkingCondition) && $hasParking)
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::PARKING_CONDITION_NOT_FOUND_BEGIN.$inputParkingCondition.RequestMessage::NOT_FOUND_END);
                 
    }

    private function validateParkingAccess($inputParkingAccess, $hasParking){
        // Find ParkingAccess
        $parkingAccess = $this->getEnum($inputParkingAccess, QUERY::PARKING_ACCESS_ENUM);
        if(empty($parkingAccess) && $hasParking)
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::PARKING_ACCESS_NOT_FOUND_BEGIN.$inputParkingAccess.RequestMessage::NOT_FOUND_END);
    }

    private function validateParkingLocation($inputParkingLocation, $hasParking){
        // Find ParkingLocation
        $parkingLocation = $this->getEnum($inputParkingLocation, QUERY::PARKING_LOCATION_ENUM);
        if(empty($parkingLocation) && $hasParking)
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::PARKING_LOCATION_NOT_FOUND_BEGIN.$inputParkingLocation.RequestMessage::NOT_FOUND_END);
    }

    private function validateBreakfast($hasBreakfast, $inputBreakfastList, $payBreakfast, $store){
        
        if($hasBreakfast){
            $breakfasts = BreakfastCatalogue::all()->pluck(ColumnName::ID);
            $breakfasts=$breakfasts->toArray();
            if (isset($inputBreakfastList) && is_array($inputBreakfastList) && !empty($inputBreakfastList) && !empty($breakfasts)){
                $hotelBreakfast=[];
                foreach ($inputBreakfastList as $item)
                    {
                        if (is_numeric($item[GeneralConstant::ID]) && in_array($item[GeneralConstant::ID],$breakfasts)){
                            
                            $key = array_search($item[GeneralConstant::ID], array_column($hotelBreakfast, ColumnName::BREAKFAST_CATALOGUE_ID));
                            
                            if($key===false)
                                if($payBreakfast)
                                    {
                                        if(is_numeric($item[GeneralConstant::PRICE]) && preg_match(ValidationRule::PRICE, $item[GeneralConstant::PRICE]))
                                            if($store)
                                                array_push($hotelBreakfast, [ColumnName::BREAKFAST_CATALOGUE_ID => $item[GeneralConstant::ID], ColumnName::BREAKFAST_PRICE => $item[GeneralConstant::PRICE]]); 
                                            else
                                                $hotelBreakfast[$item[GeneralConstant::ID]] = [ColumnName::BREAKFAST_PRICE => $item[GeneralConstant::PRICE]];
                                        else 
                                            throw new HttpException(RequestCode::VALIDATION_EXCEPTION, RequestMessage::BREAKFAST_PRICE_INVALID.$item[GeneralConstant::PRICE]);
                                    }
                                else
                                    if($store)
                                        array_push($hotelBreakfast, [ColumnName::BREAKFAST_CATALOGUE_ID => $item[GeneralConstant::ID]]); 
                                    else
                                        $hotelBreakfast[$item[GeneralConstant::ID]] = [ColumnName::BREAKFAST_PRICE => GeneralConstant::CERO]; 
                            else
                                throw new HttpException(RequestCode::CONFLICT, RequestMessage::DUPLICATED_BREAKFAST_BEGIN.$item[GeneralConstant::ID].RequestMessage::DUPLICATED_END);

                        }else if(!is_numeric($item[GeneralConstant::ID]) || !in_array($item[GeneralConstant::ID],$breakfasts))
                            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::BREAKFAST_NOT_FOUND_BEGIN.$item[GeneralConstant::ID].RequestMessage::NOT_FOUND_END);

                    } 
            }

            return $hotelBreakfast;
        }
    }

    private function validateFacility($inputFacilityList, $store){
        $facilities = FacilityCatalogue::all()->pluck(ColumnName::ID);
        $facilities=$facilities->toArray();
        if (isset($inputFacilityList) && is_array($inputFacilityList) && !empty($inputFacilityList) && !empty($facilities)){
            $hotelFacilities=[];
            
            foreach ($inputFacilityList as $item)
                {
                    if (is_numeric($item) && in_array($item,$facilities)){
                        if(!in_array([ColumnName::FACILITY_CATALOGUE_ID => $item],$hotelFacilities))
                            if($store)
                                array_push($hotelFacilities, [ColumnName::FACILITY_CATALOGUE_ID => $item]);
                            else
                                array_push($hotelFacilities, $item);
                        else
                            throw new HttpException(RequestCode::CONFLICT, RequestMessage::DUPLICATED_FACILITY_BEGIN.$item.RequestMessage::DUPLICATED_END);
                    }else
                        throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::FACILITY_NOT_FOUND_BEGIN.$item.RequestMessage::NOT_FOUND_END);
                }
            return $hotelFacilities;
        }
    }

    private function validateLangs($inputLangList, $store){
        $langs = LangCatalogue::all()->pluck(ColumnName::ID);
        $langs=$langs->toArray();
        if (isset($inputLangList) && is_array($inputLangList) && !empty($inputLangList) && !empty($langs)){
            $hotelLangs=[];
            
            foreach ($inputLangList as $item)
                {
                    if (is_numeric($item) && in_array($item,$langs)){
                        if(!in_array([ColumnName::LANG_CATALOGUE_ID => $item],$hotelLangs))
                            if($store)
                                array_push($hotelLangs, [ColumnName::LANG_CATALOGUE_ID => $item]); 
                            else
                                array_push($hotelLangs, $item); 
                        else
                        throw new HttpException(RequestCode::CONFLICT, RequestMessage::DUPLICATED_LANG_BEGIN.$item.RequestMessage::DUPLICATED_END);
                        
                    }else
                        throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::LANG_NOT_FOUND_BEGIN.$item.RequestMessage::NOT_FOUND_END);
                }
            return $hotelLangs;
        }else{
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::LANGS_NOT_FOUND);
        }

    }

}
