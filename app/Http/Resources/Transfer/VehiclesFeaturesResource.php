<?php

namespace BukApi\Http\Resources\Transfer;

use Illuminate\Http\Resources\Json\Resource;
use BukApi\Constants\GeneralConstant;
use BukApi\Constants\ColumnName;
use BukApi\Http\Resources\Transfer\VehiclesFeaturesResourceCollection;
use BukApi\Http\Resources\Transfer\VehiclesPoliciesResource;


class VehiclesFeaturesResource extends Resource
{
    public static function collection($resource)
    {
        return tap(new VehiclesFeaturesResourceCollection($resource), function ($collection) {
            $collection->collects = __CLASS__;
        });
    }

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
            GeneralConstant::TRANSFER_SERVICE_ID => $this->transfer_service_id,
            ColumnName::BRAND => $this->brand,
            ColumnName::MODEL => $this->model,
            GeneralConstant::MAX_PERSON_BAGS => $this->max_person_bags,
            GeneralConstant::MAX_PERSON_HANDBAGS => $this->max_person_handbags,
            GeneralConstant::PERSONS_QUANTITY => $this->persons_quantity,
            GeneralConstant::OTHER_FEATURES => $this->other_features,
            ColumnName::PRICE => $this->price,
            GeneralConstant::VEHICLES_STOCK_QUANTITY => $this->vehicleStockQuantity,
            GeneralConstant::VEHICLE_OCCUPIED_QUANTITY => $this->vehicleOccupiedQuantity,
            GeneralConstant::VEHICLES_TYPE_CATALOGUE => $this->vehiclesTypeCatalogue,
            GeneralConstant::EXTRA_CHARGES => $this->extraChargeCatalogue,
            GeneralConstant::POLICIES => VehiclesPoliciesResource::make($this->vehiclesPolicy)->hide([GeneralConstant::VEHICLES_FEATURES_ID])
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
