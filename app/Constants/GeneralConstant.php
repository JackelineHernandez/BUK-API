<?php

namespace BukApi\Constants;

class GeneralConstant
{
    const BOOLEAN = 'boolean';
    const BOOLEAN_TRUE = 'true';
    const BOOLEAN_FALSE = 'false';

    const EQUAL_OPERATOR = '=';
    CONST ORDER_BY_ASC= 'asc';

    const POINT_CHARACTER = '.';
    const BAR_CHARACTER = '/';

    CONST CERO= 0;
    CONST ONE= 1;
    CONST TWO= 2;
    CONST THREE = 3;

    const ATTACHED = 'attached';
    const DETACHED = 'detached';
    const UPDATED = 'updated';

    const PREG_REPLACE_PATTERN = "/(enum|set)\('(.+?)'\)/";
    const PREG_REPLACE_REPLACEMENT = "\\2";

    const EXPLODE_DELIMITER="','";

    const ESTABLISHMENT_TYPE_HOTEL_ID = "11";

    const CATEGORY_TRANSFER = 8;
    const CATEGORY_HOTEL = 1;

    const DATE_MULTI_FORMAT = 'date_multi_format';
    const ERROR_COUNT = 'error_count';
    const WARNING_COUNT = 'warning_count';
    const DATE_FORMAT = 'H:i';
    /**
     * HOTEL SERVICE ESTABLISHMENT NAME VALIDATION
     */
    const IS_ESTABLISHMENT_NAME_AVAILABLE = 'isEstablishmentNameAvailable';
    const ESTABLISHMENT_NAME = 'establishmentName';

    /**
     * HOTEL_SERVICE REQUEST INPUT
     */
    const HOME_ADDRESS = 'homeAddress';
    const QUANTITY_ROOMS = 'quantityRooms';
    const GEO_COORDINATES = 'geoCoordinates';
    const CHANNEL_MANAGER = 'haveChannelManager';
    const CHANNELMANAGER_DESCRIPT = 'channelmanagerDescript';
    const RESPONSIBLE_NAME = 'responsibleName';
    const BELONG_HOTEL_CHAIN = 'belongsHotelChain';
    const HOTEL_CHAIN_DESCRIPTION = 'hotelChainDescription';
    const STAR_RATING = 'starRating';
    const PHONE = 'phone';
    const CATEGORIES = 'categories';
    const ESTABLISHMENT_TYPE = 'establishmentType';
    const CUSTOMER_TYPES = 'customerTypes';
    const POLITIC_CONDITIONS = 'politicConditions';
    const REFERENCE = 'locationReference';
    const ZIP = 'zipCode';
    /**
     * DESCRIPTIONGEN_HOTEL REQUEST INPUT
     */
    const HOTEL_SERVICE_ID = 'hotelServiceId';
    const INTERNET='internet';
    const HAS_INTERNET='hasInternet';
    const PAY_INTERNET= 'payInternet';
    const INTERNET_CONNECT_TYPE='internetConnectType';
    const INTERNET_PLACE='internetPlaces';
    const INTERNET_PRICE='internetPrice';
    const PARKING='parking';
    const HAS_PARKING='hasParking';
    const PAY_PARKING='payParking';
    const PARKING_CONDITION='parkingCondition';
    const PARKING_ACCESS='parkingAccess';
    const PARKING_LOCATION='parkingLocation';
    const PARKING_PRICE='parkingPrice';
    const BREAKFAST='breakfasts';
    const HAS_BREAKFAST='hasBreakfast';
    const PAY_BREAKFAST = 'payBreakfast';
    const BREAKFAST_LIST = 'breakfastList';
    const FACILITIES = 'facilities';
    const LANGS = 'langs';
    /**
     * DESCRIPTIONGEN_HOTEL BREAKFAST LIST
     */
    const ID='id';
    const PRICE='price';
     /**
     * ROOM PRICE LAYOUTS REQUEST INPUT
     */
    const ROOM_TYPE_CATALOGUE_ID = 'roomTypeId';
    const ROOM_NAMES_CATALOGUE_ID = 'roomNameId';
    const ROOM_QUANTITY = 'quantity';
    const ROOM_PEOPLE_QUANTITY = 'roomPeopleQuantity';
    const CUSTOM_NAME = 'customName';
    const HAS_SMOKING_POLICY = 'hasSmokingPolicy';
    const SMOKING_POLICY_DESCRIPTION = 'smokingPolicyDescription';
    const LIVING_QUANTITY = 'livingQuantity';
    const BATH_QUANTITY = 'bathQuantity';
    const ROOM_INFO = 'roomInfo';
    const ROOM_TYPE = 'roomType';
    const ROOM_NAME = 'roomName';
    const SPACES = 'spaces';
    const ROOM_TOTAL_MEASURE = 'totalRoomMeasure';
    const UNIT_MEASURE_ROOM = 'unitOfMeasurement';
    const BED_INFO = 'bedInfo';
    /**
     *  ROOM PRICE LAYOUTS ITEM MEASURE LIST
     */
    const ITEM_QUANTITY = 'itemQuantity';
    const ITEM_PEOPLE_QUANTITY = 'itemPeopleQuantity';
    /**
     * JSON
     */
    const CONTENT_TYPE = 'Content-Type';
    const FORMAT = 'application/json';
    /**
     * HOTEL COMPLETE INFO DATA
     */
    const BASIC_INFO = 'basicInfo';
    const DESCRIPTION_GEN = 'descriptionGen';
    const LAYOUTS = 'layouts';

