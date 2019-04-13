<?php

namespace BukApi\Models\Hotel;

use BukApi\Constants\GuardedColumns;
use BukApi\Constants\GeneralConstant;
use BukApi\Models\Hotel\CancelPolitic;
use BukApi\Models\Hotel\PayCondition;
use BukApi\Constants\ColumnName;
use BukApi\Constants\AppendsColumns;
use BukApi\Models\AbstractModel;

class PoliticCondition extends AbstractModel
{
    public $timestamps = false;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = GuardedColumns::ID;
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        ColumnName::CHILD_ALLOWED => GeneralConstant::BOOLEAN
    ];
    
    /**
     * mutators
     */
    public function setCheckinTimeFromAttribute($value){
        $this->attributes[ColumnName::CHECKIN_TIME_FROM] = date(GeneralConstant::DATE_FORMAT, strtotime($value));
    }
    
    public function getCheckinTimeFromAttribute($value){
        return date(GeneralConstant::DATE_FORMAT, strtotime($this->attributes[ColumnName::CHECKIN_TIME_FROM]));
    }

    public function setCheckinTimeToAttribute($value){
        $this->attributes[ColumnName::CHECKIN_TIME_TO] = date(GeneralConstant::DATE_FORMAT, strtotime($value));
    }

    public function getCheckinTimeToAttribute($value){
        return date(GeneralConstant::DATE_FORMAT, strtotime($this->attributes[ColumnName::CHECKIN_TIME_TO]));
    }

    public function setCheckoutTimeFromAttribute($value){
        $this->attributes[ColumnName::CHECKOUT_TIME_FROM] = date(GeneralConstant::DATE_FORMAT, strtotime($value));
    }

    public function getCheckoutTimeFromAttribute($value){
        return date(GeneralConstant::DATE_FORMAT, strtotime($this->attributes[ColumnName::CHECKOUT_TIME_FROM]));
    }

    public function setCheckoutTimeToAttribute($value){
        $this->attributes[ColumnName::CHECKOUT_TIME_TO] = date(GeneralConstant::DATE_FORMAT, strtotime($value));
    }

    public function getCheckoutTimeToAttribute($value){
        return date(GeneralConstant::DATE_FORMAT, strtotime($this->attributes[ColumnName::CHECKOUT_TIME_TO]));
    }

    /**
     * Get the Hotel Children Policy.
     *
     * @return array
     */
    public function getChildrenPolicyAttribute()
    {
        return $this->attributes[GeneralConstant::CHILDREN_POLICY] = 
            [
                GeneralConstant::CHILD_ALLOWED => $this->child_allowed,
                GeneralConstant::CHILD_AGES_LIMIT => $this->child_ages_limit,
                GeneralConstant::CHILD_QUANTITY => $this->child_quantity
            ];
    }

    /**
     * Get the Hotel Pet Policy.
     *
     * @return array
     */
    public function getPetPolicyAttribute()
    {
        return $this->attributes[GeneralConstant::PET_POLICY] = 
            [
                GeneralConstant::PETS_ALLOWED => $this->pets_allowed,
                GeneralConstant::PETS_CHARGES => $this->pets_charges
            ];
    }

    /**
     * Get the Hotel Pet Policy.
     *
     * @return array
     */
    public function getCheckInCheckOutInfoAttribute()
    {
        return $this->attributes[GeneralConstant::CHECK_IN_CHECK_OUT_INFO] = 
            [
                GeneralConstant::CHECKIN_TIME_FROM => $this->checkin_time_from,
                GeneralConstant::CHECKIN_TIME_TO => $this->checkin_time_to,
                GeneralConstant::CHECKOUT_TIME_FROM => $this->checkout_time_from,
                GeneralConstant::CHECKOUT_TIME_TO => $this->checkout_time_to
            ];
    }

    /**
     * Get the Hotel Cancellation Options.
     *
     * @return array
     */
    public function getCancellationOptionsAttribute()
    {
        return $this->cancelPolitic->cancellationOptions;
    }

    public function cancelPolitic(){

        return $this->hasOne(CancelPolitic::class, ColumnName::POLITIC_CONDITIONS_ID);
    }

    public function payConditions(){

        return $this->hasOne(PayCondition::class, ColumnName::POLITIC_CONDITIONS_ID);
    }
}
