<?php

namespace BukApi\Models\Hotel\Catalogues;

use Illuminate\Database\Eloquent\Model;
use BukApi\Models\Hotel\RoomPriceLayout;
use BukApi\Constants\TableName;
use BukApi\Constants\ColumnName;
use BukApi\Constants\HiddenColumns;

class ItemMeasureCatalogue extends Model
{
    protected $table = TableName::ITEM_MEASURE_CATALOGUE;
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = HiddenColumns::PIVOT;
    
    public function roomPriceLayout(){

        return $this->belongsToMany(RoomPriceLayout::class, 
                                    TableName::ROOM_PRICE_LAYOUTS_ITEM_MEASURE_CATALOGUE, 
                                    ColumnName::ITEM_MEASURE_CATALOGUE_ID, 
                                    ColumnName::ROOM_PRICE_LAYOUTS_ID)
                                    ->withPivot(ColumnName::ITEM_QUANTITY, ColumnName::ITEM_PEOPLE_QUANTITY);
    }
}
