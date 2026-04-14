<?php

declare(strict_types=1);

namespace StringEncrypt;

/**
 * Line ending style for generated source (`new_lines` request field).
 */
enum NewLine: string
{
    case Lf = 'lf';
    case Crlf = 'crlf';
    case Cr = 'cr';
}
