<?php

namespace BukApi\Models\Transfer\Catalogues;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\TableName;
use BukApi\Constants\HiddenColumns;
use BukApi\Models\Transfer\VehiclesFeature;
use BukApi\Constants\ColumnName;

class ExtraChargesCatalogue extends Model
{
    protected $table = TableName::EXTRA_CHARGES_CATALOGUE;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = HiddenColumns::PIVOT;
    
    public function vehiclesFeature(){

        return $this->belongsToMany(VehiclesFeature::class, 
                                TableName::VEHICLES_EXTRA_CHARGES)
                                ->withPivot(ColumnName::QUANTITY, ColumnName::UNIT_PRICE);
    }
}
