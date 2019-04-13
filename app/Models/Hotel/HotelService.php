<?php

namespace BukApi\Models\Hotel;

use BukApi\Models\Commons\CategoryCatalogue;
use BukApi\Models\Hotel\Catalogues\EstablishmentTypeCatalogue;
use BukApi\Models\Hotel\PhoneHotel;
use BukApi\Constants\TableName;
use BukApi\Constants\FillableColumns;
use BukApi\Constants\ColumnName;
use BukApi\Constants\GeneralConstant;
use BukApi\Models\Hotel\DescriptionGenHotel;
use BukApi\Models\Commons\CustomerTypeCatalogue;
use BukApi\Models\Hotel\RoomPriceLayout;
use BukApi\Models\Hotel\HotelServiceRating;
use BukApi\Constants\EagerLoadingColumns;
use BukApi\Constants\AppendsColumns;
use BukApi\Constants\HiddenColumns;
use BukApi\Models\Hotel\AmenitiesHotel;
use BukApi\Models\Hotel\PhotoHotel;
use BukApi\Models\Hotel\PoliticCondition;
use BukApi\Models\AbstractModel;

class HotelService extends AbstractModel
{
    protected $table = TableName::HOTEL_SERVICE;
    public $timestamps = false;
    
    const CATEGORY_CATALOGUE_ID = GeneralConstant::ONE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = FillableColumns::HOTEL_SERVICE; 
    
    protected $with = EagerLoadingColumns::HOTEL_SERVICE;
     /**
     * The accessors to append to the model's array form.
     *  ['starRating']
     * @var array
     */
    protected $appends = AppendsColumns::HOTEL_SERVICE;
    
    /**
     * The attributes that should be hidden for arrays.
     *  ['ratingHotel','customerTypeCatalogue'];
     * @var array
     */
    protected $hidden = HiddenColumns::HOTEL_SERVICE;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        ColumnName::CHANNEL_MANAGER => GeneralConstant::BOOLEAN,
        ColumnName::BELONG_HOTEL_CHAIN => GeneralConstant::BOOLEAN
    ];
    
    /**
     * mutators
     */
    public function setEstablishmentNameAttribute($value){
        $this->attributes[ColumnName::ESTABLISHMENT_NAME] = mb_strtolower($value);
    }
    
    public function getEstablishmentNameAttribute($value){
        return ucwords($value);
    }
    
    public function setCityAttribute($value){
        $this->attributes[ColumnName::CITY] = mb_strtolower($value);
    }
    
    public function getCityAttribute($value){
        return ucwords($value);
    }

    public function setStateAttribute($value){
        $this->attributes[ColumnName::STATE] = mb_strtolower($value);
    }
    
    public function getStateAttribute($value){
        return ucwords($value);
    }

    public function setCountryAttribute($value){
        $this->attributes[ColumnName::COUNTRY] = mb_strtolower($value);
    }
    
    public function getCountryAttribute($value){
        return ucwords($value);
    }

    public function setResponsibleNameAttribute($value){
        $this->attributes[ColumnName::RESPONSIBLE_NAME] = mb_strtolower($value);
    }
    
    public function getResponsibleNameAttribute($value){
        return ucwords($value);
    }
    
    public function setEmailAttribute($value){
        $this->attributes[ColumnName::EMAIL] = strtolower($value);
    }

    /**
     * Get the Star Rating Hotel.
     *
     * @return integer
     */
    public function getStarRatingAttribute()
    {
        if($this->ratingHotel)
            return $this->attributes[GeneralConstant::STAR_RATING] = $this->ratingHotel->star_rating;
        else
            return $this->attributes[GeneralConstant::STAR_RATING] = null;
    }

    public function getPhoneAttribute(){
        
        return $this->attributes[GeneralConstant::PHONE] =$this->phoneHotels->makeHidden(ColumnName::HOTEL_SERVICE_ID);;
    }

    /**
     * Get the Customer Types Hotel.
     *
     * @return array
     */
    public function getCustomerTypeCatalogueAttribute()
    {
        return $this->customerTypeCatalogue()->wherePivot(ColumnName::ACTIVE, true)->get();
    }

    public function categoryCatalogue(){

        return $this->belongsTo(CategoryCatalogue::class);
    }

    public function establishmentTypeCatalogue(){

        return $this->belongsTo(EstablishmentTypeCatalogue::class);
    }

    public function phoneHotels(){

        return $this->hasMany(PhoneHotel::class);
    }

    public function customerTypeCatalogue(){

        return $this->belongsToMany(CustomerTypeCatalogue::class, 
                                    TableName::HOTEL_SERVICE_CUSTOMER_TYPE_CATALOGUE, 
                                    ColumnName::HOTEL_SERVICE_ID)
                                    ->withPivot(ColumnName::ACTIVE);
    }

    public function descriptionGenHotel(){

        return $this->hasOne(DescriptionGenHotel::class);
    }

    public function roomPriceLayout(){

        return $this->hasMany(RoomPriceLayout::class);
    }

    public function ratingHotel(){

        return $this->hasOne(HotelServiceRating::class);
    }

    public function amenitiesHotel(){

        return $this->hasOne(AmenitiesHotel::class);
    }

    public function photoHotel(){

        return $this->hasMany(PhotoHotel::class);
    }

    public function politicConditions(){

        return $this->hasOne(PoliticCondition::class);
    }
}
