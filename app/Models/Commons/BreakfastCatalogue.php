<?php

namespace BukApi\Models\Commons;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\FillableColumns;
use BukApi\Constants\TableName;
use BukApi\Models\Hotel\DescriptionGenHotel;
use BukApi\Constants\ColumnName;
use BukApi\Constants\HiddenColumns;

class BreakfastCatalogue extends Model
{
    public $timestamps = false;
    protected $table = TableName::BREAKFAST_CATALOGUE;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = HiddenColumns::PIVOT;

    public function descriptionGenHotel(){

        return $this->belongsToMany(DescriptionGenHotel::class, 
                                    TableName::DESCRIPTIONGEN_HOTEL_BREAKFAST_CATALOGUE,
                                    ColumnName::BREAKFAST_CATALOGUE_ID,
                                    ColumnName::DESCRIPTIONGEN_HOTEL_ID)
                                    ->withPivot(ColumnName::BREAKFAST_PRICE);
    }
}
