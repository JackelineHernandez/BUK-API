<?php

namespace BukApi\Constants;

class ColumnName
{
    /**
     * GENERAL
     */
    const ID = 'id';
    
    /**
     * CustomerTypeCatalogue
     */
    const CATEGORY_CATALOGUE_ID = 'category_catalogue_id';
    const CLIENT_KIND_DESCRIPTION= 'client_kind_description';

    /**
     * CategoryCatalogue
     */
    const CATEGORY_NAME = 'category_name';
    
    /**
     * HotelServiceCustomerTypeCatalogue table
     */
    const CUSTOMER_TYPE_CATALOGUE_ID = 'customer_type_catalogue_id';
    const HOTEL_SERVICE_ID = 'hotel_service_id';
    const ACTIVE = 'active';
    
    /**
     * HotelService table
     */
    const ESTABLISHMENT_NAME= 'establishment_name';
    const ESTABLISHMENT_TYPE_CATALOGUE_ID = 'establishment_type_catalogue_id';
    const CITY = 'city';
    const STATE = 'state';
    const COUNTRY = 'country';
    const ZIP = 'zip';
    const REFERENCE = 'reference';
    const HOME_ADDRESS = 'home_address';
    const QUANTITY_ROOMS = 'quantity_rooms';
    const GEO_COORDINATES = 'geo_coordinates';
    const CHANNEL_MANAGER = 'channel_manager';
    const CHANNELMANAGER_DESCRIPT = 'channelmanager_descript';
    const RESPONSIBLE_NAME = 'responsible_name';
    const EMAIL = 'email';
    const PHONE_NUMBER = 'phone_number';
    const HOTEL_SERVICE_CUSTOMER_TYPE_CATALOGUE = 'hotel_service_customer_type_catalogue';
    const BELONG_HOTEL_CHAIN = 'belongs_hotel_chain';
    const HOTEL_CHAIN_DESCRIPTION = 'hotel_chain_description';
    const STAR_RATING = 'star_rating';
    
    /**
     * EstablishmentType table
     */
    const ESTABLISHMENT_TYPE_DESCRIPTION='establishment_type_description';
    

    /**
     * DescriptionGenHotel table
     */
    const HAS_INTERNET='has_internet';
    const PAY_INTERNET='pay_internet';
    const INTERNET_CONNECT_TYPE_CATALOGUE_ID='internet_connect_type_catalogue_id';
    const INTERNET_PLACE_CATALOGUE_ID='internet_place_catalogue_id';
    const INTERNET_PRICE='internet_price';
    const HAS_PARKING='has_parking';
    const PAY_PARKING='pay_parking';
    const PARKING_CONDITION='parking_condition';
    const PARKING_ACCESS='parking_access';
    const PARKING_LOCATION='parking_location';
    const PARKING_PRICE='parking_price';
    const HAS_BREAKFAST='has_breakfast';
    const PAY_BREAKFAST='pay_breakfast';
    const DESCRIPTIONGEN_HOTEL_FACILITY_CATALOGUE = 'descriptiongen_hotel_facility_catalogue';
    const DESCRIPTIONGEN_HOTEL_LANG_CATALOGUE = 'descriptiongen_hotel_lang_catalogue';
    const DESCRIPTIONGEN_HOTEL_BREAKFAST_CATALOGUE = 'descriptiongen_hotel_breakfast_catalogue';
    /**
     * Enum 
     */
    const INDEX='index';
    const VALUE='value';

    /**
     * DescriptiongenHotelFacilityCatalogue
     */
    const DESCRIPTIONGEN_HOTEL_ID = "descriptiongen_hotel_id";
    const FACILITY_CATALOGUE_ID = "facility_catalogue_id";

    /**
     * DescriptiongenHotelLangCatalogue
     */
    const LANG_CATALOGUE_ID = 'lang_catalogue_id';

    /**
     * DescriptiongenHotelBreakfastCatalogue
     */
    const BREAKFAST_PRICE = 'breakfast_price';
    const BREAKFAST_CATALOGUE_ID = 'breakfast_catalogue_id';

    /**
     * BreakfastCatalogue table
     */
    const BREAKFAST_TYPE='breakfast_type';

    /**
     * FacilityCatalogue table
     */
    const FACILITY_DESCRIPTION='facility_description';

    /**
     * InternetConnectTypeCatalogue table
     */
    const CONNECT_TYPE='connect_type';

    /**
     * InternetPlaceCatalogue table
     */
    const INTERNET_PLACE='internet_place';

    /**
     * LangCatalogue table
     */
    const LANG_DESCRIPTION='lang_description';

    /**
     * RoomTypeCatalogue table
     */
    const ROOM_TYPE_DESCRIPTION='room_type_description';

    /**
     * RoomPriceLayoutsItemMeasureCatalogue
     */
    const ITEM_QUANTITY='item_quantity';
    const ITEM_PEOPLE_QUANTITY = 'item_people_quantity';
    const ROOM_PRICE_LAYOUTS_ID = 'room_price_layouts_id';
    const ITEM_MEASURE_CATALOGUE_ID = 'item_measure_catalogue_id'; 
    /**
     * ItemMeasureCatalogue
     */
    const ITEM_NAME = 'item_name';

