<?php

namespace BukApi\Constants;

class RequestCode
{
    /**
     * HTTP CODE
     */
    const NOT_FOUND = 404;
    const METHOD_NOT_ALLOWED=405;
    const CONFLICT=409;
    const INTERNAL_SERVER_ERROR=500;
    const VALIDATION_EXCEPTION=442;
    const OK=200;
    const CREATED=201;

    /**
     * SQLSTATE
     */
    const DUPLICATED_ENTRY=1062;
}
