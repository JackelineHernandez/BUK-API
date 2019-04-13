<?php

namespace BukApi\Models\Hotel;
use BukApi\Constants\TableName;

use BukApi\Constants\GuardedColumns;
use BukApi\Constants\ColumnName;
use BukApi\Constants\GeneralConstant;
use BukApi\Models\Hotel\HotelService;
use BukApi\Models\Hotel\AmenityExtraBed;
use BukApi\Models\Hotel\Catalogues\AmenitiesCatalogue;
use BukApi\Models\Hotel\Catalogues\AmenitiesType;
use BukApi\Constants\EagerLoadingColumns;
use BukApi\Constants\AppendsColumns;
use BukApi\Constants\HiddenColumns;
use BukApi\Models\AbstractModel;

class AmenitiesHotel extends AbstractModel
{
    protected $table = TableName::AMENITIES_HOTEL;
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = GuardedColumns::ID;

    protected $with=EagerLoadingColumns::AMENITIES_HOTEL;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = HiddenColumns::AMENITIES_HOTEL;


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = AppendsColumns::AMENITIES_HOTEL;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        ColumnName::HAS_EXTRA_BED => GeneralConstant::BOOLEAN
    ];

    public function getAmenitiesAttribute(){
        $amenitiesList = AmenitiesType::
                        whereHas(GeneralConstant::AMENITIES_CATALOGUE_AMENITIES_HOTEL, function ($query){
                                    $query->where(ColumnName::AMENITIES_HOTEL_ID, GeneralConstant::EQUAL_OPERATOR, $this->id);
                                })
                        ->with([GeneralConstant::AMENITIES_CATALOGUE  => function ($query){
                                $query->whereHas(GeneralConstant::AMENITIES_HOTEL , function ($query){
                                                    $query->where(ColumnName::AMENITIES_HOTEL_ID, GeneralConstant::EQUAL_OPERATOR, $this->id);
                                                });
                                }])
                        ->get();
        foreach($amenitiesList as $amenity)
            $amenity->amenitiesCatalogue->makeHidden(ColumnName::AMENITIES_TYPE_ID);
                                                
        return $this->attributes[GeneralConstant::AMENITIES] = $amenitiesList;
    }

    /**
     * Get the Amenity Extra Bed Info.
     *
     * @return array
     */
    public function getExtraBedsAttribute()
    {
        if($this->amenityExtraBed)
            return $this->attributes[GeneralConstant::EXTRA_BEDS] = 
            [
                GeneralConstant::HAS_EXTRA_BED => $this->has_extra_bed,
                GeneralConstant::EXTRA_BED_ID => $this->amenityExtraBed->id,
                GeneralConstant::BEDS_QUANTITY => $this->amenityExtraBed->extra_beds_quantity,
                GeneralConstant::HAVE_CHILDREN_IN_CRIBS => $this->amenityExtraBed->have_children_in_cribs,
                GeneralConstant::CHILD_CRIBS_PRICE => $this->amenityExtraBed->child_cribs_price,
                GeneralConstant::HAVE_CHILDREN => $this->amenityExtraBed->have_children,
                GeneralConstant::CHILDREN_AGES => $this->amenityExtraBed->children_ages,
                GeneralConstant::CHILDREN_PRICE => $this->amenityExtraBed->children_price,
                GeneralConstant::HAVE_ADULTS => $this->amenityExtraBed->have_adults,
                GeneralConstant::ADULT_PRICE => $this->amenityExtraBed->adult_price
            ];
        else
            return $this->attributes[GeneralConstant::EXTRA_BEDS] = 
            [
                GeneralConstant::HAS_EXTRA_BED => $this->has_extra_bed,
            ];
    }

    public function hotelService(){

        return $this->belongsTo(HotelService::class);
    }

    public function amenityExtraBed(){

        return $this->hasOne(AmenityExtraBed::class);
    }

    public function amenitiesCatalogue(){

        return $this->belongsToMany(AmenitiesCatalogue::class, 
                                    TableName::AMENITIES_HOTEL_AMENITIES_CATALOGUE)
                                    ->orderBy(ColumnName::AMENITIES_TYPE_ID, GeneralConstant::ORDER_BY_ASC);
    }
}
