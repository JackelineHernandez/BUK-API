<?php

namespace BukApi\Constants;

class Query
{
    const PARKING_CONDITION_ENUM = "SHOW COLUMNS FROM descriptiongen_hotel LIKE 'parking_condition'";
    const PARKING_ACCESS_ENUM = "SHOW COLUMNS FROM descriptiongen_hotel LIKE 'parking_access'";
    const PARKING_LOCATION_ENUM = "SHOW COLUMNS FROM descriptiongen_hotel LIKE 'parking_location'";
    const CHILDREN_AGES_ENUM = "SHOW COLUMNS FROM amenity_extra_beds LIKE 'children_ages'";
    const UNIT_MEASURE_ROOM_ENUM = "SHOW COLUMNS FROM room_price_layouts LIKE 'unit_measure_room'";
    const CHILD_AGES_LIMIT = "SHOW COLUMNS FROM politic_conditions LIKE 'child_ages_limit'";
    const PETS_ALLOWED = "SHOW COLUMNS FROM politic_conditions LIKE 'pets_allowed'";
    const PETS_CHARGES = "SHOW COLUMNS FROM politic_conditions LIKE 'pets_charges'";
    const CANCELLATION_DAYS = "SHOW COLUMNS FROM cancel_politics LIKE 'cancellation_days'";
    const GRACE_TIME_PERIOD = "SHOW COLUMNS FROM cancel_politics LIKE 'grace_time_period'";
    const PENALITY = "SHOW COLUMNS FROM cancel_politics LIKE 'penality'";
    const CITY_TAX_TYPE = "SHOW COLUMNS FROM pay_conditions LIKE 'city_tax_type'";

}