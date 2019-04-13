<?php

namespace BukApi\Http\Controllers\Hotel;

use BukApi\Models\Hotel\PoliticCondition;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Models\Hotel\HotelService;
use BukApi\Constants\ColumnName;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;
use Symfony\Component\HttpKernel\Exception\HttpException;
use BukApi\Constants\GeneralConstant;
use BukApi\Constants\Query;
use BukApi\Traits\Enums;
use BukApi\Models\Hotel\CancelPolitic;
use BukApi\Models\Commons\PayCardsCatalogue;
use BukApi\Models\Hotel\PayCondition;
use BukApi\Http\Resources\Hotel\PoliticConditionsResource;
use BukApi\Constants\ValidationRule;

class PoliticConditionsController extends ApiController
{
    use Enums;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PoliticConditionsResource::collection(PoliticCondition::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ValidationRule::POLITIC_CONDITIONS;

        $this->validate($request, $rules);

        $politicConditions[ColumnName::HOTEL_SERVICE_ID] = $request->hotelServiceId;
        $politicConditions[ColumnName::MINIMUN_STAY] = $request->minimunStay;

        $politicConditions[ColumnName::CHECKIN_TIME_FROM] = $request->checkInCheckOutInfo[GeneralConstant::CHECKIN_TIME_FROM];
        $politicConditions[ColumnName::CHECKIN_TIME_TO] = $request->checkInCheckOutInfo[GeneralConstant::CHECKIN_TIME_TO];
        $politicConditions[ColumnName::CHECKOUT_TIME_FROM] = $request->checkInCheckOutInfo[GeneralConstant::CHECKOUT_TIME_FROM];
        $politicConditions[ColumnName::CHECKOUT_TIME_TO] = $request->checkInCheckOutInfo[GeneralConstant::CHECKOUT_TIME_TO];
        
        $politicConditions[ColumnName::CHILD_ALLOWED] = $request->childrenPolicy === GeneralConstant::BOOLEAN_TRUE;
        
        $politicConditions[ColumnName::PETS_ALLOWED] = $request->petPolicy[GeneralConstant::PETS_ALLOWED];
        $politicConditions[ColumnName::PETS_CHARGES] = $request->petPolicy[GeneralConstant::PETS_ALLOWED]!= GeneralConstant::TWO ? $request->petPolicy[GeneralConstant::PETS_CHARGES]:null;     //(*)
        
        $this->validateHotelService($politicConditions[ColumnName::HOTEL_SERVICE_ID]);
        $this->validatePetsAllowed($politicConditions[ColumnName::PETS_ALLOWED]);
        $this->validatePetsCharges($politicConditions[ColumnName::PETS_CHARGES], $politicConditions[ColumnName::PETS_ALLOWED]);
        
        $cancelPolitics[ColumnName::CANCELLATION_DAYS] = $request->cancellationOptions[GeneralConstant::CANCELLATION_DAYS];
        $cancelPolitics[ColumnName::PENALITY] = $request->cancellationOptions[ColumnName::PENALITY];
        
        $cancelPolitics[ColumnName::HAS_GRACE_PERIOD] = $request->cancellationFees[GeneralConstant::HAS_GRACE_PERIOD] === GeneralConstant::BOOLEAN_TRUE;
        $cancelPolitics[ColumnName::GRACE_TIME_PERIOD] = $cancelPolitics[ColumnName::HAS_GRACE_PERIOD] ? $request->cancellationFees[GeneralConstant::GRACE_TIME_PERIOD]:null;

        $this->validateCancellationDays($cancelPolitics[ColumnName::CANCELLATION_DAYS]);
        $this->validatePenality($cancelPolitics[ColumnName::PENALITY]);
        $this->validateGracePeriod($cancelPolitics[ColumnName::GRACE_TIME_PERIOD], $cancelPolitics[ColumnName::HAS_GRACE_PERIOD]);
        
        $payConditions[ColumnName::CHARGE_CREDIT_CARD] = $request->guestPaymentOptions[GeneralConstant::CHARGE_CREDIT_CARD] === GeneralConstant::BOOLEAN_TRUE;     
        
        $payConditions[ColumnName::APPLY_VAT_TAX] = $request->guestPaymentOptions[GeneralConstant::APPLY_VAT_TAX] === GeneralConstant::BOOLEAN_TRUE;
        
        $payConditions[ColumnName::APPLY_CITY_TAX] = $request->guestPaymentOptions[GeneralConstant::APPLY_CITY_TAX] === GeneralConstant::BOOLEAN_TRUE;
        $payConditions[ColumnName::CITY_TAX_AMOUNT] = $request->guestPaymentOptions[GeneralConstant::CITY_TAX_AMOUNT];  
        $payConditions[ColumnName::PRICE_INCLUDE_CITY_TAX] = $request->guestPaymentOptions[GeneralConstant::PRICE_INCLUDE_CITY_TAX] === GeneralConstant::BOOLEAN_TRUE;
        $payConditions[ColumnName::CITY_TAX_TYPE] = $request->guestPaymentOptions[GeneralConstant::CITY_TAX_TYPE];
        
        $creditCardTypes = $payConditions[ColumnName::CHARGE_CREDIT_CARD] ? $request->guestPaymentOptions[GeneralConstant::CREDIT_CARD_TYPES] : null;

        $creditCardList = $this->validateCreditCardTypes($payConditions[ColumnName::CHARGE_CREDIT_CARD], $creditCardTypes);
        
        $politicCondition = PoliticCondition::create($politicConditions);

        $cancelOption = new CancelPolitic($cancelPolitics);
        $politicCondition->cancelPolitic()->save($cancelOption);

        $payOptiond = new PayCondition($payConditions);
        $politicCondition->payConditions()->save($payOptiond);
        
        if($creditCardList)
            $politicCondition->payConditions->payCardsCatalogue()->attach($creditCardList);

        return $this->showOne($politicCondition, RequestCode::CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Hotel\PoliticCondition  $politicCondition
     * @return \Illuminate\Http\Response
     */
    public function show(PoliticCondition $politicCondition)
    {
        return new PoliticConditionsResource($politicCondition);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BukApi\Models\Hotel\PoliticCondition  $politicCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PoliticCondition $politicCondition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BukApi\Models\Hotel\PoliticCondition  $politicCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(PoliticCondition $politicCondition)
    {
        //
    }

    private function validateHotelService($idHotelService){
        // Find HotelService
        $hotelService = HotelService::where(ColumnName::ID, $idHotelService)->first();  
        if(empty($hotelService))
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::HOTEL_SERVICE_NOT_FOUND_BEGIN.$idHotelService.RequestMessage::NOT_FOUND_END);
    }

    private function validatePetsAllowed($inputPetsAllowed){
        // Find PetsAllowed
        $petsAllowed = $this->getEnum($inputPetsAllowed, QUERY::PETS_ALLOWED);
        if(empty($petsAllowed))
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::PETS_ALLOWED_NOT_FOUND_BEGIN.$inputPetsAllowed.RequestMessage::NOT_FOUND_END);
    }

    private function validatePetsCharges($inputPetCharges, $inputPetsAllowed){
        // Find PetsCharges
        $petsCharges = $this->getEnum($inputPetCharges, QUERY::PETS_CHARGES);
        if(empty($petsCharges) && $inputPetsAllowed!=GeneralConstant::TWO)
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::PETS_CHARGES_NOT_FOUND_BEGIN.$inputPetCharges.RequestMessage::NOT_FOUND_END);
    }

