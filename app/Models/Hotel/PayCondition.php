<?php

namespace BukApi\Models\Hotel;

use BukApi\Models\Hotel\PoliticCondition;
use BukApi\Constants\GuardedColumns;
use BukApi\Constants\GeneralConstant;
use BukApi\Models\Commons\PayCardsCatalogue;
use BukApi\Constants\TableName;
use BukApi\Constants\ColumnName;
use BukApi\Models\AbstractModel;

class PayCondition extends AbstractModel
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
        ColumnName::CHARGE_CREDIT_CARD => GeneralConstant::BOOLEAN,
        ColumnName::APPLY_VAT_TAX => GeneralConstant::BOOLEAN,
        ColumnName::CITY_TAX_AMOUNT => GeneralConstant::BOOLEAN,
        ColumnName::PRICE_INCLUDE_CITY_TAX => GeneralConstant::BOOLEAN
    ];

    public function politicConditions(){

        return $this->belongsTo(PoliticCondition::class);
    }

    public function payCardsCatalogue(){

        return $this->belongsToMany(PayCardsCatalogue::class, 
                                    TableName::PAY_CONDITIONS_PAY_CARDS_CATALOGUE, 
                                    ColumnName::PAY_CONDITIONS_ID);
    }
}
