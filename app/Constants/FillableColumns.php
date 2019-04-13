<?php

namespace BukApi\Constants;

class FillableColumns
{
    const HOTEL_SERVICE = [
        'establishment_name',
        'category_catalogue_id',
        'home_address',
        'establishment_type_catalogue_id', 
        'city', 
        'state', 
        'country', 
        'zip', 
        'quantity_rooms', 
        'geo_coordinates', 
        'channel_manager',
        'channelmanager_descript', 
        'responsible_name', 
        'email',
        'reference',
        'belongs_hotel_chain',
        'hotel_chain_description'];
    
    const PHONE_HOTEL = [
            'hotel_service_id', 
            'phone_number'];
    
    const DESCRIPTION_GEN_HOTEL = [
        'hotel_service_id',
        'has_internet',
        'pay_internet',
        'internet_connect_type_catalogue_id', 
        'internet_place_catalogue_id', 
        'internet_price', 
        'has_parking', 
        'pay_parking', 
        'parking_condition', 
        'parking_access', 
        'parking_location',
        'parking_price', 
        'has_breakfast', 
        'pay_breakfast'];

    const ROOM_PRICE_LAYOUTS = [
        'hotel_service_id',
        'room_type_catalogue_id',
        'room_names_catalogue_id',
        'room_quantity',
        'living_quantity', 
        'bath_quantity', 
        'room_people_quantity', 
        'price',
        'room_total_measure',
        'unit_measure_room',
        'custom_name',
        'has_smoking_policy',
        'smoking_policy_description'];


}
