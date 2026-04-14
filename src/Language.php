<?php

declare(strict_types=1);

namespace StringEncrypt;

/**
 * Output language for generated decryptor code (`lang` request field).
 */
enum Language: string
{
    case C = 'c';
    case Cpp = 'cpp';
    case CSharp = 'csharp';
    case VbNet = 'vbnet';
    case Delphi = 'delphi';
    case Java = 'java';
    case JavaScript = 'js';
    case Python = 'python';
    case Ruby = 'ruby';
    case AutoIt = 'autoit';
    case PowerShell = 'powershell';
    case Haskell = 'haskell';
    case Masm = 'masm';
    case Fasm = 'fasm';
    case Go = 'go';
    case Rust = 'rust';
    case Swift = 'swift';
    case Kotlin = 'kotlin';
    case Lua = 'lua';
    case Dart = 'dart';
    case Php = 'php';
    case Objc = 'objc';
    case Nasm = 'nasm';
}
