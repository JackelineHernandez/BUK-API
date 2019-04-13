<?php

namespace BukApi\Constants;

class ValidationRule
{
    /**
     * HOTELSERVICE STORE
     */
    const HOTEL_SERVICE_RULES = [
        'establishmentName' => 'required|max:180',
        'city' => 'required|max:70',
        'state' => 'required|max:70',
        'country' => 'required|max:70',
        'zipCode' => 'required|max:11',
        'numberOfRooms' => 'required|numeric|integer|min:1',
        'responsible_name' => 'required|max:70',
        'email' => 'required|email|max:70',
        'customerTypes' => 'required',
        'stablishmentType' => 'required|integer',
        'haveChannelManager' => 'required|in:true,false',
        'channelManagerName' => 'required_if:haveChannelManager,true|max:90',
        'isCompanyManagement' => 'required|in:true,false',
        'companyManagementName' => 'required_if:isCompanyManagement,true|max:70',
        'starRating' => 'required_if:stablishmentType,11|in:1,2,3,4,5'
    ];

    /**
     * HOTELSERVICE UPDATE
     */
    const HOTEL_SERVICE_UPDATE_RULES = [
        'establishmentName' => 'max:180',
        'city' => 'max:70',
        'state' => 'max:70',
        'country' => 'max:70',
        'zipCode' => 'max:11',
        'numberOfRooms' => 'numeric|integer|min:1',
        'responsible_name' => 'max:70',
        'email' => 'email|max:70',
        'stablishmentType' => 'integer',
        'haveChannelManager' => 'in:true,false',
        'channelManagerName' => 'max:90',
        'isCompanyManagement' => 'in:true,false',
        'companyManagementName' => 'max:70',
        'starRating' => 'in:1,2,3,4,5'
    ];

    /**
     * PHONE
     */
    const PHONE_EXPRESION ='/^\+[0-9]{1,4}\-[0-9]{1,20}$/';

    /**
     * DESCRIPTION_GEN_HOTEL STORE
     */
    const DESCRIPTION_GEN_HOTEL_UPDATE_RULES = [
        'hotelServiceId' => 'required|integer',
        'internet.hasInternet' => 'in:0,1,2',
        'internet.internetConnectType' => 'integer',
        'internet.internetPlaces' => 'integer',
        'internet.internetPrice' => 'numeric|integer|min:0|nullable',
        'parking.hasParking' => 'in:0,1,2',
        'parking.parkingPrice' => 'numeric|integer|min:0|nullable',
        'breakfasts.hasBreakfast' => 'in:0,1,2',
    ];

    /**
     * DESCRIPTION_GEN_HOTEL UPDATE
     */
    const DESCRIPTION_GEN_HOTEL_RULES = [
        'hotelServiceId' => 'required|integer',
        'internet.hasInternet' => 'required|in:0,1,2',
        'internet.internetConnectType' => 'required_unless:internet.hasInternet,0|integer',
        'internet.internetPlaces' => 'required_if:internet.hasInternet,1|integer',
        'internet.internetPrice' => 'required_if:internet.hasInternet,2|numeric|integer|min:0|nullable',
        'parking.hasParking' => 'required|in:0,1,2',
        'parking.parkingCondition' => 'required_unless:parking.hasParking,0',
        'parking.parkingAccess' => 'required_unless:parking.hasParking,0',
        'parking.parkingLocation' => 'required_unless:parking.hasParking,0',
        'parking.parkingPrice' => 'required_if:parking.hasParking,2|numeric|integer|min:0|nullable',
        'breakfasts.hasBreakfast' => 'required|in:0,1,2',
    ];

