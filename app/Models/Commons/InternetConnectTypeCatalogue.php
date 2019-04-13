<?php

namespace BukApi\Models\Commons;

use Illuminate\Database\Eloquent\Model;
use BukApi\Models\Hotel\DescriptionGenHotel;
use BukApi\Constants\FillableColumns;
use BukApi\Constants\TableName;

class InternetConnectTypeCatalogue extends Model
{
    public $timestamps = false;
    protected $table = TableName::INTERNET_CONNECT_TYPE_CATALOGUE;

    public function descriptionGenHotel(){

        return $this->hasMany(DescriptionGenHotel::class);
    }
}
