<?php

namespace BukApi\Http\Controllers\Transfer;

use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Models\Transfer\TransferService;
use BukApi\Http\Resources\Transfer\TransferServiceResource;
use BukApi\Constants\GeneralConstant;
use BukApi\Http\Resources\Transfer\VehiclesFeaturesResource;

class TransferCompleteInfoController extends ApiController
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transferService = TransferService::findOrFail($id);
        
        $basicInfo = new TransferServiceResource($transferService);

        $vehiclesFeatures = VehiclesFeaturesResource::collection($transferService->vehiclesFeatures)->hide([GeneralConstant::TRANSFER_SERVICE_ID]);
        
        $info = [
            GeneralConstant::BASIC_INFO => $basicInfo,
            GeneralConstant::VEHICLES_FEATURES => $vehiclesFeatures
        ];

        return $this->showOneData($info);
    }
}
