<?php

namespace BukApi\Constants;

class AppendsColumns
{
    /**
     * HOTEL_SERVICE APPENDS
     */
    const HOTEL_SERVICE = ['starRating'];

    /**
     * ROOM_PRICE_LAYOUTS APPENDS
     */
    const ROOM_PRICE_LAYOUTS = ['roomInfo', 'spaces'];

    /**
     * DESCRIPTION_GEN_HOTEL APPENDS
     */
    const DESCRIPTION_GEN_HOTEL = ['internet', 'parking', 'breakfast'];

    /**
     * AMENITIES CATALOGUE
     */
    const AMENITIES_CATALOGUE = ['amenityDescription'];

    /**
     * AMENITIES TYPE
     */
    const AMENITIES_TYPE = ['amenitiesTypeDescription', 'amenitiesList'];

    /**
     * AMENITIES_HOTEL 
     */
    const AMENITIES_HOTEL=['amenities', 'extraBeds'];

    /**
     * VEHICLES_TYPE_CATALOGUE
     */
    const VEHICLES_TYPE_CATALOGUE = ['vehicleCategory'];

    /**
     * VEHICLES_FEATURES
     */
    const VEHICLES_FEATURES = ['vehicle_stock_quantity', 'vehicle_occupied_quantity'];
}