<?php

declare(strict_types=1);

namespace StringEncrypt;

/**
 * Web API `command` parameter.
 */
enum Command: string
{
    /** Encrypt a string or raw bytes (`encrypt`). */
    case Encrypt = 'encrypt';

    /** Activation code limits and demo vs full mode (`is_demo`). */
    case IsDemo = 'is_demo';

    /** Engine version and supported languages (`info`). */
    case Info = 'info';
}
