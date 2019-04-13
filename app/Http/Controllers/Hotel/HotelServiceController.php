<?php

namespace BukApi\Http\Controllers\Hotel;

use BukApi\Models\Hotel\HotelService;
use BukApi\Models\Hotel\Catalogues\EstablishmentTypeCatalogue;
use BukApi\Models\Hotel\PhoneHotel;
use BukApi\Models\Commons\CustomerTypeCatalogue;
use BukApi\Models\Commons\CategoryCatalogue;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;
use BukApi\Constants\ValidationRule;
use BukApi\Constants\ColumnName;
use BukApi\Constants\GeneralConstant;
use Symfony\Component\HttpKernel\Exception\HttpException;
use BukApi\Models\Hotel\HotelServiceRating;
use Illuminate\Support\Collection;
use BukApi\Http\Resources\Hotel\HotelServiceResource;
use JD\Cloudder\Facades\Cloudder;

class HotelServiceController extends ApiController
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotelServices = HotelService::orderBy(ColumnName::ESTABLISHMENT_NAME, GeneralConstant::ORDER_BY_ASC)->get();;
        
        return HotelServiceResource::collection($hotelServices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ValidationRule::HOTEL_SERVICE_RULES;
        
        $this->validate($request, $rules);

        $input[ColumnName::ESTABLISHMENT_NAME] = $request->establishmentName;
        $input[ColumnName::CATEGORY_CATALOGUE_ID] = HotelService::CATEGORY_CATALOGUE_ID;
        $input[ColumnName::ESTABLISHMENT_TYPE_CATALOGUE_ID] = $request->stablishmentType;
        $input[ColumnName::CITY] = $request->city;
        $input[ColumnName::STATE] = $request->state;
        $input[ColumnName::COUNTRY] = $request->country;
        $input[ColumnName::ZIP] = $request->zipCode;
        $input[ColumnName::REFERENCE] = $request->locationReference;
        $input[ColumnName::HOME_ADDRESS] = $request->home_address;
        $input[ColumnName::QUANTITY_ROOMS] = $request->numberOfRooms;
        $input[ColumnName::GEO_COORDINATES] = $request->geo_coordinates;
        $input[ColumnName::CHANNEL_MANAGER] =  $request->haveChannelManager === GeneralConstant::BOOLEAN_TRUE;
        $input[ColumnName::CHANNELMANAGER_DESCRIPT] = $request->haveChannelManager===GeneralConstant::BOOLEAN_TRUE?$request->channelManagerName:null;
        $input[ColumnName::RESPONSIBLE_NAME] = $request->responsible_name;
        $input[ColumnName::EMAIL] = $request->email;
        $input[ColumnName::PHONE_NUMBER] = $request->phone;
        $input[ColumnName::HOTEL_SERVICE_CUSTOMER_TYPE_CATALOGUE] = $request->customerTypes;
        $input[ColumnName::BELONG_HOTEL_CHAIN] =  $request->isCompanyManagement === GeneralConstant::BOOLEAN_TRUE;
        $input[ColumnName::HOTEL_CHAIN_DESCRIPTION] = $request->isCompanyManagement===GeneralConstant::BOOLEAN_TRUE?$request->companyManagementName:null;
        $input[ColumnName::STAR_RATING] = $request->stablishmentType===GeneralConstant::ESTABLISHMENT_TYPE_HOTEL_ID?$request->starRating:null;
        
        $this->validateEstablishmentNameDuplicated($input[ColumnName::ESTABLISHMENT_NAME]);
        
        $this->validateEstablishmentType($input[ColumnName::ESTABLISHMENT_TYPE_CATALOGUE_ID]);
        
        // Validating CustomerTypes  
        $hotelCustomerTypes=$this->validateCustomerType($input[ColumnName::HOTEL_SERVICE_CUSTOMER_TYPE_CATALOGUE], true);   
        
        // Validating Phones
        $phones = $this->validatePhones($input[ColumnName::PHONE_NUMBER]);
                   
        $hotelService = HotelService::create($input);
        
        if(!empty($phones))
            $hotelService->phoneHotels()->createMany($phones);
        if(!empty($hotelCustomerTypes))
            $hotelService->customerTypeCatalogue()->attach($hotelCustomerTypes);
             
        if($input[ColumnName::STAR_RATING]!=null)
            {
                $starRating = new HotelServiceRating([ColumnName::STAR_RATING => $input[ColumnName::STAR_RATING]]);
                $hotelService->ratingHotel()->save($starRating);
            }
        return $this->showOne($hotelService, RequestCode::CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Hotel\HotelService  $hotelService
     * @return \Illuminate\Http\Response
     */
    public function show(HotelService $hotelService)
    {
        return new HotelServiceResource($hotelService);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BukApi\Models\Hotel\HotelService  $hotelService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelService $hotelService)
    {
        $rules = ValidationRule::HOTEL_SERVICE_UPDATE_RULES;
        
        $this->validate($request, $rules);

        if($request->has(GeneralConstant::ESTABLISHMENT_NAME)){
            $hotelService->establishment_name = $request->establishmentName;
            $this->validateEstablishmentNameDuplicated($hotelService->establishment_name);
        }

        if($request->has(GeneralConstant::ESTABLISHMENT_TYPE)){
            $hotelService->establishment_type_catalogue_id = $request->establishmentType;
            $this->validateEstablishmentType($hotelService->establishment_type_catalogue_id);
        }

        $hotelService->city = $request->has(ColumnName::CITY) ? $request->city:$hotelService->city;
        $hotelService->state = $request->has(ColumnName::STATE) ? $request->state:$hotelService->state;
        $hotelService->country = $request->has(ColumnName::COUNTRY) ? $request->country:$hotelService->country;
        $hotelService->zip = $request->has(GeneralConstant::ZIP) ? $request->zipCode:$hotelService->zip;
        $hotelService->reference = $request->has(GeneralConstant::REFERENCE) ? $request->locationReference:$hotelService->reference;
        $hotelService->home_address = $request->has(GeneralConstant::HOME_ADDRESS) ? $request->homeAddress:$hotelService->home_address;
        $hotelService->quantity_rooms = $request->has(GeneralConstant::QUANTITY_ROOMS) ? $request->quantityRooms:$hotelService->quantity_rooms;
        $hotelService->geo_coordinates = $request->has(GeneralConstant::GEO_COORDINATES) ? $request->geoCoordinates:$hotelService->geo_coordinates;
        
        if($request->has(GeneralConstant::CHANNEL_MANAGER)){
            $hotelService->channel_manager = $request->haveChannelManager === GeneralConstant::BOOLEAN_TRUE;
            if($hotelService->channel_manager){
                if($request->has(GeneralConstant::CHANNELMANAGER_DESCRIPT) && !empty($request->channelmanagerDescript) && $request->channelmanagerDescript!=null)
                    $hotelService->channelmanager_descript = $request->channelmanagerDescript;
                else
                    return $this->errorResponse(RequestMessage::CHANNELMANAGER_DESCRIPT_REQUIRED, RequestCode::VALIDATION_EXCEPTION);
            }else
                $hotelService->channelmanager_descript = null;    
        }else if($request->has(GeneralConstant::CHANNELMANAGER_DESCRIPT)){
            if($hotelService->channel_manager)
                $hotelService->channelmanager_descript = $request->channelmanagerDescript;
            else
                return $this->errorResponse(RequestMessage::CHANNEL_MANAGER_FALSE, RequestCode::VALIDATION_EXCEPTION);
        }
        
        $hotelService->responsible_name = $request->has(GeneralConstant::RESPONSIBLE_NAME) ? $request->responsibleName:$hotelService->responsible_name;
        $hotelService->email = $request->has(ColumnName::EMAIL) ? $request->email:$hotelService->email;
        
        if($request->has(GeneralConstant::BELONG_HOTEL_CHAIN)){
            $hotelService->belongs_hotel_chain = $request->belongsHotelChain === GeneralConstant::BOOLEAN_TRUE;
            if($hotelService->belongs_hotel_chain){
                if($request->has(GeneralConstant::HOTEL_CHAIN_DESCRIPTION) && !empty($request->hotelChainDescription) && $request->hotelChainDescription!=null )
                    $hotelService->hotel_chain_description = $request->hotelChainDescription;
                else
                    return $this->errorResponse(RequestMessage::HOTEL_CHAIN_DESCRIPTION_REQUIRED, RequestCode::VALIDATION_EXCEPTION);
            }else
                $hotelService->hotel_chain_description = null;    
        }else if($request->has(GeneralConstant::HOTEL_CHAIN_DESCRIPTION)){
            if($hotelService->belongs_hotel_chain)
                $hotelService->hotel_chain_description = $request->hotelChainDescription;
            else
                return $this->errorResponse(RequestMessage::BELONG_HOTEL_CHAIN_FALSE, RequestCode::VALIDATION_EXCEPTION);
        }
        
        // Validating CustomerTypes
        $updateCustomerTypes = false;
        if ($request->has(GeneralConstant::CUSTOMER_TYPES)){
            $hotelCustomerTypes=$this->validateCustomerType($request->customerTypes, false);   
            if(!empty($hotelCustomerTypes)){
                $result = $hotelService->customerTypeCatalogue()->sync($hotelCustomerTypes);
                if(!empty($result[GeneralConstant::ATTACHED]) || !empty($result[GeneralConstant::DETACHED]) || !empty($result[GeneralConstant::UPDATED]))
                    $updateCustomerTypes = true;
            }
        }

        // Validating Phones
        $updatePhones = false;
        if ($request->has(GeneralConstant::PHONE)){
            $hotelPhone=$this->validatePhones($request->phone);   
            if(!empty($hotelPhone)){
                $hotelService->phoneHotels()->forceDelete();
                $hotelService->phoneHotels()->createMany($hotelPhone);
                $updatePhones=true;
            }
        }

        // Validating Rating
        $updateRating = false;
        if ($request->has(GeneralConstant::STAR_RATING)){
            if($hotelService->establishment_type_catalogue_id===GeneralConstant::ESTABLISHMENT_TYPE_HOTEL_ID){
                $result=$hotelService->ratingHotel()->update([ColumnName::STAR_RATING => $request->starRating]);
                if($result!=GeneralConstant::CERO)
                    $updateRating = true;
            }
        }
        if($hotelService->establishment_type_catalogue_id!=GeneralConstant::ESTABLISHMENT_TYPE_HOTEL_ID){
            $hotelService->ratingHotel()->forceDelete();
        }

        if (!$hotelService->isDirty() && !$updateCustomerTypes && !$updatePhones && !$updateRating) {
            return $this->errorResponse(RequestMessage::UPDATING, RequestCode::VALIDATION_EXCEPTION);
        }

        $hotelService->save();

        return $this->showOne($hotelService);        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BukApi\Models\Hotel\HotelService  $hotelService
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelService $hotelService)
    {
        if($hotelService->descriptionGenHotel)
            {
                $hotelService->descriptionGenHotel->breakfastCatalogue()->detach();
                $hotelService->descriptionGenHotel->langCatalogue()->detach();
                $hotelService->descriptionGenHotel->facilityCatalogue()->detach();
                $hotelService->descriptionGenHotel()->delete();
            }
        
        if($hotelService->roomPriceLayout->isNotEmpty())
            {
                foreach($hotelService->roomPriceLayout as $room)
                    $room->itemMeasureCatalogue()->detach();
                
                $hotelService->roomPriceLayout()->delete();
            }
        
        if($hotelService->amenitiesHotel)
            {
                $hotelService->amenitiesHotel->amenityExtraBed()->delete();
                $hotelService->amenitiesHotel->amenitiesCatalogue()->detach();
                $hotelService->amenitiesHotel()->delete();
            }
        if($hotelService->photoHotel->isNotEmpty())
            {
                $photoId=[];
                foreach($hotelService->photoHotel as $photo){
                    $id = explode(GeneralConstant::BAR_CHARACTER,$photo->image_path);
                    $publicId=$id[count($id)-GeneralConstant::THREE].GeneralConstant::BAR_CHARACTER.$id[count($id)-GeneralConstant::TWO].GeneralConstant::BAR_CHARACTER;
                    $id=explode(GeneralConstant::POINT_CHARACTER,$id[count($id)-GeneralConstant::ONE]);
                    $publicId = $publicId.$id[GeneralConstant::CERO];
                    array_push($photoId,  $publicId);
                } 
                Cloudder::destroyImages($photoId);
                $hotelService->photoHotel()->delete();
            }
         
        if($hotelService->politicConditions)
            {
                $hotelService->politicConditions->cancelPolitic()->delete();
                
                foreach($hotelService->politicConditions->payConditions as $payCondition)
                    $payCondition->payCardsCatalogue()->detach();
                
                $hotelService->politicConditions->payConditions()->delete();
                $hotelService->politicConditions()->delete();
            } 
        
        if($hotelService->customerTypeCatalogue->isNotEmpty()){
            $hotelService->customerTypeCatalogue()->detach();
        }

        if($hotelService->starRating){
            $hotelService->ratingHotel()->delete();
        }

        if($hotelService->phoneHotels->isNotEmpty()){
            $hotelService->phoneHotels()->delete();
        }
        $hotelService->delete();
        return $this->showOne($hotelService);
    }

    /**
     * Validate if the establishment name is available
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateEstablishmentName(Request $request)
    {
        if (request()->has(GeneralConstant::ESTABLISHMENT_NAME)) {
            $hotelService = HotelService::where(ColumnName::ESTABLISHMENT_NAME, $request->establishmentName)->first();  
            
            if(empty($hotelService))
                return response()->json([GeneralConstant::IS_ESTABLISHMENT_NAME_AVAILABLE => GeneralConstant::BOOLEAN_TRUE]);
            
            return response()->json([GeneralConstant::IS_ESTABLISHMENT_NAME_AVAILABLE => GeneralConstant::BOOLEAN_FALSE]);
         }
        
        return $this->errorResponse(RequestMessage::ESTABLISHMENT_NAME_REQUIRED, RequestCode::VALIDATION_EXCEPTION);
    }

    private function validateEstablishmentNameDuplicated($establishmentName){
       
        $hotelService = HotelService::where(ColumnName::ESTABLISHMENT_NAME, $establishmentName)->first();  
        
        if(!empty($hotelService))
            throw new HttpException(RequestCode::VALIDATION_EXCEPTION, RequestMessage::DUPLICATED_RESOURCE);
    }

    private function validateEstablishmentType($idEstablishmentName){
        // Find EstablishmentType
        $establishmentType = EstablishmentTypeCatalogue::where(ColumnName::ID, $idEstablishmentName)->first();  
        if(empty($establishmentType))
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::ESTABLISHMENT_TYPE_NOT_FOUND_BEGIN.$idEstablishmentName.RequestMessage::NOT_FOUND_END);
            
    }

    private function validateCustomerType($customerTypesList, $store){
        $CustomerTypes = CustomerTypeCatalogue::where(ColumnName::CATEGORY_CATALOGUE_ID, GeneralConstant::EQUAL_OPERATOR, HotelService::CATEGORY_CATALOGUE_ID)->pluck(ColumnName::ID);
        if ((isset($customerTypesList) && is_array($customerTypesList) && !empty($customerTypesList) && !empty($CustomerTypes))){
            $hotelCustomerTypes=[];
            foreach ($CustomerTypes as $item)
                {
                    if($store){
                        if(in_array((String)$item, $customerTypesList))
                            array_push($hotelCustomerTypes, [ColumnName::CUSTOMER_TYPE_CATALOGUE_ID => $item, ColumnName::ACTIVE => true]); 
                        else
                            array_push($hotelCustomerTypes, [ColumnName::CUSTOMER_TYPE_CATALOGUE_ID => $item, ColumnName::ACTIVE => false]);
                    }else{
                        if(in_array((String)$item, $customerTypesList))
                            $hotelCustomerTypes[$item] = [ColumnName::ACTIVE => true];
                        else
                            $hotelCustomerTypes[$item] = [ColumnName::ACTIVE => false];   
                    }
                }
            foreach ($customerTypesList as $item)
                {
                    if(!is_numeric($item) || !$CustomerTypes->contains($item))
                        throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::CUSTOMER_TYPE_CATALOGUE_NOT_FOUND_BEGIN.$item.RequestMessage::NOT_FOUND_END);
                }
            return $hotelCustomerTypes;
        }else{
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::CUSTOMER_TYPE_NOT_FOUND);
        }
    }

    private function validatePhones($phoneList){
        if (isset($phoneList) && is_array($phoneList) && !empty($phoneList)){
            $phones=[];
            foreach ($phoneList as $item)
                {
                    if((!empty($item) || $item!=null) && preg_match(ValidationRule::PHONE_EXPRESION, $item))
                        {
                            array_push($phones, [ColumnName::PHONE_NUMBER => $item]); 
                        }
                    else
                        throw new HttpException(RequestCode::VALIDATION_EXCEPTION, RequestMessage::HOTEL_PHONE_ERROR);
                }
            return $phones;
        }
    }
}
