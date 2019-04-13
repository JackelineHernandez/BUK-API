<?php

namespace BukApi\Models\Hotel\Catalogues;

use Illuminate\Database\Eloquent\Model;
use BukApi\Constants\TableName;
use BukApi\Models\Hotel\Catalogues\AmenitiesType;
use BukApi\Constants\HiddenColumns;
use BukApi\Constants\AppendsColumns;
use BukApi\Constants\ColumnName;
use BukApi\Models\Hotel\AmenitiesHotel;

class AmenitiesCatalogue extends Model
{
    protected $table = TableName::AMENITIES_CATALOGUE;
    public $timestamps = false;
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = HiddenColumns::AMENITIES_CATALOGUE;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = AppendsColumns::AMENITIES_CATALOGUE;

    public function getAmenityDescriptionAttribute(){
        return $this->attributes[ColumnName::AMENITY_DESCRIPTION];
    }

    public function amenitiesType(){

        return $this->belongsTo(AmenitiesType::class);
    }

    public function amenitiesHotel(){

        return $this->belongsToMany(AmenitiesHotel::class, 
                                TableName::AMENITIES_HOTEL_AMENITIES_CATALOGUE);
    }
}
