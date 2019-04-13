<?php

namespace BukApi\Constants;

class HiddenColumns
{
    /**
     * GENERAL PIVIT TABLE
     */
    const PIVOT = ['pivot'];

    /**
     * HOTEL_SERVICE HIDDEN
     */
    const HOTEL_SERVICE = ['ratingHotel',
                            'customerTypeCatalogue'];

    /**
     * HOTEL_SERVICE_RATING HIDDEN
     */
    const HOTEL_SERVICE_RATING = ['hotel_service_id', 'id'];

    /**
     * ROOM_PRICE_LAYOUTS HIDDEN
     */
    const ROOM_PRICE_LAYOUTS = ['room_type_catalogue_id',
                                'room_names_catalogue_id',
                                'room_quantity',
                                'room_people_quantity',
                                'custom_name',
                                'smoking_policy_description',
                                'has_smoking_policy',
                                'roomTypeCatalogue',
                                'living_quantity',
                                'bath_quantity'];

    /**
     * DESCRIPTION_GEN_HOTEL HIDDEN
     */
    const DESCRIPTION_GEN_HOTEL = ['internet_connect_type_catalogue_id', 
                                    'internet_place_catalogue_id',
                                    'has_internet',
                                    'pay_internet',
                                    'internet_price',
                                    'has_parking',
                                    'pay_parking',
                                    'parking_condition',
                                    'parking_access',
                                    'parking_location',
                                    'parking_price',
                                    'has_breakfast',
                                    'pay_breakfast',
                                    'breakfastCatalogue',
                                    'facilityCatalogue',
                                    'langCatalogue'];
    /**
     * AMENITIES CATALOGUE
     */
    const AMENITIES_CATALOGUE = ['amenity_description', 'pivot'];

    /**
     * AMENITIES TYPE
     */
    const AMENITIES_TYPE = ['amenities_type_description', 'amenitiesCatalogue'];

    /**
     * AMENITIES_HOTEL
     */
     const AMENITIES_HOTEL =['amenityExtraBed', 'has_extra_bed'];

     /**
     * VEHICLES TYPE CATALOGUE
     */
     const VEHICLES_TYPE_CATALOGUE = ['vehicles_category_catalogue_id', 'vehiclesCategoryCatalogue'];
    
     /**
      * VEHICLES_FEATURES
      */
      const VEHICLES_FEATURES = ['vehiclesAvailability'];

      /**
       * PAY_CARDS_CATALOGUE
       */
      const PAY_CARDS_CATALOGUE = ['payment_catalogue_id', 'pivot'];
}   