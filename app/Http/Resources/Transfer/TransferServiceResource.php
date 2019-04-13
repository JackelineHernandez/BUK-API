<?php

namespace BukApi\Http\Resources\Transfer;

use Illuminate\Http\Resources\Json\Resource;
use BukApi\Constants\GeneralConstant;
use BukApi\Constants\ColumnName;
use BukApi\Http\Resources\Transfer\VehiclesFeaturesResource;

class TransferServiceResource extends Resource
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
            GeneralConstant::COMPANY_NAME => $this->company_name,
            ColumnName::CITY => $this->city,
            ColumnName::STATE => $this->state,
            ColumnName::COUNTRY => $this->country,
            ColumnName::ZIP => $this->zip,
            GeneralConstant::HOME_ADDRESS => $this->home_address,
            GeneralConstant::RESPONSIBLE_NAME => $this->responsible_name,
            ColumnName::EMAIL => $this->email,
            GeneralConstant::PHONE => $this->phone,
            GeneralConstant::CATEGORY => $this->categoryCatalogue,
            GeneralConstant::TOTAL_VEHICLES => $this->totalVehicles
        ];
    }
}
