<?php

namespace BukApi\Models\Hotel\Catalogues;

use Illuminate\Database\Eloquent\Model;
use BukApi\Models\Hotel\HotelService;
use BukApi\Constants\TableName;

class EstablishmentTypeCatalogue extends Model
{
    protected $table = TableName::ESTABLISHMENT_TYPE_CATALOGUE;
    public $timestamps = false;
    
    public function hotelServices(){

        return $this->hasMany(HotelService::class);
    }
}
