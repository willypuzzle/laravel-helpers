<?php

namespace Willypuzzle\Helpers\Contracts;

interface HttpCodes {
    const CONFLICT = 409;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const OK = 200;
    const CREATED = 201;
    const UNAUTHORIZED = 401;
    const INTERNAL_SERVER_ERROR = 500;
    const UNPROCESSABLE_ENTITY = 422;
}
