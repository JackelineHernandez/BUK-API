<?php

namespace BukApi\Models\Transfer;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\TableName;
use BukApi\Constants\GuardedColumns;
use BukApi\Constants\ColumnName;
use BukApi\Constants\GeneralConstant;
use BukApi\Models\Transfer\VehiclesFeature;
use BukApi\Models\Commons\CategoryCatalogue;
use BukApi\Models\Transfer\PhoneTransfer;
use BukApi\Transformers\TransferServiceTransformer;
use BukApi\Constants\AppendsColumns;

class TransferService extends Model
{
    protected $table = TableName::TRANSFER_SERVICE;

    public $timestamps = false;

    const CATEGORY_CATALOGUE_ID = GeneralConstant::CATEGORY_TRANSFER;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = GuardedColumns::TRANSFER_SERVICE;

    /**
     * mutators
     */
    public function setCompanyNameAttribute($value){
        $this->attributes[ColumnName::COMPANY_NAME] = mb_strtolower($value);
    }
    
    public function getCompanyNameAttribute($value){
        return ucwords($value);
    }
    
    public function setCityAttribute($value){
        $this->attributes[ColumnName::CITY] = mb_strtolower($value);
    }
    
    public function getCityAttribute($value){
        return ucwords($value);
    }

    public function setStateAttribute($value){
        $this->attributes[ColumnName::STATE] = mb_strtolower($value);
    }
    
    public function getStateAttribute($value){
        return ucwords($value);
    }

    public function setCountryAttribute($value){
        $this->attributes[ColumnName::COUNTRY] = mb_strtolower($value);
    }
    
    public function getCountryAttribute($value){
        return ucwords($value);
    }

    public function setResponsibleNameAttribute($value){
        $this->attributes[ColumnName::RESPONSIBLE_NAME] = mb_strtolower($value);
    }
    
    public function getResponsibleNameAttribute($value){
        return ucwords($value);
    }
    
    public function setEmailAttribute($value){
        $this->attributes[ColumnName::EMAIL] = strtolower($value);
    }

    public function getTotalVehiclesAttribute(){
        $features=$this->vehiclesFeatures;
        $stock= $features->sum(ColumnName::VEHICLE_STOCK_QUANTITY);
        $occupied= $features->sum(ColumnName::VEHICLE_OCCUPIED_QUANTITY);
        return $this->attributes[GeneralConstant::TOTAL_VEHICLES] =$stock-$occupied;
    }

    public function getPhoneAttribute(){
        
        return $this->attributes[GeneralConstant::PHONE] =$this->phoneTransfer->makeHidden(ColumnName::TRANSFER_SERVICE_ID);;
    }

    public function categoryCatalogue(){

        return $this->belongsTo(CategoryCatalogue::class);
    }

    public function vehiclesFeatures(){

        return $this->hasMany(VehiclesFeature::class);
    }

    public function phoneTransfer(){

        return $this->hasMany(PhoneTransfer::class);
    }
}
