<?php

namespace BukApi\Models\Commons;

use Illuminate\Database\Eloquent\Model;
use BukApi\Models\Hotel\HotelService;
use BukApi\Constants\FillableColumns;
use BukApi\Constants\TableName;
use BukApi\Models\Commons\CustomerTypeCatalogue;

class CategoryCatalogue extends Model
{
    protected $table = TableName::CATEGORY_CATALOGUE;
    public $timestamps = false;
    
    public function hotelService(){

        return $this->hasMany(HotelService::class);
    }

    public function customerTypeCatalogue(){

        return $this->hasMany(CustomerTypeCatalogue::class);
    }
}
