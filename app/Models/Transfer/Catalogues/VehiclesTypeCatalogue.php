<?php

namespace BukApi\Models\Transfer\Catalogues;

use Illuminate\Database\Eloquent\Model;
use BukApi\Models\Transfer\Catalogues\VehiclesCategoryCatalogue;
use BukApi\Constants\TableName;
use BukApi\Constants\GeneralConstant;
use BukApi\Constants\AppendsColumns;
use BukApi\Constants\HiddenColumns;
use BukApi\Constants\ColumnName;

class VehiclesTypeCatalogue extends Model
{
    protected $table = TableName::VEHICLES_TYPE_CATALOGUE;

    /**
     * The attributes that should be hidden for arrays.
     *  ['vehicles_category_catalogue_id', 'vehiclesCategoryCatalogue']
     * @var array
     */
    protected $hidden = HiddenColumns::VEHICLES_TYPE_CATALOGUE;

    /**
     * The accessors to append to the model's array form.
     *  ['vehicleCategory']
     * @var array
     */
    protected $appends = AppendsColumns::VEHICLES_TYPE_CATALOGUE;

    public function getVehicleCategoryAttribute(){
        
        return $this->attributes[GeneralConstant::VEHICLE_CATEGORY] = $this->vehiclesCategoryCatalogue
                                                                    ->makeHidden(ColumnName::VEHICLES_CATEGORY_CATALOGUE_ID);
    }

    public function vehiclesCategoryCatalogue(){

        return $this->belongsTo(VehiclesCategoryCatalogue::class);
    }
}
