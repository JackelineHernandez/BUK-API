<?php

namespace BukApi\Models\Commons;

use Illuminate\Database\Eloquent\Model;
use BukApi\Models\Commons\CategoryCatalogue;
use BukApi\Constants\TableName;
use BukApi\Constants\FillableColumns;
use BukApi\Constants\ColumnName;
use BukApi\Models\Hotel\HotelService;
use BukApi\Constants\HiddenColumns;

class CustomerTypeCatalogue extends Model
{
    protected $table = TableName::CUSTOMER_TYPE_CATALOGUE;
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = HiddenColumns::PIVOT;
    
    public function categoryCatalogue(){

        return $this->belongsTo(CategoryCatalogue::class);
    }

    public function HotelService(){

        return $this->belongsToMany(HotelService::class, 
                                    TableName::HOTEL_SERVICE_CUSTOMER_TYPE_CATALOGUE, 
                                    ColumnName::CUSTOMER_TYPE_CATALOGUE_ID, 
                                    ColumnName::HOTEL_SERVICE_ID)
                                    ->withPivot(ColumnName::ACTIVE)
                                    ->wherePivot(ColumnName::ACTIVE, true);
    }
}
