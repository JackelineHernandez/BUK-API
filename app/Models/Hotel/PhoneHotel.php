<?php

namespace BukApi\Models\Hotel;

use Illuminate\Database\Eloquent\Model;
use BukApi\Models\Hotel\HotelService;
use BukApi\Constants\FillableColumns;
use BukApi\Constants\HiddenColumns;
use BukApi\Models\AbstractModel;

class PhoneHotel extends AbstractModel
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = FillableColumns::PHONE_HOTEL;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = HiddenColumns::PIVOT;
    
    public function hotelService(){

        return $this->belongsTo(HotelService::class);
    }
}
