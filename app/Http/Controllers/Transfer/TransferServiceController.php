<?php

namespace BukApi\Http\Controllers\Transfer;

use BukApi\Models\Transfer\TransferService;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Models\Transfer\Catalogues\VehiclesTypeCatalogue;
use BukApi\Models\Transfer\VehiclesFeature;
use BukApi\Http\Resources\Transfer\TransferServiceResource;
use BukApi\Constants\ColumnName;


class TransferServiceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transferServices = TransferService::all();

        return TransferServiceResource::collection($transferServices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Transfer\TransferService  $transferService
     * @return \Illuminate\Http\Response
     */
    public function show(TransferService $transferService)
    {
        return new TransferServiceResource($transferService);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BukApi\Models\Transfer\TransferService  $transferService
     * @return \Illuminate\Http\Response
     */
    public function edit(TransferService $transferService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BukApi\Models\Transfer\TransferService  $transferService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransferService $transferService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BukApi\Models\Transfer\TransferService  $transferService
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransferService $transferService)
    {
        //
    }
}
