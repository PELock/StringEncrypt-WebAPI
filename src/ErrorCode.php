<?php

declare(strict_types=1);

namespace StringEncrypt;

/**
 * API error codes returned in encrypt responses (`error` field).
 *
 * @see https://www.stringencrypt.com/api/
 */
final class ErrorCode
{
    public const SUCCESS = 0;

    public const EMPTY_LABEL = 1;

    public const LENGTH_LABEL = 2;

    public const EMPTY_STRING = 3;

    public const EMPTY_BYTES = 4;

    public const EMPTY_INPUT = 5;

    public const LENGTH_STRING = 6;

    public const INVALID_LANG = 7;

    public const INVALID_LOCALE = 8;

    public const CMD_MIN = 9;

    public const CMD_MAX = 10;

    public const LENGTH_BYTES = 11;

    public const DEMO = 100;
}
