<?php

namespace BukApi\Models\Commons;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\FillableColumns;
use BukApi\Models\Hotel\DescriptionGenHotel;
use BukApi\Constants\TableName;
use BukApi\Constants\ColumnName;
use BukApi\Constants\HiddenColumns;

class FacilityCatalogue extends Model
{
    protected $table = TableName::FACILITY_CATALOGUE;
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = HiddenColumns::PIVOT;
    
    public function descriptionGenHotel(){

        return $this->belongsToMany(DescriptionGenHotel::class,
                                    TableName::DESCRIPTIONGEN_HOTEL_FACILITY_CATALOGUE,
                                    ColumnName::FACILITY_CATALOGUE_ID,
                                    ColumnName::DESCRIPTIONGEN_HOTEL_ID);
    }
}
