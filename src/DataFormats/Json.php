<?php

namespace EpicKris\DataFormats;

/**
 * JSON data format trait.
 *
 * @package EpicKris\DataFormats
 */
trait Json
{
    /**
     * Format data to JSON string.
     *
     * @param array|object $data Data.
     *
     * @return string                    Returns JSON string.
     * @throws \InvalidArgumentException If data argument is not an array or object.
     */
    public static function toJson($data)
    {
        if (! is_array($data) && ! is_object($data)) {
            throw new \InvalidArgumentException('Data argument must be an array or object.');
        }

        return json_encode($data);
    }

    /**
     * Format array data to JSON string.
     *
     * @param array $data Data array.
     *
     * @return string                    Returns JSON string.
     * @throws \InvalidArgumentException If data argument is not an array.
     */
    public static function arrayToJson($data)
    {
        if (! is_array($data)) {
            throw new \InvalidArgumentException('Data argument must be an array.');
        }

        return self::toJson($data);
    }

    /**
     * Format object data to JSON string.
     *
     * @param object $data Data object.
     *
     * @return string                   Returns JSON string.
     * @throw \InvalidArgumentException If data argument is not an object.
     */
    public static function objectToJson($data)
    {
        if (! is_object($data)) {
            throw new \InvalidArgumentException('Data argument must be an object.');
        }

        return self::toJson($data);
    }

    /**
     * Format JSON string to data array.
     *
     * @param string $json JSON string.
     *
     * @return array                     Returns data array.
     * @throws \InvalidArgumentException If JSON argument is not a JSON string.
     */
    public static function jsonToArray($json)
    {
        if (! is_string($json)) {
            throw new \InvalidArgumentException('JSON argument must be a JSON string.');
        }

        $json = trim($json);
        $data = json_decode($json);

        if (is_null($data)) {
            throw new \InvalidArgumentException('JSON argument must be a JSON string.');
        }

        return $data;
    }

    /**
     * Format JSON string to data object.
     *
     * @param string $json JSON string.
     *
     * @return object                    Returns data object.
     * @throws \InvalidArgumentException If JSON argument is not a JSON string.
     */
    public static function jsonToObject($json)
    {
        if (! is_string($json)) {
            throw new \InvalidArgumentException('JSON argument must be a JSON string.');
        }

        $json = trim($json);
        $object = json_decode($json, true);

        if (is_null($object)) {
            throw new \InvalidArgumentException('JSON argument must be a JSON string.');
        }

        return $data;
    }
}
