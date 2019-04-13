<?php

namespace BukApi\Models\Hotel;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\GuardedColumns;
use JD\Cloudder\Facades\Cloudder;
use BukApi\Constants\AppendsColumns;
use BukApi\Models\Hotel\HotelService;
use BukApi\Constants\GeneralConstant;
use BukApi\Constants\TableName;
use BukApi\Models\AbstractModel;

class PhotoHotel extends AbstractModel
{
    public $timestamps = false;
    protected $table = TableName::GALERY_SERVICES;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = GuardedColumns::PHOTO_HOTEL;

    public function hotelService(){

        return $this->belongsTo(HotelService::class);
    }
}
