<?php

namespace BukApi\Models\Hotel\Catalogues;

use Illuminate\Database\Eloquent\Model;
use BukApi\Models\Hotel\Catalogues\AmenitiesCatalogue;
use BukApi\Constants\TableName;
use BukApi\Constants\HiddenColumns;
use BukApi\Constants\AppendsColumns;
use BukApi\Constants\ColumnName;
use BukApi\Constants\GeneralConstant;

class AmenitiesType extends Model
{
    protected $table = TableName::AMENITIES_TYPE;
    public $timestamps = false;
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = HiddenColumns::AMENITIES_TYPE;
    
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = AppendsColumns::AMENITIES_TYPE;

    public function getAmenitiesTypeDescriptionAttribute(){
        return $this->attributes[ColumnName::AMENITIES_TYPE_DESCRIPTION];
    }

    public function getAmenitiesListAttribute(){
        return $this->attributes[GeneralConstant::AMENITIES_LIST] = $this->amenitiesCatalogue;
    }

    public function amenitiesCatalogue(){

        return $this->hasMany(AmenitiesCatalogue::class);
    }
}
