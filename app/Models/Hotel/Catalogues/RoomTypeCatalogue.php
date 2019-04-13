<?php

namespace BukApi\Models\Hotel\Catalogues;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\TableName;
use BukApi\Models\Hotel\RoomPriceLayout;

class RoomTypeCatalogue extends Model
{
    protected $table = TableName::ROOM_TYPE_CATALOGUE;
    
    public function roomPriceLayout(){

        return $this->hasMany(RoomPriceLayout::class);
    }
}
