<?php

namespace BukApi\Models\Hotel;

use BukApi\Constants\GuardedColumns;
use BukApi\Constants\TableName;
use BukApi\Constants\HiddenColumns;
use BukApi\Models\AbstractModel;

class HotelServiceRating extends AbstractModel
{
    protected $table = TableName::HOTEL_SERVICE_RATING;
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = HiddenColumns::HOTEL_SERVICE_RATING;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = GuardedColumns::ID;

    public function hotelService(){

        return $this->belongsTo(HotelService::class);
    }
}
