<?php

namespace BukApi\Models\Hotel;

use BukApi\Models\Hotel\AmenitiesHotel;
use BukApi\Constants\GuardedColumns;
use BukApi\Constants\TableName;
use BukApi\Constants\ColumnName;
use BukApi\Constants\GeneralConstant;
use BukApi\Models\AbstractModel;

class AmenityExtraBed extends AbstractModel
{
    public $timestamps = false;
    protected $table = TableName::AMENITY_EXTRA_BEDS;

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
        ColumnName::HAVE_CHILDREN_IN_CRIBS => GeneralConstant::BOOLEAN,
        ColumnName::HAVE_CHILDREN => GeneralConstant::BOOLEAN,
        ColumnName::HAVE_ADULTS => GeneralConstant::BOOLEAN
    ];

    public function amenitiesHotel(){

        return $this->belongsTo(AmenitiesHotel::class);
    }

}
