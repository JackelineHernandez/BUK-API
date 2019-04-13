<?php

namespace BukApi\Models\Hotel;

use BukApi\Constants\FillableColumns;
use BukApi\Models\Hotel\Catalogues\RoomTypeCatalogue;
use BukApi\Models\Hotel\HotelService;
use BukApi\Models\Hotel\Catalogues\ItemMeasureCatalogue;
use BukApi\Constants\TableName;
use BukApi\Constants\ColumnName;
use BukApi\Constants\EagerLoadingColumns;
use BukApi\Constants\HiddenColumns;
use BukApi\Constants\AppendsColumns;
use BukApi\Constants\GeneralConstant;
use BukApi\Models\Hotel\Catalogues\RoomNamesCatalogue;
use BukApi\Models\AbstractModel;

class RoomPriceLayout extends AbstractModel
{
    public $timestamps = false;
    
    /**
     * ['itemMeasureCatalogue:item_measure_catalogue_id as id,
     * item_name,measure,
     * item_quantity as itemQuantity,
     * item_people_quantity as itemPeopleQuantity']
     */
    protected $with = EagerLoadingColumns::ROOM_PRICE_LAYOUTS;
    /**
     * The attributes that should be hidden for arrays.
     *  ['room_type_catalogue_id',
     *   'room_names_catalogue_id',
     *   'room_quantity',
     *   'room_people_quantity',
     *   'custom_name',
     *   'smoking_policy_description',
     *   'has_smoking_policy',
     *   'roomTypeCatalogue',
     *   'living_quantity',
     *   'bath_quantity']
     * @var array
     */
    protected $hidden = HiddenColumns::ROOM_PRICE_LAYOUTS;

    /**
     * The accessors to append to the model's array form.
     *  ['roomInfo', 'spaces']
     * @var array
     */
    protected $appends = AppendsColumns::ROOM_PRICE_LAYOUTS;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = FillableColumns::ROOM_PRICE_LAYOUTS;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        ColumnName::HAS_SMOKING_POLICY => GeneralConstant::BOOLEAN
    ];

    /**
     * mutators
     */
    public function setCustomNameAttribute($value){
        $this->attributes[ColumnName::CUSTOM_NAME] = mb_strtolower($value);
    }
    
    public function getCustomNameAttribute($value){
        return ucwords($value);
    }

    /**
     * Get the Room Info.
     *
     * @return array
     */
    public function getRoomInfoAttribute()
    {
        return $this->attributes[GeneralConstant::ROOM_INFO] = 
        [
            GeneralConstant::ROOM_TYPE => $this->roomTypeCatalogue,
            GeneralConstant::ROOM_NAME => $this->roomNamesCatalogue,
            GeneralConstant::ROOM_QUANTITY => $this->room_quantity,
            GeneralConstant::ROOM_PEOPLE_QUANTITY => $this->room_people_quantity,
            GeneralConstant::CUSTOM_NAME => $this->custom_name,
            GeneralConstant::SMOKING_POLICY_DESCRIPTION => $this->smoking_policy_description,
            GeneralConstant::HAS_SMOKING_POLICY => $this->has_smoking_policy
        ];
    }

    /**
     * Get the Spaces Info.
     *
     * @return array
     */
    public function getSpacesAttribute()
    {
        return $this->attributes[GeneralConstant::SPACES] = 
        [
            GeneralConstant::LIVING_QUANTITY => $this->living_quantity,
            GeneralConstant::BATH_QUANTITY => $this->bath_quantity
        ];
    }

    public function hotelService(){

        return $this->belongsTo(HotelService::class);
    }

    public function roomTypeCatalogue(){

        return $this->belongsTo(RoomTypeCatalogue::class);
    }

    public function itemMeasureCatalogue(){

        return $this->belongsToMany(ItemMeasureCatalogue::class, 
                                    TableName::ROOM_PRICE_LAYOUTS_ITEM_MEASURE_CATALOGUE, 
                                    ColumnName::ROOM_PRICE_LAYOUTS_ID)
                                    ->withPivot(ColumnName::ITEM_QUANTITY, ColumnName::ITEM_PEOPLE_QUANTITY);
    }

    public function roomNamesCatalogue(){

        return $this->belongsTo(RoomNamesCatalogue::class);
    }
}
