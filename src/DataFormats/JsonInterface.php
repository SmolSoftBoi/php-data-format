<?php

namespace EpicKris\DataFormats;

/**
 * JSON data format interface.
 *
 * @package EpicKris\DataFormats
 */
interface JsonInterface
{
    /**
     * Format data to JSON string.
     *
     * @param array|object $data Data.
     *
     * @return string Returns JSON string.
     */
    public static function toJson($data);

    /**
     * Format data array to JSON string.
     *
     * @param array $data Data array.
     *
     * @return string Returns JSON string.
     */
    public static function arrayToJson($data);

    /**
     * Format data object to JSON string.
     *
     * @param object $data Data object.
     *
     * @return string Returns JSON string.
     */
    public static function objectToJson($data);

    /**
     * Format JSON string to data array.
     *
     * @param string $json JSON string.
     *
     * @return array Returns data array.
     */
    public static function jsonToArray($json);

    /**
     * Format JSON string to data object.
     *
     * @param string $json JSON string.
     *
     * @return object Returns data object.
     */
    public static function jsonToObject($json);
}
