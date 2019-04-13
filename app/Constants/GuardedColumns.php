<?php

namespace BukApi\Constants;

class GuardedColumns
{
    const ID = ['id'];

    const TRANSFER_SERVICE = ['id', 'category_catalogue_id'];

    const PHOTO_HOTEL = ['id', 'transfer_service_id', 'activities_service_id'];
}
