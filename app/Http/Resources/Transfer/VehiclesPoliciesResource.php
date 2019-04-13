<?php

namespace BukApi\Http\Resources\Transfer;

use Illuminate\Http\Resources\Json\Resource;
use BukApi\Constants\GeneralConstant;

class VehiclesPoliciesResource extends Resource
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
            GeneralConstant::VEHICLES_FEATURES_ID => $this->vehicles_features_id,
            GeneralConstant::MAX_CUSTOMER_WAIT_TIME => $this->max_customer_wait_time,
            GeneralConstant::MAX_PROV_DOMESTIC_WAIT_TIME => $this->max_prov_domestic_wait_time,
            GeneralConstant::MAX_PROV_INTERNAC_WAIT_TIME => $this->max_prov_internac_wait_time,
            GeneralConstant::TRANSPORT_TYPE => $this->transport_type,
            GeneralConstant::HAS_DOOR_TO_DOOR_SERVICE => $this->has_door_to_door_service,
            GeneralConstant::PERIOD_AVAILABLE => $this->periodAvailable,
            GeneralConstant::BAG_DIMENTIONS => $this->bag_dimentions,
            GeneralConstant::BAG_WIGHT_KG => $this->bag_weight_kg,
            GeneralConstant::MAX_STOPS => $this->max_stops,
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
