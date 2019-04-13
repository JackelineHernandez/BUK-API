<?php

namespace BukApi\Models\Transfer;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\GuardedColumns;
use BukApi\Constants\ColumnName;
use BukApi\Models\Transfer\TransferService;
use BukApi\Models\Transfer\Catalogues\VehiclesTypeCatalogue;
use BukApi\Models\Transfer\Catalogues\ExtraChargesCatalogue;
use BukApi\Constants\TableName;
use BukApi\Constants\EagerLoadingColumns;
use BukApi\Models\Transfer\VehiclesAvailability;
use BukApi\Constants\GeneralConstant;
use BukApi\Models\Transfer\VehiclesPolicy;
use BukApi\Constants\AppendsColumns;
use BukApi\Constants\HiddenColumns;

class VehiclesFeature extends Model
{
    public $timestamps = false;

    protected $with = EagerLoadingColumns::VEHICLES_FEATURES;

     /**
     * The accessors to append to the model's array form.
     *  ['vehicle_stock_quantity', 'vehicle_occupied_quantity']
     * @var array
     */
    protected $appends = AppendsColumns::VEHICLES_FEATURES;

    /**
     * The attributes that should be hidden for arrays.
     *  ['vehiclesAvailability']
     * @var array
     */
    protected $hidden = HiddenColumns::VEHICLES_FEATURES;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = GuardedColumns::ID;

    /**
     * mutators
     */
    public function setBrandAttribute($value){
        $this->attributes[ColumnName::BRAND] = mb_strtolower($value);
    }
    
    public function getBrandAttribute($value){
        return ucwords($value);
    }
    
    public function setModelAttribute($value){
        $this->attributes[ColumnName::MODEL] = mb_strtolower($value);
    }
    
    public function getModelAttribute($value){
        return ucwords($value);
    }

    public function getVehicleStockQuantityAttribute($value){
        if (isset($this->vehiclesAvailability))
            return $this->attributes[ColumnName::VEHICLE_STOCK_QUANTITY] = $this->vehiclesAvailability->vehicle_stock_quantity;
        return null;
    }

    public function getVehicleOccupiedQuantityAttribute($value){
        if (isset($this->vehiclesAvailability))
            return $this->attributes[ColumnName::VEHICLE_OCCUPIED_QUANTITY] = $this->vehiclesAvailability->vehicle_occupied_quantity;
        return null;
    }

    public function transferService(){

        return $this->belongsTo(TransferService::class);
    }

    public function vehiclesTypeCatalogue(){

        return $this->belongsTo(VehiclesTypeCatalogue::class);
    }

    public function extraChargeCatalogue(){

        return $this->belongsToMany(ExtraChargesCatalogue::class, 
                                    TableName::VEHICLES_EXTRA_CHARGES,
                                    ColumnName::VEHICLES_FEATURES_ID)
                                    ->withPivot(ColumnName::QUANTITY, ColumnName::UNIT_PRICE);
    }

    public function vehiclesAvailability(){

        return $this->hasOne(VehiclesAvailability::class, ColumnName::VEHICLES_FEATURES_ID);
    }

    public function vehiclesPolicy(){

        return $this->hasOne(VehiclesPolicy::class, ColumnName::VEHICLES_FEATURES_ID);
    }
}
