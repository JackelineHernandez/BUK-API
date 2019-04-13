<?php

namespace BukApi\Models\Hotel\Catalogues;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\TableName;
use BukApi\Models\Hotel\RoomPriceLayout;
use BukApi\Constants\ColumnName;
use BukApi\Constants\AppendsColumns;
use BukApi\Constants\HiddenColumns;

class RoomNamesCatalogue extends Model
{
    protected $table = TableName::ROOM_NAMES_CATALOGUE;
    
    public function roomPriceLayout(){

        return $this->hasMany(RoomPriceLayout::class);
    }
}
