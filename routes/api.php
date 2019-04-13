<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Categories
 */
Route::apiresource('categoryCatalogues', 'Commons\CategoryCatalogueController', ['only'=>['index', 'show']]);
/**
 * EstablishmentTypeCatalogue
 */
Route::apiresource('establishmentTypeCatalogues', 'Hotel\Catalogues\EstablishmentTypeCatalogueController', ['only'=>['index', 'show']]);
/**
 * CustomerTypeCatalogue
 */
Route::apiresource('customerTypeCatalogues', 'Commons\CustomerTypeCatalogueController', ['only'=>['index', 'show']]);
/**
 * HotelServices
 */
Route::post('hotelServices/isEstablishmentNameAvailable', 'Hotel\HotelServiceController@validateEstablishmentName');
Route::apiresource('hotelServices', 'Hotel\HotelServiceController');
/**
 * BreakfastCatalogue
 */
Route::apiresource('breakfastCatalogues', 'Commons\BreakfastCatalogueController', ['only'=>['index', 'show']]);
/**
 * LangCatalogue
 */
Route::apiresource('langCatalogues', 'Commons\LangCatalogueController', ['only'=>['index', 'show']]);
/**
 * Facilites
 */
Route::apiresource('facilityCatalogues', 'Commons\FacilityCatalogueController', ['only'=>['index', 'show']]);
/**
 * InternetConnectType
 */
Route::apiresource('internetConnectTypeCatalogues', 'Commons\InternetConnectTypeCatalogueController', ['only'=>['index', 'show']]);
/**
 * InternetConnectPlaces
 */
Route::apiresource('internetPlaceCatalogues', 'Commons\InternetPlaceCatalogueController', ['only'=>['index', 'show']]);
/**
 * DescriptionGenHotel
 */
Route::apiresource('descriptionGenHotels', 'Hotel\DescriptionGenHotelController');

/**
 * ConditionParkingBuk  ||  Columna Enum
 */
Route::apiresource('parkingConditionCatalogues', 'Hotel\Catalogues\ParkingConditionCatalogueController', ['only'=>['index', 'show']]);

/**
 * ParkingAccess  ||  Columna Enum
 */
Route::apiresource('parkingAccessCatalogues', 'Hotel\Catalogues\ParkingAccessCatalogueController', ['only'=>['index', 'show']]);

/**
 * ParkingLocation  ||  Columna Enum
 */
Route::apiresource('parkingLocationCatalogues', 'Hotel\Catalogues\ParkingLocationCatalogueController', ['only'=>['index', 'show']]);
/**
 * RoomTypes
 */
Route::apiresource('roomTypeCatalogues', 'Hotel\Catalogues\RoomTypeCatalogueController', ['only'=>['index', 'show']]);
/**
 * ItemMeasures
 */
Route::apiresource('itemMeasureCatalogues', 'Hotel\Catalogues\ItemMeasureCatalogueController', ['only'=>['index', 'show']]);
/**
 * RoomNames
 */
Route::apiresource('roomNamesCatalogues', 'Hotel\Catalogues\RoomNamesCatalogueController', ['only'=>['index', 'show']]);
/**
 * UnitMeasureRoom  ||  Columna Enum
 */
Route::apiresource('unitMeasureRoomCatalogues', 'Hotel\Catalogues\UnitMeasureRoomCatalogueController', ['only'=>['index', 'show']]);

/**
 * RoomPriceLayouts
 */
Route::apiresource('roomPriceLayouts', 'Hotel\RoomPriceLayoutsController');
/**
 * HotelCompleteInfo
 */
Route::get('hotelCompleteInfo/{id}', 'Hotel\HotelCompleteInfoController@show');
/**
 * AmenitiesType
 */
Route::apiresource('amenitiesTypes', 'Hotel\Catalogues\AmenitiesTypeCatalogueController', ['only'=>['index', 'show']]);
/*
 * ChildrenAges  ||  Columna Enum
 */
Route::apiresource('childrenAgesCatalogues', 'Hotel\Catalogues\ChildrenAgesCatalogueController', ['only'=>['index', 'show']]);
/**
 * HotelServiceAmenities
 */
