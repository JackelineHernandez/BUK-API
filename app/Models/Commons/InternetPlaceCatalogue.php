<?php

namespace BukApi\Models\Commons;

use Illuminate\Database\Eloquent\Model;
use BukApi\Models\Hotel\DescriptionGenHotel;
use BukApi\Constants\FillableColumns;
use BukApi\Constants\TableName;
use BukApi\Constants\ColumnName;

class InternetPlaceCatalogue extends Model
{
    public $timestamps = false;
    protected $table = TableName::INTERNET_PLACE_CATALOGUE;

    public function descriptionGenHotel(){

        return $this->hasMany(DescriptionGenHotel::class, ColumnName::INTERNET_PLACE_CATALOGUE_ID);
    }
}
