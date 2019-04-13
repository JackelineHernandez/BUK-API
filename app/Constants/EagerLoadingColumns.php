<?php

namespace BukApi\Constants;

class EagerLoadingColumns
{
    /**
     * HOTEL_SERVICE WITH
     */
    const HOTEL_SERVICE = [ 'customerTypeCatalogue:customer_type_catalogue_id as id,client_kind_description'];

    /**
     * ROOM_PRICE_LAYOUTS WITH
     */
    const ROOM_PRICE_LAYOUTS = ['itemMeasureCatalogue:item_measure_catalogue_id as id,item_name,measure,item_quantity as itemQuantity,item_people_quantity as itemPeopleQuantity'];

    /**
     * DESCRIPTION_GEN_HOTEL WITH
     */
    const DESCRIPTION_GEN_HOTEL = [ 'breakfastCatalogue:breakfast_catalogue_id as id,breakfast_type as breakfastType,breakfast_price as breakfastPrice'];

    /**
     * AMENITIES_HOTEL WITH
     */
    const AMENITIES_HOTEL = ['amenityExtraBed'];

    /**
     * VEHICLES_FEATURES WITH
     */
    const VEHICLES_FEATURES = [ 'extraChargeCatalogue:extra_charges_catalogue_id as id,name,quantity,unit_price as unitPrice'];

    /**
     * PAY_CARDS_CATALOGUE
     */
    const PAY_CARDS_CATALOGUE = ['paymentCatalogue'];
}