    /**
     * AMENITIES
     */
    const AMENITIES_LIST = 'amenitiesList';
    const AMENITIES_CATALOGUE = 'amenitiesCatalogue';
    const AMENITIES_HOTEL = 'amenitiesHotel';
    const AMENITIES='amenities';

    /**
     * AMENITY_EXTRA_BEDS
     */
    const EXTRA_BED_ID = 'extraBedId';
    const BEDS_QUANTITY = 'quantity';
    const HAVE_CHILDREN_IN_CRIBS = 'haveChildrenInCribs';
    const CHILD_CRIBS_PRICE = 'childCribsPrice';
    const HAVE_CHILDREN = 'haveChildren';
    const CHILDREN_AGES = 'childrenAges';
    const CHILDREN_PRICE = 'childrenPrice';
    const HAVE_ADULTS = 'haveAdults';
    const ADULT_PRICE = 'adultPrice';

    /**
     * AMENITIES_HOTEL
     */
    const AMENITIES_CATALOGUE_AMENITIES_HOTEL = 'amenitiesCatalogue.amenitiesHotel';
    const EXTRA_BEDS = 'extraBeds';
    const HAS_EXTRA_BED = 'hasExtraBed';
    
    /**
     * VEHICLES TYPE CATALOGUE
     */
    const VEHICLE_CATEGORY = 'vehicleCategory';

    /**
     * TRANSFER_SERVICE
     */
    const COMPANY_NAME = 'companyName';
    const CATEGORY = 'category';
    const VEHICLES_FEATURES = 'vehiclesFeatures';
    const TOTAL_VEHICLES = 'totalVehicles';

    /**
     * VEHICLES_FEATURES
     */
    const TRANSFER_SERVICE_ID = 'transferServiceId';
    const MAX_PERSON_BAGS = 'maxPersonBags';
    const MAX_PERSON_HANDBAGS = 'maxPersonHandbags';
    const VEHICLES_TYPE_CATALOGUE = 'vehiclesType';
    const PERSONS_QUANTITY = 'personsQuantity';
    const OTHER_FEATURES = 'otherFeatures';
    const EXTRA_CHARGES = 'extraCharges';
    const POLICIES = 'policies';

    /**
     * VEHICLES_AVAILABILITY
     */
    const VEHICLES_STOCK_QUANTITY = 'vehicleStockQuantity';
    const VEHICLE_OCCUPIED_QUANTITY = 'vehicleOccupiedQuantity';

    /**
     * VEHICLES_POLICIES
     */
    const VEHICLES_FEATURES_ID = 'vehiclesFeaturesId';
    const MAX_CUSTOMER_WAIT_TIME = 'maxCustomerWaitTime';
    const MAX_PROV_DOMESTIC_WAIT_TIME = 'maxProvDomesticWaitTime';
    const MAX_PROV_INTERNAC_WAIT_TIME = 'maxProvInternacWaitTime';
    const TRANSPORT_TYPE = 'transportType';
    const HAS_DOOR_TO_DOOR_SERVICE = 'hasDoorToDoorService';
    const PERIOD_AVAILABLE = 'periodAvailable';
    const BAG_DIMENTIONS = 'bagDimentions';
    const BAG_WIGHT_KG = 'bagWeightKg';
    const MAX_STOPS = 'maxStops';

    /**
     * PHOTO_HOTEL
     */
    const URL = 'url';
    const PHOTOS ='photos';
    const IMAGE_PATH = 'imagePath';
    
    /**
     * CLOUDINARY OPTIONS
     */
    const FOLDER = 'folder';
    const HOTEL_URL_BEGIN = 'Hotel/';
    const URL_END = '/';

    /**
     * POLITIC_CONDITIONS
     */
    const CHECKIN_TIME_FROM = 'checkInFromTime';
    const CHECKIN_TIME_TO = 'checkInToTime';
    const CHECKOUT_TIME_FROM = 'checkOutFromTime';
    const CHECKOUT_TIME_TO = 'checkOutToTime';
    const PETS_ALLOWED = 'canYouBringPets';
    const PETS_CHARGES = 'petCharge';
    const CHILDREN_POLICY = 'childrenPolicy';
    const CHILD_ALLOWED = 'childAllowed';
    const PET_POLICY = 'petPolicy';
    const MINIMUN_STAY = 'minimunStay';
    const CHECK_IN_CHECK_OUT_INFO = 'checkInCheckOutInfo';
    const CHILD_AGES_LIMIT = 'childAgesLimit';
    const CHILD_QUANTITY = 'childQuantity';
   
    /**
      * CANCEL_POLITICS
      */
      const CANCELLATION_DAYS = 'cancellationDays';
      const HAS_GRACE_PERIOD = 'hasGracePeriod';
      const GRACE_TIME_PERIOD = 'gracePeriod';
      const CANCELLATION_OPTIONS = 'cancellationOptions';
      const CANCELLATION_FEES = 'cancellationFees';
      const GUEST_PAYMENT_OPTIONS = 'guestPaymentOptions';

    /**
     * PAY_CONDITIONS
     */
    const CHARGE_CREDIT_CARD = 'chargeToYourCreditCard';
    const APPLY_VAT_TAX = 'applyVatTax';
    const APPLY_CITY_TAX = 'applyCityTax';
    const CITY_TAX_AMOUNT = 'cityTaxAmount';
    const PRICE_INCLUDE_CITY_TAX = 'priceIncludeCityTax';
    const CITY_TAX_TYPE = 'cityTaxType';
    const CREDIT_CARD_TYPES = 'creditCardTypes';
     
}