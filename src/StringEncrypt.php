<?php

declare(strict_types=1);

namespace StringEncrypt;

use InvalidArgumentException;

/**
 * Stateful HTTP client: pass the activation key to the constructor, configure other options via
 * setters, then {@see send()}.
 *
 * POST field `code` (activation key) is the value given at construction (empty string = demo).
 *
 * For {@see Command::Encrypt} with {@see setCompression()}`(true)`, the API returns
 * `source` as base64-encoded gzip of the decryptor text. {@see send()} decodes that
 * automatically so `source` is always plain text on success (unless
 * {@see setDecompressEncryptSource()}`(false)`).
 */
final class StringEncrypt
{
    public const DEFAULT_API_URL = 'https://www.stringencrypt.com/api.php';

    private bool $preferCurl = false;

    /** When true (default), decompress `source` after successful encrypt+compression responses. */
    private bool $decompressEncryptSource = true;

    private ?Command $command = null;

    /** Activation code sent as `code` (empty = demo). */
    private string $apiKey = '';

    // —— encrypt ——

    private string $label = 'Label';

    private ?string $inputString = null;

    private ?string $inputBytes = null;

    private bool $compression = false;

    private Language $language = Language::Php;

    /** `false`, or highlight mode string such as `geshi` / `js` when supported server-side. */
    private string|bool $highlight = false;

    private int $cmdMin = 1;

    private int $cmdMax = 3;

    private bool $local = false;

    private bool $unicode = true;

    private string $langLocale = 'en_US.utf8';

    private string $ansiEncoding = 'WINDOWS-1250';

    private NewLine $newLines = NewLine::Lf;

    private ?string $template = null;

    private bool $returnTemplate = false;

    private bool $includeTags = false;

    private bool $includeExample = false;

    /** When true, server emits a trace comment block above the encrypted array (hashes, VM JSON). */
    private bool $includeDebugComments = false;

    public function __construct(
        string $apiKey = '',
        bool $preferCurl = false,
    ) {
        $this->apiKey = $apiKey;
        $this->preferCurl = $preferCurl;
    }

    /**
     * Activation status and limits for the activation key passed to the constructor.
     *
     * @return array<string, mixed>|false Parsed JSON on success, or false on transport/parse failure.
     */
    public function isDemo(): array|false
    {
        $previousCommand = $this->command;
        $this->setCommand(Command::IsDemo);
        $result = $this->send();
        $this->command = $previousCommand;

        return $result;
    }

    /**
     * Encrypt raw file contents (binary). Uses other encrypt options already set on this client.
     *
     * @return array<string, mixed>|false Parsed JSON on success, or false if the file is missing,
     *         unreadable, empty, or on transport/parse failure.
     */
    public function encryptFileContents(string $filePath, string $label): array|false
    {
        $raw = @file_get_contents($filePath);
        if ($raw === false || $raw === '') {
            return false;
        }

        $saved = [
            'command' => $this->command,
            'inputString' => $this->inputString,
            'inputBytes' => $this->inputBytes,
            'label' => $this->label,
        ];

        $this->setCommand(Command::Encrypt)->setBytes($raw)->setLabel($label);
        $result = $this->send();

        $this->command = $saved['command'];
        $this->inputString = $saved['inputString'];
        $this->inputBytes = $saved['inputBytes'];
        $this->label = $saved['label'];

        return $result;
    }

    /**
     * Encrypt a UTF-8 string. Uses other encrypt options already set on this client (language,
     * compression, cmd range, etc.).
     *
     * @return array<string, mixed>|false Parsed JSON on success, or false on transport/parse failure.
     */
    public function encryptString(string $string, string $label): array|false
    {
        $saved = [
            'command' => $this->command,
            'inputString' => $this->inputString,
            'inputBytes' => $this->inputBytes,
            'label' => $this->label,
        ];

        $this->setCommand(Command::Encrypt)->setString($string)->setLabel($label);
        $result = $this->send();

        $this->command = $saved['command'];
        $this->inputString = $saved['inputString'];
        $this->inputBytes = $saved['inputBytes'];
        $this->label = $saved['label'];

        return $result;
    }

    public function getPreferCurl(): bool
    {
        return $this->preferCurl;
    }

    public function setPreferCurl(bool $preferCurl): self
    {
        $this->preferCurl = $preferCurl;

        return $this;
    }

    public function getDecompressEncryptSource(): bool
    {
        return $this->decompressEncryptSource;
    }

