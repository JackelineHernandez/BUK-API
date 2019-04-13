<?php

namespace BukApi\Models\Commons;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\TableName;
use BukApi\Models\Commons\PaymentCatalogue;
use BukApi\Constants\HiddenColumns;
use BukApi\Constants\EagerLoadingColumns;

class PayCardsCatalogue extends Model
{
    protected $table = TableName::PAY_CARDS_CATALOGUE;
    public $timestamps = false;

    protected $with = EagerLoadingColumns::PAY_CARDS_CATALOGUE;
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = HiddenColumns::PAY_CARDS_CATALOGUE;

    public function paymentCatalogue(){

        return $this->belongsTo(PaymentCatalogue::class);
    }
}
