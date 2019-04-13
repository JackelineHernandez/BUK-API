<?php

namespace BukApi\Models\Transfer;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\GeneralConstant;

class VehiclesPolicy extends Model
{
    public $timestamps = false;

    public function getPeriodAvailableAttribute($value){
        return $this->attributes[GeneralConstant::PERIOD_AVAILABLE] = $this->hours_available."/".$this->days_available;
    }

}
