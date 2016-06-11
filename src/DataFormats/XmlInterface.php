<?php

namespace EpicKris\DataFormats;

/**
 * XML data format interface.
 *
 * @package EpicKris\DataFormats
 */
interface XmlInterface
{
    /**
     * Format data to XML string.
     *
     * @param array|object $data Data.
     *
     * @return string Returns XML string.
     */
    public static function toXml($data);

    /**
     * Format data array to XML string.
     *
     * @param array $data Data array.
     *
     * @return string Returns XML string.
     */
    public static function arrayToXml($data);

    /**
     * Format data object to XML string.
     *
     * @param object $data Data object.
     *
     * @return string Returns XML string.
     */
    public static function objectToXml($data);

    /**
     * Format XML string to data array.
     *
     * @param string $xml XML string.
     *
     * @return array Returns data array.
     */
    public static function xmlToArray($xml);

    /**
     * Format XML string to data object.
     *
     * @param string $xml XML string.
     *
     * @return object Returns data object.
     */
    public static function xmlToObject($xml);
}
