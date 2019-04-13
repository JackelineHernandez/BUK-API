<?php

namespace BukApi\Http\Resources\Hotel;

use Illuminate\Http\Resources\Json\Resource;
use BukApi\Constants\GeneralConstant;
use BukApi\Constants\ColumnName;

class HotelServiceResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                GeneralConstant::ID => $this->id,
                GeneralConstant::ESTABLISHMENT_NAME => $this->establishment_name,
                ColumnName::CITY => $this->city,
                ColumnName::STATE => $this->state,
                ColumnName::COUNTRY => $this->country,
                ColumnName::ZIP => $this->zip,
                ColumnName::REFERENCE => $this->reference,
                GeneralConstant::HOME_ADDRESS => $this->home_address,
                GeneralConstant::QUANTITY_ROOMS => $this->quantity_rooms,
                GeneralConstant::GEO_COORDINATES => $this->geo_coordinates,
                GeneralConstant::CHANNEL_MANAGER => $this->channel_manager,
                GeneralConstant::CHANNELMANAGER_DESCRIPT => $this->channelmanager_descript,
                GeneralConstant::RESPONSIBLE_NAME => $this->responsible_name,
                ColumnName::EMAIL => $this->email,
                GeneralConstant::BELONG_HOTEL_CHAIN => $this->belongs_hotel_chain,
                GeneralConstant::HOTEL_CHAIN_DESCRIPTION => $this->hotel_chain_description,
                GeneralConstant::STAR_RATING => $this->starRating,
                GeneralConstant::PHONE => $this->phone,
                GeneralConstant::CATEGORIES => $this->categoryCatalogue,
                GeneralConstant::ESTABLISHMENT_TYPE => $this->establishmentTypeCatalogue,
                GeneralConstant::CUSTOMER_TYPES => $this->customerTypeCatalogue,
            ];
        
    }
}
