<?php

namespace BukApi\Http\Resources\Hotel;

use Illuminate\Http\Resources\Json\Resource;
use BukApi\Constants\GeneralConstant;
use BukApi\Http\Resources\Hotel\RoomPriceLayoutResourceCollection;


class RoomPriceLayoutResource extends Resource
{
    public static function collection($resource)
    {
        return tap(new RoomPriceLayoutResourceCollection($resource), function ($collection) {
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
            GeneralConstant::HOTEL_SERVICE_ID => $this->hotel_service_id,
            GeneralConstant::ROOM_TOTAL_MEASURE => $this->room_total_measure,
            GeneralConstant::UNIT_MEASURE_ROOM => $this->unit_measure_room,
            GeneralConstant::PRICE => $this->price,
            GeneralConstant::ROOM_INFO => $this->roomInfo,
            GeneralConstant::BED_INFO => $this->itemMeasureCatalogue,
            GeneralConstant::SPACES => $this->spaces
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
