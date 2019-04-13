<?php

namespace BukApi\Constants;

class RequestMessage
{
    /**
     * HTTP ERROR
     */
    const URL_NOT_FOUND = "The URL does not exist";
    const METHOD_NOT_ALLOWED="The HTTP Method is not valid";
    const DUPLICATED_RESOURCE="The resource is duplicated";
    const INTERNAL_SERVER_ERROR="Unexpected Fail, please try later";
    const MODEL_NOT_FOUND_EXCEPTION_BEGIN="The Model ";

    const NOT_FOUND_END = " does not exist";
    const PARKING_CONDITION_NOT_FOUND_BEGIN = "The Condition Parking Buk with id ";

    const PARKING_ACCESS_NOT_FOUND_BEGIN = "The Parking Access with id ";
    
    const PARKING_LOCATION_NOT_FOUND_BEGIN = "The Parking Location with id ";
    
    const DUPLICATED_END = " is duplicated";

    const UNIT_MEASURE_ROOM_NOT_FOUND_BEGIN = "The Unit Measure Room with id ";
    
    const UPDATING = "You must specify at least one different value to update";
    /**
     * BAD FILTERS
     */
    const BAD_FILTERS = "You must enter the filters in json format, inside the body";

    /**
     * RESERVATIONS
     */
    const RESERVATION_SUCCESSFUL = "The reservation was processed successfully";
    const RESERVATION_CANCELED = "Booking was canceled";
    const RESERVATION_ERROR = "Error in reservation";
    const NO_RESULTS = "No results.";
    const RESULTS_FOUND = "Results were found";
    /**
     * UNEXPECTED
     */
    const UNEXPECTED = "An unexpected error has occurred";

    /**
     * ID SEARCH
     */
    const ID_SEARCH = "Please check the idSearch";

    /**
     * VALIDATION ERROR HOTEL SERVICE SAVE
     */
    const ESTABLISHMENT_TYPE_NOT_FOUND_BEGIN ="The EstablishmentType with id ";
    
    const CUSTOMER_TYPE_CATALOGUE_NOT_FOUND_BEGIN="The CustomerTypes with id ";

    const HOTEL_PHONE_ERROR="There is a Phone Number Invalid";

    const CUSTOMER_TYPE_NOT_FOUND ="The Customer Types List is not found";
    
    const CHANNELMANAGER_DESCRIPT_REQUIRED = "The channel manager name field is required when have channel manager is true.";
    
    const CHANNEL_MANAGER_FALSE = "The channel manager field must be true to update the channel manager name.";
    
    const HOTEL_CHAIN_DESCRIPTION_REQUIRED = "The company management name field is required when is company management is true.";
    
    const BELONG_HOTEL_CHAIN_FALSE = "The is company management field must be true to update the company management name.";
    
    /**
     * VALIDATION HOTEL SERVICE ESTABLISHMENT NAME
     */
    const ESTABLISHMENT_NAME_REQUIRED = "The Establishment Name field is required";
    /**
     * VALIDATION ERROR DESCRIPTION GEN HOTEL SAVE
     */
    const HOTEL_SERVICE_NOT_FOUND_BEGIN ="The HotelService with id ";

    const INTERNET_CONNECT_TYPE_NOT_FOUND_BEGIN ="The InternetConncectType with id ";

    const INTERNET_PLACES_NOT_FOUND_BEGIN ="The InternetPlace with id ";

    const FACILITY_NOT_FOUND_BEGIN ="The Facility with id ";

    const LANG_NOT_FOUND_BEGIN ="The Lang with id ";

    const BREAKFAST_NOT_FOUND_BEGIN ="The Breakfast with id ";

    const BREAKFAST_PRICE_INVALID ="The Breakfast Price is invalid ";

    const DUPLICATED_FACILITY_BEGIN="The Facility with id ";
    
    const DUPLICATED_LANG_BEGIN="The Lang with id ";

    const DUPLICATED_BREAKFAST_BEGIN="The Breakfast with id ";

    const LANGS_NOT_FOUND ="The Langs List is not found";

    const INTERNET_CONNECT_TYPE_REQUIRED = "The internet.internet connect type field is required unless internet.has internet is in 0.";

    const INTERNET_PLACES_REQUIRED = "The internet.internet places field is required when internet.has internet is 1.";
    
    const INTERNET_PRICE_REQUIRED = "The internet.internet price field is required when internet.has internet is 2.";

    const PARKING_PRICE_REQUIRED = "The parking.parking price field is required when parking.has parking is 2.";

    const PARKING_CONDITION_REQUIRED = "The parking.parking condition field is required unless parking.has parking is in 0.";

    const PARKING_ACCESS_REQUIRED = "The parking.parking access field is required unless parking.has parking is in 0.";

    const PARKING_LOCATION_REQUIRED = "The parking.parking location field is required unless parking.has parking is in 0.";

    const BREAKFAST_LIST_REQUIRED = "The breakfasts.breakfast List field is required.";

    /**
     * VALIDATION ERROR ROOM PRICE LAYOUTS SAVE
     */
    const ROOM_TYPE_NOT_FOUND_BEGIN ="The RoomType with id ";
    const ROOM_NAME_NOT_FOUND_BEGIN ="The RoomName with id ";
    const ROOM_QUANTITY_SURPASSED = "The Quantity Room Item can not be over ";
    
    const ITEM_QUANTITY_INVALID ="The Item Quantity is invalid ";
    const ITEM_PEOPLE_QUANTITY_INVALID ="The Item People Quantity is invalid ";
    const DUPLICATED_ITEM_MEASURE_BEGIN="The Item Measure with id ";
    const ITEM_MEASURE_NOT_FOUND_BEGIN ="The Item Measure with id ";
    const ITEM_MEASURE_NOT_FOUND ="The Item Measure List is not found";
    
    const ITEM_PEOPLE_QUANTITY_SURPASSED = "The Sum of People by Item can not be over ";
    
    /**
     * VALIDATION ERROR AMENITIES HOTEL SAVE
     */
    const CHILDREN_AGES_NOT_FOUND_BEGIN = "The Children Ages with id ";
    
    const CHILDREN_AGES_REQUIRED = 'The Children Ages is required';
    
    const EXTRA_BEDS_REQUIRED = 'The Extra Beds Data is required';
    
    const BEDS_QUUANTITY_INVALID = 'Beds Quantity Invalid';

    const DUPLICATED_AMENITIES_BEGIN="The Amenity with id ";
    
    const AMENITY_NOT_FOUND_BEGIN ="The Amenity with id ";
    
    const AMENITY_NOT_FOUND ="The Amenities List is not found";

    /**
     * POLITIC CONDITIONS
     */
    const CHILD_AGES_LIMIT_NOT_FOUND_BEGIN = "The Child Ages Limit with id ";

    const PETS_ALLOWED_NOT_FOUND_BEGIN = "The Pets Allowed with id ";

    const PETS_CHARGES_NOT_FOUND_BEGIN = "The Pets Charges with id ";

    const CANCELLATION_DAYS_NOT_FOUND_BEGIN = "The Cancellation Days with id ";

    const GRACE_TIME_PERIOD_NOT_FOUND_BEGIN = "The Grace Time Period with id ";

    const PENALITY_NOT_FOUND_BEGIN = "The Penality with id ";

    const CITY_TAX_TYPE_NOT_FOUND_BEGIN = "The City Tax Type with id ";
    
    const DUPLICATED_PAY_CARD_BEGIN="The Pay Card with id ";

    const PAY_CARD_NOT_FOUND_BEGIN = "The Pay Card with id ";
    

    
    
    
}
