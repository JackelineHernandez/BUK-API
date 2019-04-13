<?php

namespace BukApi\Http\Resources\Transfer;

use Illuminate\Http\Resources\Json\ResourceCollection;
use BukApi\Http\Resources\Transfer\VehiclesFeaturesResource;

class VehiclesFeaturesResourceCollection extends ResourceCollection
{
    /**
     * @var array
     */
    protected $withoutFields = [];
    
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->processCollection($request);
    }
    
    public function hide(array $fields)
    {
        $this->withoutFields = $fields;
        return $this;
    }
    
    /**
     * Send fields to hide to VehiclesFeaturesResorce while processing the collection.
     * 
     * @param $request
     * @return array
     */
    protected function processCollection($request)
    {
        return $this->collection->map(function (VehiclesFeaturesResource $resource) use ($request) {
            return $resource->hide($this->withoutFields)->toArray($request);
        })->all();
    }
}
