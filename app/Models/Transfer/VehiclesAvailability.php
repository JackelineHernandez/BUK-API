<?php

namespace BukApi\Models\Transfer;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\TableName;
use BukApi\Models\Transfer\VehiclesFeature;

class VehiclesAvailability extends Model
{
    protected $table = TableName::VEHICLES_AVAILABILITY;

    public $timestamps = false;

    public function vehiclesFeature(){

        return $this->belongsTo(VehiclesFeature::class, ColumnName::VEHICLES_FEATURES_ID);
    }

}
