<?php

namespace BukApi\Http\Controllers\Hotel\Catalogues;

use BukApi\Models\Hotel\Catalogues\AmenitiesType;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use BukApi\Constants\GeneralConstant;

class AmenitiesTypeCatalogueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenitiesType = AmenitiesType::all();
        
        foreach($amenitiesType as $amenity)
            $amenity->amenitiesCatalogue->makeHidden(ColumnName::AMENITIES_TYPE_ID);
        
        return $this->showAll($amenitiesType);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Hotel\Catalogues\AmenitiesType  $amenitiesType
     * @return \Illuminate\Http\Response
     */
    public function show(AmenitiesType $amenitiesType)
    {
        $amenitiesType->amenitiesCatalogue->makeHidden(ColumnName::AMENITIES_TYPE_ID);
        
        return $this->showOne($amenitiesType);
    }

}
