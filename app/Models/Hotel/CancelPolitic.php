<?php

namespace BukApi\Models\Hotel;

use BukApi\Constants\GuardedColumns;
use BukApi\Constants\GeneralConstant;
use BukApi\Models\Hotel\PoliticCondition;
use BukApi\Constants\ColumnName;
use BukApi\Models\AbstractModel;

class CancelPolitic extends AbstractModel
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
        ColumnName::HAS_GRACE_PERIOD => GeneralConstant::BOOLEAN
    ];

    /**
     * Get the Hotel Cancellation Options.
     *
     * @return array
     */
    public function getCancellationOptionsAttribute()
    {
        return $this->attributes[GeneralConstant::CANCELLATION_OPTIONS] = 
            [
                GeneralConstant::CANCELLATION_DAYS => $this->cancellation_days,
                ColumnName::PENALITY => $this->penality
            ];
    }
    
    /**
     * Get the Hotel Cancellation Fees.
     *
     * @return array
     */
    public function getCancellationFeesAttribute()
    {
        return $this->attributes[GeneralConstant::CANCELLATION_FEES] = 
            [
                GeneralConstant::HAS_GRACE_PERIOD => $this->has_grace_period,
                GeneralConstant::GRACE_TIME_PERIOD => $this->grace_time_period
            ];
    }
    
    public function politicConditions(){

        return $this->belongsTo(PoliticCondition::class);
    }
}