Route::apiresource('amenitiesHotels', 'Hotel\AmenitiesHotelController');
/**
 * TransferService
 */
Route::apiresource('transferServices', 'Transfer\TransferServiceController');
/**
 * TransferCompleteInfo
 */
Route::get('trasnferCompleteInfo/{id}', 'Transfer\TransferCompleteInfoController@show');
/**
 * PhotoHotel
 */
Route::apiresource('photoHotel', 'Hotel\PhotoHotelController');
/**
 * RoomTypes
 */
Route::apiresource('payCardsCatalogues', 'Commons\PayCardsCatalogueController', ['only'=>['index', 'show']]);
/*
 * ChildAgesLimit  ||  Columna Enum
 */
Route::apiresource('childAgesLimitCatalogues', 'Hotel\Catalogues\ChildAgesLimitCatalogueController', ['only'=>['index', 'show']]);
/*
 * PetsAllowed  ||  Columna Enum
 */
Route::apiresource('petsAllowedCatalogues', 'Hotel\Catalogues\PetsAllowedCatalogueController', ['only'=>['index', 'show']]);
/*
 * PetsCharges  ||  Columna Enum
 */
Route::apiresource('petsChargesCatalogues', 'Hotel\Catalogues\PetsChargesCatalogueController', ['only'=>['index', 'show']]);
/*
 * CancellationDays  ||  Columna Enum
 */
Route::apiresource('cancellationDaysCatalogues', 'Hotel\Catalogues\CancellationDaysCatalogueController', ['only'=>['index', 'show']]);
/*
 * GraceTimePeriod  ||  Columna Enum
 */
Route::apiresource('graceTimePeriodCatalogues', 'Hotel\Catalogues\GraceTimePeriodCatalogueController', ['only'=>['index', 'show']]);
/*
 * Penality  ||  Columna Enum
 */
Route::apiresource('penalityCatalogues', 'Hotel\Catalogues\PenalityCatalogueController', ['only'=>['index', 'show']]);
/*
 * CityTaxType  ||  Columna Enum
 */
Route::apiresource('cityTaxTypesCatalogues', 'Hotel\Catalogues\CityTaxTypeCatalogueController', ['only'=>['index', 'show']]);
/**
 * PoliciesPayments
 */
Route::apiresource('politicConditions', 'Hotel\PoliticConditionsController');


/**
 * Searchs
 */
Route::post('search/hotel', 'Search\Hotel\SearchHotelController@index')->name('searchHotel.index');
Route::post('search/transfer', 'Search\Transfer\SearchTransferController@index')->name('searchTransfer.index');
Route::post('search/activity', 'Search\Activity\SearchActivityController@index')->name('searchActivity.index');
/**
 * Hotel Reservations
 */
Route::resource('reservation/hotel', 'Reservation\Hotel\ReservationHotelController', 
    [
        'only'  =>  ['show', 'store', 'destroy'], 
        'names' =>  [
                    'show' => 'reservationHotel.show',
                    'store' => 'reservationHotel.store',
                    'destroy' => 'reservationHotel.destroy'
                    ]
    ]
);
Route::put('reservation/hotel', 'Reservation\Hotel\ReservationHotelController@update')->name('reservationHotel.update');
/**
 * Transfer Reservations
 */
Route::resource('reservation/transfer', 'Reservation\Transfer\ReservationTransferController', 
[
    'only'  =>  ['show', 'store', 'destroy'], 
    'names' =>  [
                'show' => 'reservationTransfer.show',
                'store' => 'reservationTransfer.store',
                'destroy' => 'reservationTransfer.destroy'
                ]
]
);
Route::put('reservation/transfer', 'Reservation\Transfer\ReservationTransferController@update')->name('reservationTransfer.update');
/**
 * Activity Reservations
 */
Route::resource('reservation/activity', 'Reservation\Activity\ReservationActivityController', 
[
    'only'  =>  ['show', 'store', 'destroy'], 
    'names' =>  [
                'show' => 'reservationActivity.show',
                'store' => 'reservationActivity.store',
                'destroy' => 'reservationActivity.destroy'
                ]
]
);
Route::put('reservation/activity', 'Reservation\Activity\ReservationActivityController@update')->name('reservationActivity.update');