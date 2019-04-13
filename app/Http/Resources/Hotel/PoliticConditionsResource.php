<?php

namespace BukApi\Http\Resources\Hotel;

use Illuminate\Http\Resources\Json\Resource;
use BukApi\Constants\GeneralConstant;

class PoliticConditionsResource extends Resource
{
    /**
     * @var array
     */
    protected $withoutFields = [];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->filterFields([
            GeneralConstant::ID => $this->id,
            GeneralConstant::HOTEL_SERVICE_ID => $this->hotel_service_id,
            GeneralConstant::MINIMUN_STAY => $this->minimun_stay,
            GeneralConstant::CHECK_IN_CHECK_OUT_INFO => $this->checkInCheckOutInfo,
            GeneralConstant::CHILDREN_POLICY => $this->childrenPolicy,
            GeneralConstant::PET_POLICY => $this->petPolicy,
            GeneralConstant::CANCELLATION_OPTIONS => $this->cancelPolitic->cancellationOptions,
            GeneralConstant::CANCELLATION_FEES => $this->cancelPolitic->cancellationFees,
            GeneralConstant::GUEST_PAYMENT_OPTIONS => [
                    GeneralConstant::CHARGE_CREDIT_CARD => $this->payConditions->charge_credit_card,
                    GeneralConstant::APPLY_VAT_TAX => $this->payConditions->apply_vat_tax,
                    GeneralConstant::APPLY_CITY_TAX => $this->payConditions->apply_city_tax,
                    GeneralConstant::CITY_TAX_AMOUNT => $this->payConditions->city_tax_amount,
                    GeneralConstant::PRICE_INCLUDE_CITY_TAX => $this->payConditions->price_include_city_tax,
                    GeneralConstant::CITY_TAX_TYPE => $this->payConditions->city_tax_type,
                    GeneralConstant::CREDIT_CARD_TYPES => $this->payConditions->payCardsCatalogue,
                ]
        ]);
    }

    /**
     * Set the keys that are supposed to be filtered out.
     *
     * @param array $fields
     * @return $this
     */
    public function hide(array $fields)
    {
        $this->withoutFields = $fields;
        return $this;
    }

    /**
     * Remove the filtered keys.
     *
     * @param $array
     * @return array
     */
    protected function filterFields($array)
    {
        return collect($array)->forget($this->withoutFields)->toArray();
    }
}