    /**
     * CREATE RESERVATIONS
     */
    const CREATE_RESERVATION_HOTEL = [
        '0.product.id' => 'string',
        '0.product.productId' => 'string',
        '0.product.destination' => 'string',
        '0.product.dateIni' => 'required|date|after:yesterday',
        '0.product.dateEnd' => 'required|date|after:0.product.dateIni',
        '0.product.additionalInfo.paxList.pax.*.firstName' => 'required',
        '0.product.additionalInfo.paxList.pax.*.lastName' => 'required'
    ];

    const CREATE_RESERVATION_TRANSFER = [
        '0.product.id' => 'string',
        '0.product.productId' => 'string',
        '0.product.destination' => 'string',
        '0.product.dateIni' => 'required|date|after:yesterday',
        '0.product.dateEnd' => 'required|date|after:0.product.dateIni',
        '0.product.additionalInfo.transfers.*.owner' => 'required'
    ];

    const CREATE_RESERVATION_ACTIVITY = [
        '0.product.id' => 'string',
        '0.product.productId' => 'string',
        '0.product.destination' => 'string',
        '0.product.dateIni' => 'required|date|after:yesterday',
        '0.product.dateEnd' => 'required|date|after:0.product.dateIni',
        '0.product.additionalInfo.tours.*.paxList' => 'required',
        '0.product.additionalInfo.tours.*.paxList.*.firstName' => 'required',
        '0.product.additionalInfo.tours.*.paxList.*.lastName' => 'required'
    ];

    /**
     * SEARCH SERVICE
     */
    const SEARCH_HOTEL = [
        'destination' => 'required|string',
        'priceFrom' => 'min:0.00',
        'priceTo' => 'min:0.00',
        'arrivalDate' => 'required|date|after:yesterday',
        'departureDate' => 'required|date|after:arrivalDate',
        'others' => 'required|array',
        'others.hotels' => 'required|array',
        'others.hotels.roomConfiguration' => 'required|array',
        'others.ages' => 'required_with:others.child'
    ];

    const SEARCH_TRANSFER = [
        'destination' => 'required|string',
        'priceFrom' => 'min:0.00',
        'priceTo' => 'min:0.00',
        'arrivalDate' => 'required|date|after:yesterday',
        'departureDate' => 'required|date|after:arrivalDate',
        'qtyProduct' => 'required|numeric',
        'qtyPax' => 'required|numeric',
        'others' => 'required|array',
        'others.transfers' => 'required',
        'others.transfers.transferType' => 'required',
        'others.transfers.pickupHour' => 'required',
        'others.transfers.returnHour' => 'required',
        'others.transfers.paxList' => 'required',
        'others.transfers.vehiclesDist' => 'required|array',
        'others.transfers.oneWay' => 'required|boolean',
    ];

    const SEARCH_ACTIVITY = [
        'destination' => 'required|string',
        'priceFrom' => 'min:0.00',
        'priceTo' => 'min:0.00',
        'arrivalDate' => 'required|date|after:yesterday',
        'departureDate' => 'required|date|after:arrivalDate',
        'qtyProduct' => 'required|numeric',
        'qtyPax' => 'required|numeric',
        'others' => 'required|array',
        'others.tours' => 'required'
    ];

    /**
     * UPDATE RESERVATION
     */
    const UPDATE_RESERVATION = [
        '0.idReservationOld'  => 'required',
        '0.product'           => 'required'
    ];
    
    /**
     * PRICE
     */
    const PRICE ='/^[0-9]+$/';

    /**
     * ROOM_PRICE_LAYOUTS
     */
    const ROOM_PRICE_LAYOUTS = [
        'hotelServiceId' => 'required|integer',
        'roomInfo.roomTypeId' => 'required|integer',
        'roomInfo.roomNameId' => 'required|integer',
        'roomInfo.quantity' => 'required|integer',
        'roomInfo.roomPeopleQuantity' => 'required|integer|min:1',
        'roomInfo.customName' => 'max:70',
        'roomInfo.hasSmokingPolicy' => 'required|in:true,false',
        'roomInfo.smokingPolicyDescription' => 'required_if:roomInfo.hasSmokingPolicy,true',
        'spaces.livingQuantity' => 'required|integer',
        'spaces.bathQuantity' => 'required|integer',
        'price' => 'numeric|integer|min:0|nullable',
        'totalRoomMeasure' => 'numeric|integer|min:1|nullable',
        'unitOfMeasurement' => 'required_unless:roomTotalMeasure,null',
        'bedInfo' =>  'required'
    ];

