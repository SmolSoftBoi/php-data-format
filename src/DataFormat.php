<?php

namespace EpicKris;

use EpicKris\DataFormats\CsvInterface;
use EpicKris\DataFormats\JsonInterface;
use EpicKris\DataFormats\NativeInterface;
use EpicKris\DataFormats\XmlInterface;

/**
 * Data format.
 *
 * Convert between various data formats.
 *
 * @package EpicKris
 */
class DataFormat implements NativeInterface, CsvInterface, JsonInterface, XmlInterface
{
    use DataFormats\Native;
    use DataFormats\Csv;
    use DataFormats\Json;
    use DataFormats\Xml;

    /**
     * @var string[] Formats.
     */
    protected static $formats = [
        'native',
        'array',
        'object',
        'csv',
        'json',
        'xml'
    ];

    /**
     * Has format.
     *
     * @param string      $format Format.
     * @param string|null $to     To format.
     *
     * @return bool|string               Returns true if format exists, method name if method exists, else false.
     * @throws \InvalidArgumentException If $format argument is not a string, or $to argument is not a string or null.
     */
    public static function hasFormat($format, $to = null)
    {
        if (! is_string($format)) {
            throw new \InvalidArgumentException('Format argument must be a string.');
        }

        if (! is_string($to) && ! is_null($to)) {
            throw new \InvalidArgumentException('To argument must be a string or null.');
        }

        $format = strtolower($format);
        if (is_null($to)) {
            return in_array(strtolower($format), self::formats);
        }

        $to = strtoupper(substr($to, 0, 1)) . strtolower(substr($to, 1, strlen($to)));
        $method = $format . 'To' . $to;
        if (method_exists(__CLASS__, $method)) {
            return $method;
        }
    }
}