    private function validateCancellationDays($inputCancellationDays){
        // Find CancellationDays
        $cancellationDays = $this->getEnum($inputCancellationDays, QUERY::CANCELLATION_DAYS);
        if(empty($cancellationDays))
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::CANCELLATION_DAYS_NOT_FOUND_BEGIN.$inputCancellationDays.RequestMessage::NOT_FOUND_END);
    }

    private function validatePenality($inputPenality){
        // Find Penality
        $penality = $this->getEnum($inputPenality, QUERY::PENALITY);
        if(empty($penality))
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::PENALITY_NOT_FOUND_BEGIN.$inputPenality.RequestMessage::NOT_FOUND_END);
    }

    private function validateGracePeriod($inputGracePeriod, $inputHasGracePeriod){
        // Find GracePeriod
        $gracePeriod = $this->getEnum($inputGracePeriod, QUERY::GRACE_TIME_PERIOD);
        if(empty($gracePeriod) && $inputHasGracePeriod)
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::GRACE_TIME_PERIOD_NOT_FOUND_BEGIN.$inputGracePeriod.RequestMessage::NOT_FOUND_END);
    }

    private function validateCreditCardTypes($inputchargeCreditCard, $inputCreditCardList){
        
        if($inputchargeCreditCard){
            
            $creditCards = PayCardsCatalogue::all()->pluck(ColumnName::ID);
            $creditCards=$creditCards->toArray();
            
            if (isset($inputCreditCardList) && is_array($inputCreditCardList) && !empty($inputCreditCardList) && !empty($creditCards)){
                
                $creditCardsList=[];
                foreach ($inputCreditCardList as $item)
                    {
                        if (is_numeric($item) && in_array($item,$creditCards)){
                            
                            $key = array_search($item, array_column($creditCardsList, ColumnName::PAY_CARDS_CATALOGUE_ID));
                            
                            if($key===false)
                                array_push($creditCardsList, [ColumnName::PAY_CARDS_CATALOGUE_ID => $item]); 
                            else
                                throw new HttpException(RequestCode::CONFLICT, RequestMessage::DUPLICATED_PAY_CARD_BEGIN.$item.RequestMessage::DUPLICATED_END);

                        }else if(!is_numeric($item) || !in_array($item,$creditCards))
                            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::PAY_CARD_NOT_FOUND_BEGIN.$item.RequestMessage::NOT_FOUND_END);

                    } 
            }

            return $creditCardsList;
        }
    }
}