    /**
     * QUANTITY
     */
    const QUANTITY ='/^[1-9][0-9]*$/';

    /**
     * AMENITIESHOTEL STORE
     */
    const AMENITIES_HOTEL = [
        'hotelServiceId' => 'required|integer',
        'extraBeds.hasExtraBed' => 'required|in:true,false',
        'extraBeds.quantity' => 'required_if:hasExtraBed,true|integer|nullable|min:0',
        'extraBeds.haveChildrenInCribs' => 'required_if:hasExtraBed,true|in:true,false|nullable',
        'extraBeds.childCribsPrice' => 'required_if:extraBeds.haveChildrenInCribs,true|integer|nullable|min:0',
        'extraBeds.haveChildren' => 'required_if:hasExtraBed,true|in:true,false|nullable',
        'extraBeds.childrenAges' => 'required_if:extraBeds.haveChildren,true|nullable',
        'extraBeds.childrenPrice' => 'required_if:extraBeds.haveChildren,true|integer|nullable|min:0',
        'extraBeds.haveAdults' => 'required_if:hasExtraBed,true|in:true,false|nullable',
        'extraBeds.adultPrice' => 'required_if:extraBeds.haveAdults,true|integer|nullable|min:0'
    ];

    /**
     * PHOTO_HOTEL
     */
    const PHOTO_HOTEL_RULES = [
        'hotelServiceId' => 'required',
        'image' => 'required|mimes:jpeg,bmp,jpg,png'
    ];

    /**
     * POLITIC_CONDITIONS STORE
     */
    const POLITIC_CONDITIONS = [
        'hotelServiceId' => 'required|integer',
        'minimunStay' => 'required|integer',   
        'checkInCheckOutInfo.checkInFromTime' => 'required|date_multi_format:"h:i A","H:i"|before_or_equal:checkInCheckOutInfo.checkInToTime',   
        'checkInCheckOutInfo.checkInToTime' => 'required|date_multi_format:"h:i A","H:i"',     
        'checkInCheckOutInfo.checkOutFromTime' => 'required|date_multi_format:"h:i A","H:i"|before_or_equal:checkInCheckOutInfo.checkOutToTime',  
        'checkInCheckOutInfo.checkOutToTime' => 'required|date_multi_format:"h:i A","H:i"',    
        'childrenPolicy' => 'required|in:true,false', 
        'petPolicy.canYouBringPets' => 'required|integer',     
        'petPolicy.petCharge' => 'required_unless:petPolicy.canYouBringPets,2|integer|nullable',   
        'cancellationOptions.cancellationDays' => 'required|integer',  
        'cancellationOptions.penality' => 'required|integer',  
        'cancellationFees.hasGracePeriod' => 'required|in:true,false',   
        'cancellationFees.gracePeriod' => 'required_if:cancellationFees.hasGracePeriod,true|integer',      
        'guestPaymentOptions.chargeToYourCreditCard' => 'required|in:true,false',  
        'guestPaymentOptions.creditCardTypes' => 'required_if:guestPaymentOptions.chargeToYourCreditCard,true',    
        'guestPaymentOptions.applyVatTax' => 'required|in:true,false',     
        'guestPaymentOptions.applyCityTax' => 'required|in:true,false',
        'guestPaymentOptions.priceIncludeCityTax' => 'in:true,false',
        'guestPaymentOptions.cityTaxAmount' => 'integer|min:0',
        'guestPaymentOptions.cityTaxType' => 'integer'    
    ];
}
