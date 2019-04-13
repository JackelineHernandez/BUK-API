<?php

namespace BukApi\Models\Commons;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\TableName;
use BukApi\Models\Commons\PayCardsCatalogue;

class PaymentCatalogue extends Model
{
    protected $table = TableName::PAYMENT_CATALOGUE;
    public $timestamps = false;

    public function payCardsCatalogue(){

        return $this->hasMany(PayCardsCatalogue::class);
    }
    
}
