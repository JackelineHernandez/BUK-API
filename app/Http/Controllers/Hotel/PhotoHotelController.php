<?php

namespace BukApi\Http\Controllers\Hotel;

use BukApi\Models\Hotel\PhotoHotel;
use Illuminate\Http\Request;
use BukApi\Http\Controllers\ApiController;
use BukApi\Constants\ColumnName;
use BukApi\Constants\RequestCode;
use JD\Cloudder\Facades\Cloudder;
use BukApi\Constants\GeneralConstant;
use BukApi\Models\Hotel\HotelService;
use BukApi\Constants\RequestMessage;
use Symfony\Component\HttpKernel\Exception\HttpException;
use BukApi\Constants\ValidationRule;
use BukApi\Http\Resources\Hotel\PhotoHotelResource;

class PhotoHotelController extends ApiController
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PhotoHotelResource::collection(PhotoHotel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ValidationRule::PHOTO_HOTEL_RULES;

        $this->validate($request, $rules);

        $data = $request->all();

        $input[ColumnName::CATEGORY_CATALOGUE_ID] = GeneralConstant::CATEGORY_HOTEL;
        $input[ColumnName::HOTEL_SERVICE_ID] = $request->hotelServiceId;
        
        $this->validateHotelService($input[ColumnName::HOTEL_SERVICE_ID]);

        $ruta=GeneralConstant::HOTEL_URL_BEGIN.$input[ColumnName::HOTEL_SERVICE_ID].GeneralConstant::URL_END;
        Cloudder::upload($request->image, null, [GeneralConstant::FOLDER => $ruta]);
       
        $publicId = Cloudder::resource(Cloudder::getPublicId());
        $input[ColumnName::IMAGE_PATH] = $publicId[GeneralConstant::URL];
        
        $photoHotel = PhotoHotel::create($input);
        
        return $this->showOne($photoHotel, RequestCode::CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \BukApi\Models\Hotel\PhotoHotel  $photoHotel
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoHotel $photoHotel)
    {
        return new PhotoHotelResource($photoHotel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BukApi\Models\Hotel\PhotoHotel  $photoHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoHotel $photoHotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BukApi\Models\Hotel\PhotoHotel  $photoHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoHotel $photoHotel)
    {
        //
    }

    private function validateHotelService($idHotelService){
        // Find HotelService
        $hotelService = HotelService::where(ColumnName::ID, $idHotelService)->first();  
        if(empty($hotelService))
            throw new HttpException(RequestCode::NOT_FOUND, RequestMessage::HOTEL_SERVICE_NOT_FOUND_BEGIN.$idHotelService.RequestMessage::NOT_FOUND_END);
    }
}
