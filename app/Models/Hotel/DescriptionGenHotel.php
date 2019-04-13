<?php

namespace BukApi\Models\Hotel;

use BukApi\Constants\FillableColumns;
use BukApi\Models\Hotel\HotelService;
use BukApi\Models\Commons\InternetConnectTypeCatalogue;
use BukApi\Models\Commons\InternetPlaceCatalogue;
use BukApi\Constants\ColumnName;
use BukApi\Constants\GeneralConstant;
use BukApi\Constants\TableName;
use BukApi\Models\Commons\FacilityCatalogue;
use BukApi\Models\Commons\LangCatalogue;
use BukApi\Models\Commons\BreakfastCatalogue;
use BukApi\Constants\EagerLoadingColumns;
use BukApi\Constants\HiddenColumns;
use BukApi\Constants\AppendsColumns;
use BukApi\Models\AbstractModel;


class DescriptionGenHotel extends AbstractModel
{
    public $timestamps = false;
    protected $table = TableName::DESCRIPTION_GEN_HOTEL;

    protected $with = EagerLoadingColumns::DESCRIPTION_GEN_HOTEL;
    /**
     * The attributes that should be hidden for arrays.
    *['internet_connect_type_catalogue_id', 
    *    'internet_place_catalogue_id',
    *    'has_internet',
    *    'pay_internet',
    *    'internet_price',
    *    'has_parking',
    *    'pay_parking',
    *    'parking_condition',
    *    'parking_access',
    *    'parking_location',
    *    'parking_price',
    *    'has_breakfast',
    *    'pay_breakfast',
    *    'breakfastCatalogue',
    *    'facilityCatalogue',
    *    'langCatalogue']
     * @var array
     */
    protected $hidden = HiddenColumns::DESCRIPTION_GEN_HOTEL;

    /**
     * The accessors to append to the model's array form.
     *  ['internet', 'parking', 'breakfast']
     * @var array
     */
    protected $appends = AppendsColumns::DESCRIPTION_GEN_HOTEL;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = FillableColumns::DESCRIPTION_GEN_HOTEL; 

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        ColumnName::HAS_INTERNET => GeneralConstant::BOOLEAN,
        ColumnName::PAY_INTERNET => GeneralConstant::BOOLEAN,
        ColumnName::HAS_PARKING => GeneralConstant::BOOLEAN,
        ColumnName::PAY_PARKING => GeneralConstant::BOOLEAN,
        ColumnName::HAS_BREAKFAST => GeneralConstant::BOOLEAN,
        ColumnName::PAY_BREAKFAST => GeneralConstant::BOOLEAN
    ];

    /**
     * Get the Internet Info.
     *
     * @return array
     */
    public function getInternetAttribute()
    {
        return $this->attributes[GeneralConstant::INTERNET] = 
        [
            GeneralConstant::HAS_INTERNET => $this->has_internet,
            GeneralConstant::PAY_INTERNET => $this->pay_internet,
            GeneralConstant::INTERNET_PRICE => $this->internet_price,
            GeneralConstant::INTERNET_CONNECT_TYPE => $this->internetConnectTypeCatalogue,
            GeneralConstant::INTERNET_PLACE => $this->internetPlaceCatalogue
        ];
    }

    /**
     * Get the Parking Info.
     *
     * @return array
     */
    public function getParkingAttribute()
    {
        return $this->attributes[GeneralConstant::PARKING] = 
        [
            GeneralConstant::HAS_PARKING => $this->has_parking,
            GeneralConstant::PAY_PARKING => $this->pay_parking,
            GeneralConstant::PARKING_CONDITION => $this->parking_condition,
            GeneralConstant::PARKING_ACCESS => $this->parking_access,
            GeneralConstant::PARKING_LOCATION => $this->parking_location,
            GeneralConstant::PARKING_PRICE => $this->parking_price
        ];
    }
    
    /**
     * Get the Breakfast Info.
     *
     * @return array
     */
    public function getBreakfastAttribute()
    {
        return $this->attributes[GeneralConstant::BREAKFAST] = 
        [
            GeneralConstant::HAS_BREAKFAST => $this->has_breakfast,
            GeneralConstant::PAY_BREAKFAST => $this->pay_breakfast,
            GeneralConstant::BREAKFAST_LIST => $this->breakfastCatalogue
        ];
    }

    public function hotelService(){

        return $this->belongsTo(HotelService::class);
    }

    public function internetConnectTypeCatalogue(){

        return $this->belongsTo(InternetConnectTypeCatalogue::class);
    }

    public function internetPlaceCatalogue(){

        return $this->belongsTo(InternetPlaceCatalogue::class, ColumnName::INTERNET_PLACE_CATALOGUE_ID);
    }

    public function facilityCatalogue(){

        return $this->belongsToMany(FacilityCatalogue::class, 
                                    TableName::DESCRIPTIONGEN_HOTEL_FACILITY_CATALOGUE,
                                    ColumnName::DESCRIPTIONGEN_HOTEL_ID);
    }

    public function langCatalogue(){

        return $this->belongsToMany(LangCatalogue::class, 
                                    TableName::DESCRIPTIONGEN_HOTEL_LANG_CATALOGUE,
                                    ColumnName::DESCRIPTIONGEN_HOTEL_ID);
    }

    public function breakfastCatalogue(){

        return $this->belongsToMany(BreakfastCatalogue::class, 
                                    TableName::DESCRIPTIONGEN_HOTEL_BREAKFAST_CATALOGUE,
                                    ColumnName::DESCRIPTIONGEN_HOTEL_ID,
                                    ColumnName::BREAKFAST_CATALOGUE_ID)
                                    ->withPivot(ColumnName::BREAKFAST_PRICE);
    }

    
    
}