    /**
     * Disable automatic gzip+base64 decoding of `source` for encrypt+compression responses
     * if you need the raw payload from the API.
     */
    public function setDecompressEncryptSource(bool $decompressEncryptSource): self
    {
        $this->decompressEncryptSource = $decompressEncryptSource;

        return $this;
    }

    public function getCommand(): ?Command
    {
        return $this->command;
    }

    public function setCommand(Command $command): self
    {
        $this->command = $command;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /** UTF-8 text input; clears raw bytes input. */
    public function setString(string $string): self
    {
        $this->inputString = $string;
        $this->inputBytes = null;

        return $this;
    }

    /** Raw binary input; clears string input. */
    public function setBytes(string $bytes): self
    {
        $this->inputBytes = $bytes;
        $this->inputString = null;

        return $this;
    }

    public function getCompression(): bool
    {
        return $this->compression;
    }

    public function setCompression(bool $compression): self
    {
        $this->compression = $compression;

        return $this;
    }

    public function getLanguage(): Language
    {
        return $this->language;
    }

    public function setLanguage(Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getHighlight(): string|bool
    {
        return $this->highlight;
    }

    public function setHighlight(string|bool $highlight): self
    {
        $this->highlight = $highlight;

        return $this;
    }

    public function getCmdMin(): int
    {
        return $this->cmdMin;
    }

    public function setCmdMin(int $cmdMin): self
    {
        $this->cmdMin = $cmdMin;

        return $this;
    }

    public function getCmdMax(): int
    {
        return $this->cmdMax;
    }

    public function setCmdMax(int $cmdMax): self
    {
        $this->cmdMax = $cmdMax;

        return $this;
    }

    public function getLocal(): bool
    {
        return $this->local;
    }

    public function setLocal(bool $local): self
    {
        $this->local = $local;

        return $this;
    }

    public function getUnicode(): bool
    {
        return $this->unicode;
    }

    public function setUnicode(bool $unicode): self
    {
        $this->unicode = $unicode;

        return $this;
    }

    public function getLangLocale(): string
    {
        return $this->langLocale;
    }

    public function setLangLocale(string $langLocale): self
    {
        $this->langLocale = $langLocale;

        return $this;
    }

    public function getAnsiEncoding(): string
    {
        return $this->ansiEncoding;
    }

    public function setAnsiEncoding(string $ansiEncoding): self
    {
        $this->ansiEncoding = $ansiEncoding;

        return $this;
    }

    public function getNewLines(): NewLine
    {
        return $this->newLines;
    }

    public function setNewLines(NewLine $newLines): self
    {
        $this->newLines = $newLines;

        return $this;
    }

    public function getTemplate(): ?string
    {
        return $this->template;
    }

    public function setTemplate(?string $template): self
    {
        $this->template = $template;

        return $this;
    }

    public function getReturnTemplate(): bool
    {
        return $this->returnTemplate;
    }

    public function setReturnTemplate(bool $returnTemplate): self
    {
        $this->returnTemplate = $returnTemplate;

        return $this;
    }

    public function getIncludeTags(): bool
    {
        return $this->includeTags;
    }

    public function setIncludeTags(bool $includeTags): self
    {
        $this->includeTags = $includeTags;

        return $this;
    }

    public function getIncludeExample(): bool
    {
        return $this->includeExample;
    }

    public function setIncludeExample(bool $includeExample): self
    {
        $this->includeExample = $includeExample;

        return $this;
    }

    public function getIncludeDebugComments(): bool
    {
        return $this->includeDebugComments;
    }

    public function setIncludeDebugComments(bool $includeDebugComments): self
    {
        $this->includeDebugComments = $includeDebugComments;

        return $this;
    }

    /**
     * Reset request fields to defaults (reuse the same client for another call).
     */
    public function reset(): self
    {
        $this->command = null;
        $this->label = '$label';
        $this->inputString = null;
        $this->inputBytes = null;
        $this->compression = false;
        $this->language = Language::Php;
        $this->highlight = false;
        $this->cmdMin = 1;
        $this->cmdMax = 3;
        $this->local = false;
        $this->unicode = true;
        $this->langLocale = 'en_US.utf8';
        $this->ansiEncoding = 'WINDOWS-1250';
        $this->newLines = NewLine::Lf;
        $this->template = null;
        $this->returnTemplate = false;
        $this->includeTags = false;
        $this->includeExample = false;
        $this->includeDebugComments = false;

        return $this;
    }

    /**
     * Build the POST body the client would send (for debugging and tests).
     *
     * @return array<string, mixed>
     */
    public function toRequestArray(): array
    {
        if ($this->command === null) {
            throw new InvalidArgumentException('Command must be set (use setCommand()).');
        }

        return match ($this->command) {
            Command::Info => $this->buildInfoParams(),
            Command::IsDemo => $this->buildIsDemoParams(),
            Command::Encrypt => $this->buildEncryptParams(),
        };
    }

    /**
     * Send the request and return decoded JSON, or false on transport / JSON failure.
     *
     * @return array<string, mixed>|false
     */
    public function send(?bool $useCurl = null): array|false
    {
        $useCurl = $useCurl ?? $this->preferCurl;
        if ($useCurl && !function_exists('curl_init')) {
            $useCurl = false;
        }

        $params = $this->toRequestArray();

        $raw = $useCurl
            ? $this->postWithCurl(self::DEFAULT_API_URL, $params)
            : $this->postWithStreams(self::DEFAULT_API_URL, $params);

        if ($raw === false || $raw === '') {
            return false;
        }

        $decoded = json_decode($raw, true);
        if (!is_array($decoded)) {
            return false;
        }

        return $this->applyDecryptorSourceDecompression($decoded);
    }

    /**
     * Replace `source` with plain text when the request used compression (API returns
     * base64(gzip(decryptor source))).
     *
     * @param array<string, mixed> $response
     * @return array<string, mixed>
     */
    private function applyDecryptorSourceDecompression(array $response): array
    {
        if ($this->command !== Command::Encrypt || !$this->compression || !$this->decompressEncryptSource) {
            return $response;
        }

        if (($response['error'] ?? null) !== ErrorCode::SUCCESS) {
            return $response;
        }

        if (!isset($response['source']) || !is_string($response['source'])) {
            return $response;
        }

        $binary = base64_decode($response['source'], true);
        if ($binary === false) {
            return $response;
        }

        $plain = gzuncompress($binary);
        if ($plain === false) {
            return $response;
        }

        $response['source'] = $plain;

        return $response;
    }

    /**
     * @return array<string, string|int|bool>
     */
    private function buildInfoParams(): array
    {
        return [
            'command' => Command::Info->value,
            'code' => $this->apiKey,
        ];
    }

    /**
     * @return array<string, string|int|bool>
     */
    private function buildIsDemoParams(): array
    {
        return [
            'command' => Command::IsDemo->value,
            'code' => $this->apiKey,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function buildEncryptParams(): array
    {
        $p = [
            'command' => Command::Encrypt->value,
            'code' => $this->apiKey,
            'label' => $this->label,
            'compression' => $this->compression,
            'lang' => $this->language->value,
            'cmd_min' => $this->cmdMin,
            'cmd_max' => $this->cmdMax,
            'local' => $this->local,
            'unicode' => $this->unicode,
            'lang_locale' => $this->langLocale,
            'ansi_encoding' => $this->ansiEncoding,
            'new_lines' => $this->newLines->value,
            'return_template' => $this->returnTemplate,
            'include_tags' => $this->includeTags,
            'include_example' => $this->includeExample,
            'include_debug_comments' => $this->includeDebugComments,
        ];

        if ($this->inputString !== null) {
            $p['string'] = $this->inputString;
        } elseif ($this->inputBytes !== null) {
            $p['bytes'] = $this->inputBytes;
        }

        if ($this->highlight !== false) {
            $p['highlight'] = $this->highlight;
        }

        if ($this->template !== null) {
            $p['template'] = $this->template;
        }

        return $p;
    }

    /**
     * @param array<string, mixed> $data
     */
    private function postWithStreams(string $url, array $data): string|false
    {
        $body = http_build_query($data);
        $params = [
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => $body,
            ],
        ];
        $ctx = stream_context_create($params);
        $fp = @fopen($url, 'rb', false, $ctx);
        if ($fp === false) {
            return false;
        }
        try {
            $response = stream_get_contents($fp);
        } finally {
            fclose($fp);
        }

        return $response !== false ? $response : false;
    }

    /**
     * @param array<string, mixed> $data
     */
    private function postWithCurl(string $url, array $data): string|false
    {
        $ch = curl_init($url);
        if ($ch === false) {
            return false;
        }

        $body = http_build_query($data);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => 'pelock/stringencrypt (+https://www.stringencrypt.com)',
            CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
        ]);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result !== false ? $result : false;
    }
}
