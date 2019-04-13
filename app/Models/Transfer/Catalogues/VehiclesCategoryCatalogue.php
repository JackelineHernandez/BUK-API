<?php

namespace BukApi\Models\Transfer\Catalogues;

use Illuminate\Database\Eloquent\Model;
use BukApi\Models\Transfer\Catalogues\VehiclesTypeCatalogue;
use BukApi\Constants\TableName;

class VehiclesCategoryCatalogue extends Model
{
    protected $table = TableName::VEHICLES_TYPE_CATALOGUE;

    public function vehiclesTypeCatalogue(){

        return $this->hasMany(VehiclesTypeCatalogue::class, 
                                TableName::VEHICLES_TYPE_CATALOGUE);
    }
}