    /**
     * RoomPriceLayouts
     */
    const ROOM_TYPE_CATALOGUE_ID = 'room_type_catalogue_id';
    const ROOM_NAMES_CATALOGUE_ID = 'room_names_catalogue_id';
    const ROOM_QUANTITY = 'room_quantity';
    const LIVING_QUANTITY = 'living_quantity';
    const BATH_QUANTITY = 'bath_quantity';
    const ROOM_PEOPLE_QUANTITY = 'room_people_quantity';
    const PRICE = 'price';
    const CUSTOM_NAME = 'custom_name';
    const HAS_SMOKING_POLICY = 'has_smoking_policy';
    const SMOKING_POLICY_DESCRIPTION = 'smoking_policy_description';
    const ROOM_TOTAL_MEASURE = 'room_total_measure';
    const UNIT_MEASURE_ROOM = 'unit_measure_room';
    const ROOM_ITEM_MEASURE = 'room_price_layouts_item_measure_catalogue';

    /**
     * AmenitiesCatalogue
     */
    const AMENITY_DESCRIPTION = 'amenity_description';
    const AMENITIES_TYPE_ID = 'amenities_type_id';

    /**
     * AmenitiesType
     */
    const AMENITIES_TYPE_DESCRIPTION = 'amenities_type_description';

    /**
     * AmenitiesHotel
     */
    const HAS_EXTRA_BED = 'has_extra_bed';
    
    /**
     * AmenityExtraBeds
     */
    const EXTRA_BEDS_QUANTITY = 'extra_beds_quantity';
    const HAVE_CHILDREN_IN_CRIBS = 'have_children_in_cribs';
    const CHILD_CRIBS_PRICE = 'child_cribs_price';
    const HAVE_CHILDREN = 'have_children';
    const CHILDREN_AGES = 'children_ages';
    const CHILDREN_PRICE = 'children_price';
    const HAVE_ADULTS = 'have_adults';
    const ADULT_PRICE = 'adult_price';
    const AMENITIES_CATALOGUE_ID = 'amenities_catalogue_id';

    /**
     * AMENITIES_HOTEL_AMENITIES_CATALOGUE
     */
    const AMENITIES_HOTEL_ID = 'amenities_hotel_id';
    
    /**
     * CATALOGUES TABLE
     */
    const CATALOGUE_NAME = 'name';

    /**
     * TRANSFER SERVICE TABLE
     */
    const COMPANY_NAME = 'company_name';

    /**
     * VEHICLES TYPE CATALOGUE
     */
    const VEHICLES_CATEGORY_CATALOGUE_ID = 'vehicles_category_catalogue_id';

    /**
     * VEHICLES_FEATURES
     */
    const TRANSFER_SERVICE_ID = 'transfer_service_id';
    const BRAND = 'brand';
    const MODEL = 'model';

    /**
     * EXTRA_CHARGES
     */
    const VEHICLES_FEATURES_ID = 'vehicles_features_id';
    const QUANTITY = 'quantity';
    const UNIT_PRICE = 'unit_price';

    /**
     * VEHICLES_POLICIES
     */
    const MAX_CUSTOMER_WAIT_TIME = 'max_customer_wait_time';
    const MAX_PROV_DOMESTIC_WAIT_TIME = 'max_prov_domestic_wait_time';
    const MAX_PROV_INTERNAC_WAIT_TIME = 'max_prov_internac_wait_time';
    const TRANSPORT_TYPE = 'transport_type';
    const HAS_DOOR_TO_DOOR_SERVICE = 'has_door_to_door_service';
    const HOURS_AVAILABLE = 'hours_available';
    const DAYS_AVAILABLE = 'days_available';
    const BAG_DIMENTIONS = 'bag_dimentions';
    const BAG_WIGHT_KG = 'bag_weight_kg';
    const MAX_STOPS = 'max_stops';

    /**
     * VEHICLES_AVAILABILITY
     */
    const VEHICLE_STOCK_QUANTITY = 'vehicle_stock_quantity';
    const VEHICLE_OCCUPIED_QUANTITY = 'vehicle_occupied_quantity';

    /**
     * PHOTO_HOTEL
     */
    const IMAGE_PATH = 'image_path';

    /**
     * CATALOGUES
     */
    const NAME = 'name';

    /**
     * POLITIC_CONDITIONS
     */
    const MINIMUN_STAY = 'minimun_stay';
    const CHECKIN_TIME_FROM = 'checkin_time_from';
    const CHECKIN_TIME_TO = 'checkin_time_to';
    const CHECKOUT_TIME_FROM = 'checkout_time_from';
    const CHECKOUT_TIME_TO = 'checkout_time_to';
    const CHILD_ALLOWED = 'child_allowed';
    const PETS_ALLOWED = 'pets_allowed';
    const PETS_CHARGES = 'pets_charges';
    const CHILD_AGES_LIMIT = 'child_ages_limit';
    const CHILD_QUANTITY = 'child_quantity';

    /**
     * CANCEL_POLITICS
    */
    const POLITIC_CONDITIONS_ID = 'politic_conditions_id';
    const CANCELLATION_DAYS = 'cancellation_days';
    const PENALITY = 'penality';
    const HAS_GRACE_PERIOD = 'has_grace_period';
    const GRACE_TIME_PERIOD = 'grace_time_period';
      
    /**
     * PAY_CONDITIONS
     */
    const CHARGE_CREDIT_CARD = 'charge_credit_card';
    const APPLY_VAT_TAX = 'apply_vat_tax';
    const APPLY_CITY_TAX = 'apply_city_tax';
    const CITY_TAX_AMOUNT = 'city_tax_amount';
    const PRICE_INCLUDE_CITY_TAX = 'price_include_city_tax';
    const CITY_TAX_TYPE = 'city_tax_type';
    const PAY_CARDS_CATALOGUE_ID = 'pay_cards_catalogue_id';
    const PAY_CONDITIONS_ID = 'pay_conditions_id';
}