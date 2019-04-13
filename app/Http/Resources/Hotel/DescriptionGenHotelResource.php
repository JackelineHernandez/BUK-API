<?php

namespace BukApi\Http\Resources\Hotel;

use Illuminate\Http\Resources\Json\Resource;
use BukApi\Constants\GeneralConstant;

class DescriptionGenHotelResource extends Resource
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
            GeneralConstant::INTERNET => $this->internet,
            GeneralConstant::PARKING => $this->parking,
            GeneralConstant::BREAKFAST => $this->breakfast,
            GeneralConstant::FACILITIES => $this->facilityCatalogue,
            GeneralConstant::LANGS => $this->langCatalogue
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
